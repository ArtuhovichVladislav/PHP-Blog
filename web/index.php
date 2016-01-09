<?php
require_once('../include/autoloader.php');

$storage = Storage::getInstance();
$posts = $storage->readData();

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";
if($action == "add")
{
    if(!empty($_POST))
    {
        $storage->writeData($_POST['title'], $_POST['content']);
        $posts = array_reverse($storage->readData());
    }
    require_once("../view/index.html.php");
}
else if($action == "delete")
{
    if (isset($_GET['id']))
        $storage->removeData($_GET['id']);

    $posts =  array_reverse($storage->readData());
    require_once("../view/index.html.php");
}
else
{
    require_once("../view/index.html.php");
    $posts =  array_reverse($storage->readData());
}

?>


