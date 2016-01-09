<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>MyBlog</title>
    </head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">My Blog</a>
        </div>
    </div>
</nav>

    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="index.php?action=add">
                <div class="panel-heading">
                    <input type="text" name="title" value="" class="form-control" placeholder="Title"
                           aria-describedby="basic-addon1"  autofocus required></p>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <textarea class="form-control" id="comment" name="content" rows="3" placeholder="Comment"></textarea>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </form>
            <div class="row"></div>
            <?php foreach($posts as $p): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?php echo $p->getTitle(); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-right">
                            <h5><em>Published: <?php echo $p->getDate(); ?></em></h5>
                        </div>
                        <h4><p><?php echo $p->getContent(); ?></p></h4>
                    </div>
                    <div class="panel-footer">
                        <a href="index.php?action=delete&id=<?php echo $p->getId(); ?>" role="button" class="btn btn-danger">
                            Delete
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>


