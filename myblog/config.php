<?php
$db = [
    'db_host'=>'localhost',
    'db_user'=> 'root',
    'db_pass'=> 'root',
    'db_name'=> 'myblog'
];
$num = 5;
$numManage = 10;

$urlNum = isset($_GET) ? count($_GET) : 0;
switch ($urlNum) {
  case 0:
    include 'enter_index.php';
    break;
  case 1:
  case 2:
    $get = array_keys($_GET);
    switch ($get['0'])
    {
      case 'page':
        include 'enter_index.php';
        break 2;
      case 'act':
        include 'enter_act.php';
        break 2;
      case 'cat':
        if (in_array('id',$get)){
          include 'enter_content.php';
          break 2;
        }
        include 'enter_cat.php';
        break 2;
    }
  default:
    echo "<script>alert('url param num do not allow be three.'); location.href = 'index.php';</script>";
    break;
}

 ?>
