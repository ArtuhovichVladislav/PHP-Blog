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
            self::$instance->setHandler();
        }
        return self::$instance;
    }

    public function setHandler()
    {
        switch(Config::$handler){
            case 'txt':
                $this->handler = new txtFileHandler();
                break;
            case 'json':
                $this->handler = new JSONHandler();
                break;
            case 'db':
                $this->handler = new mysqlHandler();
                break;
            default:
                $this->handler = new txtFileHandler();
        }
    }

    public function readData()
    {
        return $this->handler->getPosts();
    }

    public function writeData($title, $content)
    {
        $postTitle = $title == null ? 'NO_TITLE' : $title;
        $postContent = $content == null ? 'NO_CONTENT' : $content;

        $this->handler->addPost($postTitle, $postContent, date('m.d.Y H:i', time()));
    }

    public function removeData($id)
    {
        $this->handler->deletePost($id);
    }
}

?>