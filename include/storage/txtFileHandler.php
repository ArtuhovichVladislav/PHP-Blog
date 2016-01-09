<?php

class txtFileHandler implements Handler
{

    private $file = '../include/storage/posts.txt';

    public function addPost($title, $content, $date)
    {
        $id = $this->setId();
        $post = new Post($id, $title, $content, $date);
        $content = $post->__toString();
        file_put_contents($this->file, $content, FILE_APPEND | LOCK_EX);
    }

    private	function parseFile($data)
    {
        return explode("~", $data);
    }

    public function getPostsArray()
    {
       return $this->parseFile(file_get_contents($this->file));
    }

    public function getPosts()
    {
        $data = file_get_contents($this->file);
        $postsArray = $this->parseFile($data);
        foreach($postsArray as $post){
            list($id, $title, $content, $date) = explode(";", $post);
            if($title!=""){
                $posts[] = new Post($id, $title, $content, $date);
            }
        }
        return $posts;
    }

    public function setId()
    {
        $lastPost =  count($this->getPosts()) - 1;
        $posts = $this->getPosts();
        if(!$posts || is_null( $posts[$lastPost]->getId())){
            $nextPostId = 1;
        }
        else
            $nextPostId = 1 +  $posts[$lastPost]->getId();
        return $nextPostId;
    }


    public function deletePost($idDel)
    {
        $posts = $this->getPosts();

        foreach($posts as $post){
            if ($post->getId() == $idDel) {
                $postForDeleting = $post->__toString();
            }
            $data = file_get_contents($this->file);
            $new_str = str_replace($postForDeleting, "",$data );
            if($post != null)
                file_put_contents($this->file, $new_str);
        }

    }

}










