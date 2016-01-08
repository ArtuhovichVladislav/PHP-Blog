<?php

class Storage
{

    private static $instance = null;
    private $handler;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    public function readData()
    {
        return $this->handler->getPosts();
    }

    public function writeData($id, $title,  $content,$data)
    {
        $this->handler->addPost($id, $title,  $content,$data);
    }

    public function removeData($id)
    {
        $this->handler->deletePost($id);
    }
}