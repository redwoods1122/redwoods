<?php include 'config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <title>www.redwoods.io</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./index.php">RedWoods' Blog</a>
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li class=""><a href="./index.php">Home <span class="sr-only">(current)</span></a></li>

    <?php foreach($catlist as $cat): ?>
      <li><a href="<? echo '?cat='.$cat['id']; ?>"><?php echo $cat['cat_name'] ?></a></li>
    <?php endforeach; ?>
    </ul>

    <!-- 如果用户登陆,显示出用户名和相关操作-->
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="#">Admin</a></li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Option <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="/index.php?act=cat_manage">Class management</a></li>
      <li><a href="/index.php?act=art_manage">Articel management</a></li>
      <li><a href="/index.php?act=user_manage">User management</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="#" onclick="logout();" >Exit</a></li>
    </ul>
    </li>
    </ul>
    <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./index.php?act=login">Login</a></li>
      </ul>
    <?php endif; ?>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
<script>
  function logout()
  {
    if (confirm('are you sure logout?')){
      window.location.href='/index.php?act=logout';
    }else{
      window.location.href= '/index.php';
    }
  }
</script>
