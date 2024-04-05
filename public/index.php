<?php

session_start();

class App
{
    public $URL;
    public $controller = 'Home';
    public string $method = 'index';
    public array $params = [];


    public function __construct($URL)
    {
        $this->URL = $_SERVER['REQUEST_URI'];;
    }

    private function getURL() : array
    {
        $this->URL = explode('/', $this->URL);
        $this->URL = array_filter($this->URL);
        $this->URL = array_values($this->URL);

        if (empty($this->URL)) {
            $this->URL[0] = 'home';
        }
        return $this->URL;
    }

    public function getController() : void
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

            // Récuperer les paramètres de l'URL
            $this->params = array_slice($this->URL, 2);

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
            if (empty($this->params)) {
                $this->controller->{$this->method}($view, $this->method);
            } else {
                $this->controller->{$this->method}($view, $this->method, $this->params);
            }
            

        // Si le controller n'existe pas, afficher la page notFound du controller notFoundController
        } else {
            require_once '../src/controllers/notFoundController.php';
            $this->controller = new notFoundController;
            $view = 'notFound';
            $this->method = 'index';
            $this->controller->index($view, $this->method);
        }
    }
}

$app = new App($_SERVER['REQUEST_URI']);
$app->getController();

echo '<pre>';
print_r($app);
echo '</pre>';
