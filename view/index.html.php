<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBlog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Blog <span class="sr-only">(current)</span></a>
    </div>
</nav>
<br>
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <div class="form">
            <form method="post" action="index.php?action=add">
                <div class="form-group">
                    <input type="text" name="title" value="" class="form-control" placeholder="Title"
                           aria-describedby="basic-addon1"  autofocus required></p>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                </div>
                <input type="submit" value="Post" class="btn btn-primary-outline">
            </form>
        </div>
    </div>

</div>
<?php foreach($posts as $p): ?>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="container">
            <div class="post">
                <h3><?=$p['title']?></h3>
                <h6><em>Published: <?=$p['date']?></em></h6>
                <p><?=$p['content']?></p>
                <form>
                    <input type="submit" value="Delete" class="btn btn-primary-outline">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>

</div>
<?php endforeach ?>
</body>
</html>


