<?php

class Book 
{
    private int $id;
    private string $title;
    private int $author_id;
    private int $category_id;
    private ?Author $author;
    private ?Category $category;
    private ?array $library = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle (): ?string
    {
        return $this->title;
    }

    public function setTitle (string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthorId (): ?int
    {
        return $this->author_id;
    }

    public function setAuthorId (int $author_id): static
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function getLibrary(int $id = null)
    {
        if ($id) {
            return $this->library[$id];
        }
        return $this->library;
    }

    public function getAllLibrary()
    {
        return $this->library;
    }

    public function getLibraryLength()
    {
        return count($this->library);
    }

    public function setLibrary($library)
    {
        $this->library = $library;

        return $this;
    }
}