<?php
include 'function.php';

$conn = db_link($db);
$catlist = db_query_cat($conn);
$act = $_GET;
switch ($act['act']) {
  case 'login':
    $tplName = 'login_tpl';
  break;
  case 'check_login':
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = db_link($db);
    $userlist = db_query_user($conn);
    check_login($username, $password, $userlist);
  break;
  case 'logout':
    logout();
  break;
  case 'cat_manage':
    $conn = db_link($db);
    $catList = db_query($conn, 'blog_category');
    $tplName = 'cat_manage_tpl';
  break;
  case 'cat_edit':
    $conn = db_link($db);
    $catList = db_query($conn, 'blog_category');
    $catid = $_GET['id'];
    $where = 'id='.$catid;
    $catCurrent = db_query_key($conn, 'blog_category', $where);
    $tplName = 'cat_edit_tpl';
  break;
  case 'cat_insert':
    $tplName = 'cat_insert_tpl';
  break;
  case 'do_cat_insert':
    $cat = $_POST['cat_name'];
    $conn = db_link($db);
    $catList = db_query($conn, 'blog_category');
    //准备一维分类名列表，检测分类名是否已经存在
    $sql = "SELECT cat_name FROM blog_category";
    if ($result = mysqli_query($conn, $sql)){
      while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = current($row);
      }
    }

    if (in_array($cat, $rows)){
      echo '<script>alert("duplication class name.")</script>';
    }else{
      db_insert_cat($conn, $cat);
    }

    $tplName = 'cat_manage_tpl';
  break;
  case 'do_cat_edit':
    $cat = $_POST['cat_name'];
    $conn = db_link($db);
    $catid = $_GET['id'];
    db_edit_cat($conn, $cat, $catid);
    $tplName = 'cat_manage_tpl';
  break;
  case 'cat_dele':
    $conn = db_link($db);
    $catid = $_GET['id'];
    db_dele_cat($conn, $catid);
    $tplName = 'cat_manage_tpl';
  break;
  case 'art_manage':
    $conn = db_link($db);
    $table = 'blog_article';
    $where = 'id > 0';
    
    $artListAll = db_query_key($conn, $table, $where);
    $totalNum = count($artListAll);//最大记录数
    $maxPage = ceil($totalNum/$numManage);//最大分页数
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page-1)*$numManage;//偏移量计算
    $table = 'blog_article';
    $conn = db_link($db);
    $artList = db_query_keys($conn, $table, $where, $offset, $numManage);
    $perfix = '?'.key($_GET).'='.current($_GET);

    $tplName = 'art_manage_tpl';
  break;
  case 'art_edit':
    $conn = db_link($db);
    $artId = $_GET['id'];
    $table = 'blog_article';
    $artCurrent = db_query_key($conn, $table, "id = '$artId'");
    $catList = db_query_key($conn, 'blog_category', 'id > 0');
    $tplName = 'art_edit_tpl';
  break;
  case 'art_insert':
    $conn = db_link($db);
    $catList = db_query_key($conn, 'blog_category', 'id > 0');
    $tplName = 'art_insert_tpl';
  break;
  case 'do_art_insert':
    $conn = db_link($db);
    $artName = $_POST['title'];
    $artContent = htmlspecialchars($_POST['content']);
    $catid = $_POST['cat_id'];
    db_insert_art($conn, $artName, $artContent, $catid);
    $tplName = 'art_manage_tpl';
  break;
  case 'do_art_edit':
    $conn = db_link($db);
    $artName = $_POST['title'];
    $artContent = htmlspecialchars($_POST['content']);
    $catId = $_POST['cat_id'];
    $artId = $_GET['id'];
    db_edit_art($conn, $artId, $artName, $artContent, $catId);
    $tplName = 'art_manage_tpl';
  break;
  case 'art_dele':
    $artId = $_GET['id'];
    $conn = db_link($db);
    db_dele_art($conn, $artId);
    $tplName = 'art_manage_tpl';
  break;
  case 'user_manage':
    $conn = db_link($db);
    $userList = db_query_key($conn, 'blog_user', 'id > 0');
    $tplName = 'user_manage_tpl';
  break;
  case 'user_edit':
    $conn = db_link($db);
    $userId = $_GET['id'];
    $userCurrent = db_query_key($conn, 'blog_user', "id = '$userId'");
    $tplName = 'user_edit_tpl';
  break;
  case 'do_user_edit':
    $conn = db_link($db);
    $userName = $_POST['username'];
    $password = md5($_POST['password']);
    $userId = $_GET['id'];
    db_edit_user($conn, $userName, $password, $userId);
    $tplName = 'user_manage_tpl';
  break;
  default:
    // code...
  break;
}





?>
