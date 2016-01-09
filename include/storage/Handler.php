<?php

interface Handler
{
    public function addPost($title, $content, $date);
    public function getPosts();
    public function deletePost($id);
}