<div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h2><?php echo $artCurrent; ?></h2>
        </div>
    </div>


<!--    用带标题的面板做博文详情页-->

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">首页</a></li>
                        <li><a href="#"><?php echo $catName;?></a></li>
                        <li class="active"><?php echo $artCurrent; ?></li>
                    </ol>
                </div>
                <div class="panel-body">
                    <?php
                        //将博文内容先解码:实体字符转预定义标签
                        $content = htmlspecialchars_decode($contCurrent);

                        //将转码后的内容显示出来
                        echo $content;
                         ?>
                </div>
            </div>
        </div>

    </div>
