<?php

class Author
{
    private $id;
    private $firstname;
    private $lastname;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstname (): ?string
    {
        return $this->firstname;
    }

    public function setFirstname (string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname (): ?string
    {
        return $this->lastname;
    }

    public function setLastname (string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

}