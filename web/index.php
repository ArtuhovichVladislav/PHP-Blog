<?php
require_once("Post.php");
require_once("Handler.php");
require_once("Storage.php");
require_once("txtFileHandler.php");
require_once("JSONHandler.php");

$storage = Storage::getInstance();
$storage->setHandler(new TxtFileHandler());

$post = postGet($_GET['id']);
$posts = getPosts();

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";
if($action == "add") {
    if(!empty($_POST)) {
        newPost($_POST['title'], $_POST['content']);
        $posts = getPosts();
    }
    require_once("../view/index.html.php");
}
else {
    require_once("../view/index.html.php");
    $posts = getPosts();
}

?>


