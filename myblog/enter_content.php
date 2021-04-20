<?php
include 'function.php';
$conn = db_link($db);
$catlist = db_query_cat($conn);
foreach ($catlist as $cat){
  if ($cat['id'] == $_GET['cat']){
    $catName = $cat['cat_name'];
    $cat_id = $cat['id'];
  }
}

$where = 'cat_id='.$cat_id;

$artlist = db_query_key($conn, 'blog_article',$where);


foreach ($artlist as $art){
  if ($art['id'] == $_GET['id']){
    $artCurrent = $art['title'];
    $contCurrent = $art['content'];
  }
}

$tplName = 'content_tpl';


 ?>
