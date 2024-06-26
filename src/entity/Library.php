<?php

class Library 
{
    private int $id;
    private string $name;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName (): ?string
    {
        return $this->name;
    }

    public function setName (string $name): static
    {
        $this->name = $name;

        return $this;
    }
}