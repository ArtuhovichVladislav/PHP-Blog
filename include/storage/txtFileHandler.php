<?php

class TxtFileHandler implements Handler
{

    private $file = '../include/storage/posts.txt';

    public function addPost($id, $title, $content, $date)
    {
        $id = $this->setId();
        $post = new Post($id, $title, $content, $date);
        $content .= $post->__createStringForFile();
        file_put_contents($this->file, $content, FILE_APPEND | LOCK_EX);
    }

    public function getPosts()
    {
        return $this->getPostsHash();
    }

    private	function parseFile($data)
    {
        return explode("~", $data);
    }

    public function getPostsHash()
    {
        $data = file_get_contents($this->file);
        $postsArray = $this->parseFile($data);
        $postsHash = null;
        $i = 0;
        foreach($postsArray as $post){
            list($id, $title, $content, $date) = explode(";", $post);
            if($title!=""){
                $postsHash[$i] =["id"=> $id, "title"=>$title, "content"=> $content, "date"=> $date];
                $i++;
            }
        }
        return $postsHash;
    }

    public function setId()
    {
        $lastPost =  count($this->getPosts()) - 1;
        $postsHash = $this->getPostsHash();
        if(is_null( $postsHash[$lastPost]['id'])){
            $nextPostId = 1;
        }
        else
            $nextPostId = 1 +  $postsHash[$lastPost]['id'];
        return $nextPostId;
    }


    public function deletePost($id)
    {}

}










