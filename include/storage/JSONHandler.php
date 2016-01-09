<?php

class JSONHandler implements Handler
{
    private $file = '../include/storage/posts.json';

    public function addPost($title, $content, $date)
    {
        $id = $this->setId();
        $post = new Post($id, $title, $content, $date);
        $posts[] = $post;

        $this->writeJson($posts);
    }

    public function getPosts()
    {
        $posts = [];
        $postsJson = $this->readJson();

        for ($i = 0; $i < count($postsJson); $i++) {
            $posts[] = new Post($postsJson[$i]['id'],
                $postsJson[$i]['title'],
                $postsJson[$i]['content'],
                $postsJson[$i]['date']);
        }
        return $posts;
    }

    public function deletePost($id)
    {
        $json = $this->readJson();
        for ($i = 0; $i < count($json); $i++) {
            if ($json[$i]['id'] == $id) {
                array_splice($json, $i, 1);
                break;
            }
        }
        $this->writeJson($json);
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

    private function writeJson($data)
    {
        $json = json_encode($data);
        file_put_contents($this->file, $json);
    }

    private function readJson()
    {
        $string = file_get_contents($this->file);
        return json_decode($string, TRUE);
    }

}