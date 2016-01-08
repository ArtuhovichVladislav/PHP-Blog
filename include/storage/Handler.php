<?php

interface Handler
{
    public function addPost($id, $title, $content, $date);
    public function getPosts();
    public function deletePost($id);
}