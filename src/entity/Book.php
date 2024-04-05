<?php

class Book 
{
    private int $id;
    private string $title;
    private int $author_id;
    private int $category_id;

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

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
}