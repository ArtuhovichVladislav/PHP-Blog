<?php

class Post implements JsonSerializable
{
    private $id;
    private $title;
    private $content;
    private $date;

    public function __construct($id, $title, $content, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    public function __toString()
    {
        return $this->id.";".$this->title.";".$this->content.";".$this->date."~";
    }

    function jsonSerialize()
    {
        $post['id'] = $this->id;
        $post['title'] = $this->title;
        $post['content'] = $this->content;
        $post['date'] = $this->date;

        return $post;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

}
