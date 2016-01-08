<?php

class JSONHandler implements Handler
{
    private $file = '../include/storage/posts.json';

    public function addPost($id, $title, $content, $date)
    {
        $id = $this->setId();
        $post = new Post($id, $title, $content, $date);
        $posts[] = $post;

        $this->writeJson($posts);
    }

    public function getPosts()
    {
        // TODO: Implement getPosts() method.
    }

    public function deletePost($id)
    {
        // TODO: Implement deletePost() method.
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

    private function writeJson($json)
    {
        $new_json = json_encode($json);
        $file = fopen($this->file, 'w+');
        fwrite($file, $new_json);
        fclose($file);
    }

    private function readJson()
    {
        $string = file_get_contents($this->file);
        return json_decode($string, TRUE);
    }

}