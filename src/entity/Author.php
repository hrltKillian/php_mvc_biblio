<?php

class Author
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private array $books = [];
    

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


    public function getBooks(int $id = null)
    {
        if ($id) {
            return $this->books[$id];
        }
        return $this->books;
    }

    public function getBooksLength()
    {
        return count($this->books);
    }

    public function setBooks($books)
    {
        $this->books = array_merge($this->books, $books);

        return $this;
    }
}