<?php
function auto_load_tpl($tplName)
{
  global $tplName;
  global $catName;
  global $artList;
  global $artCurrent;
  global $contCurrent;
  global $catList;
  global $catCurrent;
  global $catId;
  global $artId;
  global $userList;
  global $userCurrent;
  global $perfix;
  global $page;
  global $maxPage;
  include './'.$tplName.'.php';
}

function db_link($db)
{
  $conn = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'],$db['db_name']);
  if (mysqli_connect_errno()){
	   die('fail link '.mysqli_connect_error());
  }
  return $conn;
}

function db_query_cat($conn)
{
  $sql = "SELECT * FROM blog_category";
  $reslut = mysqli_query($conn, $sql);
  $rows=[];
  if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_assoc($result)) {
          $rows[]=$row;
        }
  }
  return $rows;
}

function db_query_user($conn)
{
  $sql = "SELECT * FROM blog_user";
  $rows = [];
  if ($result = mysqli_query($conn, $sql)){
    while ($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }

  }
  return $rows;
}

function check_login ($username, $password, $userlist)
{
  if (empty($username)||empty($password)){
    echo '<script>alert("username and password can not be empty."); location.href = "/index.php?act=login";</script>';
  }
  if ($username == $userlist['0']['username'] && md5($password) == $userlist['0']['password']){
    $_SESSION['username'] = $username;
    echo '<script>alert("succeed login."); location.href = "/index.php";</script>';
  }else{
    echo '<script>alert("fail login, please check username and password."); location.href = "/index.php?act=login";</script>';
  }
}

function logout()
{
  if (session_destroy()){
    echo '<script>location.href="/index.php";</script>';
  }
}

function db_query($conn,$table)
{
  $sql = "SELECT * FROM $table";
  $rows=[];
  if ($reslut = mysqli_query($conn, $sql)){
    while ($row = mysqli_fetch_assoc($reslut)){
      $rows[] = $row;
    }
  }
  return $rows;
}

function db_query_key($conn, $table, $where)
{
  $sql = "SELECT * FROM $table WHERE $where ORDER BY update_time DESC";
  $rows=[];
  if ($reslut = mysqli_query($conn, $sql)){
    while ($row = mysqli_fetch_assoc($reslut)){
      $rows[] = $row;
    }
  }
  return $rows;
}

function db_query_keys($conn, $table, $where, $offset, $num)
{
  $sql = "SELECT * FROM $table WHERE $where LIMIT $offset, $num";
  $rows=[];
  if ($result = mysqli_query($conn, $sql)){
    while ($row=mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
  }
  return $rows;
}


function db_insert_cat ($conn, $cat)
{
  $create_time = time();
  $update_time = time();
  $sql = "INSERT INTO blog_category (cat_name,cat_url,create_time,update_time)
          VALUES ('$cat','','$create_time','$update_time')";
  if (mysqli_query($conn, $sql)){
    echo '<script> alert("add one record.");location.href="/index.php?act=cat_manage";</script>';
  }else{
    echo '<script> alert("fail add.");history.back();</script>';
  }
}

function db_edit_cat ($conn, $cat, $catid)
{
  $sql = "UPDATE blog_category SET cat_name = '$cat' WHERE id='$catid'";
  if (mysqli_query($conn,$sql)){
    echo '<script> alert("ClassName has been updated.");location.href="/index.php?act=cat_manage";</script>';
  }else{
    echo '<script> alert("fail update.");history.back();</script>';
  }
}

function db_dele_cat($conn, $catid)
{
  $sql = "DELETE FROM blog_category WHERE id='$catid'";
  if (mysqli_query($conn, $sql)){
    echo '<script> alert("it was deleted.");location.href="/index.php?act=cat_manage";</script>';
  }else{
    echo '<script> alert("fail dele.");history.back();</script>';
  }
}

function db_insert_art($conn, $artName, $artContent, $catid)
{
  $create_time = time();
  $update_time = time();
  $sql = "INSERT INTO blog_article(id, title, content, cat_id, title_url, create_time, update_time)
  VALUES (NULL, '$artName', '$artContent', '$catid', '', '$create_time', '$update_time')";
  if (mysqli_query($conn, $sql)) {
    echo '<script> alert("add one artical.");location.href="/index.php?act=art_manage";</script>';
  }else{
    echo '<script> alert("fail add.");history.back();</script>';
  }
}

function db_edit_art($conn, $artId, $artName, $artContent, $catId)
{
  $update_time = time();
  $sql = "UPDATE blog_article SET title='$artName', content='$artContent', cat_id='$catId', update_time='$update_time' WHERE id='$artId' ";
  if (mysqli_query($conn, $sql)) {
    echo '<script> alert("the artical has been updated.");location.href="/index.php?act=art_manage";</script>';
  }else {
    echo '<script> alert("fail update.");history.back();</script>';
  }
}

function db_dele_art($conn, $artId)
{
  $sql = "DELETE FROM blog_article WHERE id='$artId'";
  if (mysqli_query($conn, $sql)){
    echo '<script> alert("the artical has been deleted.");location.href="/index.php?act=art_manage";</script>';
  }else {
    echo '<script> alert("fail dele.");history.back();</script>';
  }
}

function db_edit_user($conn, $userName, $password, $userId)
{
  $update_time = time();
  $sql = "UPDATE blog_user SET username='$userName', password='$password',update_time='$update_time' WHERE id='$userId'";
  if (mysqli_query($conn, $sql)){
    echo '<script> alert("the user information has been updated.");location.href="/index.php?act=user_manage";</script>';
  }else {
    echo '<script> alert("fail updated.");history.back();</script>';
  }
}

?>
