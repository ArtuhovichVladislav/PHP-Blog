<?php

function __autoload($className)
{
    switch ($className)
    {
        case 'Post' :
            require_once('../include/models/Post.php');
            break;

        case 'Config' :
        require_once('../config/config.php');
            break;

        case 'Storage' :
            require_once('../include/storage/Storage.php');
            break;

        case 'Handler' :
            require_once('../include/storage/Handler.php');
            break;

        default :
          if (strpos($className, 'Handler') != false)
          {
                require_once '../include/storage/' . $className . '.php';
                break;
          }
    }
}