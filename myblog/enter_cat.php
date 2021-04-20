<?php
include 'function.php';
//为导航准备数据
$conn = db_link($db);
$catlist = db_query_cat($conn);

foreach ($catlist as $cat){
  if ($cat['id'] == $_GET['cat']){
    $catName = $cat['cat_name'];
    $catId = $cat['id'];
  }
}
$where = 'cat_id='.$catId;
//为分页准备数据
$artListAll = db_query_key($conn, 'blog_article',$where);
$totalNum = count($artListAll);//最大记录数
$maxPage = ceil($totalNum/$num);//最大分页数
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page-1)*$num;//偏移量计算
$table = 'blog_article';
$conn = db_link($db);
$artList = db_query_keys($conn, $table, $where, $offset, $num);
$perfix = '?'.key($_GET).'='.current($_GET);

$tplName = 'index_tpl';

?>
