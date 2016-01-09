<?php

class Config {

    static $handler = 'txt';

    static $jsonPath = '../include/storage/posts.json';
    static $filePath = '../include/storage/posts.txt';

    static $dbSettings = [
        'host' => "localhost",
        'userName' => 'root',
        'password' => 'root',
        'database' => 'posts'
    ];
}