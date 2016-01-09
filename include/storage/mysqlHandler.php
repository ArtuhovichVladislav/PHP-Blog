<?php

class mysqlHandler implements Handler
{
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(Config::$dbSettings['host'],
            Config::$dbSettings['userName'],
            Config::$dbSettings['password'],
            Config::$dbSettings['database']);
    }

    public function getPosts()
    {
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($this->connection, $sql);

        $posts = [];

        while($post = mysqli_fetch_array($result)) {
            $posts[] = new Post($post['id'],
                $post['title'],
                $post['content'],
                $post['date']);
        }
        mysqli_free_result($result);
        return $posts;
    }

    public function addPost($title, $content, $date)
    {
        $titl = mysqli_real_escape_string($this->connection, $title);
        $cont = mysqli_real_escape_string($this->connection, $content);
        $createDate = mysqli_real_escape_string($this->connection, $date);

        $query = "INSERT INTO posts (title, content, createDate) VALUES ('$titl', '$cont', '$createDate')";
        mysqli_query($this->connection, $query);
    }

    public function deletePost($id)
    {
        $postId = mysqli_real_escape_string($this->connection, $id);
        $query = "DELETE FROM posts WHERE id='$postId'";
        mysqli_query($this->connection, $query);
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}
