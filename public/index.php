<?php

session_start();

class App
{
    public $URL;
    public $controller = 'Home';
    public $method = 'index';


    public function __construct($URL)
    {
        $this->URL = $_SERVER['REQUEST_URI'];;
    }

    private function getURL()
    {
        $this->URL = explode('/', $this->URL);
        $this->URL = array_filter($this->URL);
        $this->URL = array_values($this->URL);

        if (empty($this->URL)) {
            $this->URL[0] = 'home';
        }
        return $this->URL;
    }

    public function getController()
    {
        // Récuperer l'URL
        $this->URL = $this->getURL($this->URL);
        $controller = $this->URL[0];
        $controller = ucfirst($controller) . 'Controller.php';
        require '../src/controllers/Controller.php';

        // Récuperer le controller associé à l'URL
        // Si le controller existe, instancier le controller
        if (file_exists('../src/controllers/' . $controller)) {
            require_once '../src/controllers/' . $controller;
            $this->controller = ucfirst($this->URL[0]) . 'Controller';
            $this->controller = new $this->controller;

            // Récuperer la méthode associée à l'URL
            $this->method = $this->URL[1];

            // Si la méthode n'existe pas, rediriger vers la méthode par défaut (index si c'est home, all si c'est les autres)
            if (!in_array($this->method, $this->controller->ALLOWED_METHODS)) {
                if ($this->URL[0] == 'home') {
                    $this->method = "index";
                } else {
                    $this->method = "all";
                }
                header('Location: /' . $this->URL[0] . '/' . $this->method);
                return;
            }
            
            $view = $this->URL[0];
            $this->controller->index($view, $this->method);
            

        // Si le controller n'existe pas, afficher la page 404 du controller _404Controller
        } else {
            require_once '../src/controllers/_404Controller.php';
            $this->controller = '_404Controller';
            $this->controller = new $this->controller;
            $view = '404';
            $this->method = 'index';
            $this->controller->index($view, $this->method);
        }

        #$controller = new $this->controller;
        #call_user_func_array([$controller, $this->method], []);
    }
}

$app = new App($_SERVER['REQUEST_URI']);
$app->getController();

echo '<pre>';
print_r($app);
echo '</pre>';
