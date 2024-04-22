<?php

class BlogPostModel{
    public $id;
    public $title;
    public $content;
    public $author;
    public $date;
    public $category;

    public function __construct($data){
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->content = $data['content'] ?? null;
        $this->author = $data['author'] ?? null;
        $this->date = $data['date'] ?? null;
        $this->category = $data['category'] ?? null;
    }
}