<!--添加博文模板-->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h3 class="text-center">New Blog</h3>
        <form action="/index.php?act=do_art_insert" method="post">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Subject" name="title" value="" autofocus>
            </div>

            <div class="form-group" >
            <textarea class="form-control" rows="12"  name="content" id="editor">
            </textarea>
            </div>

            <div class="form-group">
                <select class="form-control" name="cat_id" required>
                    <option selected>---Class---</option>

                    <?php foreach($catList as $cat):?>

                    <option value="<?php echo $cat['id'];?>" ><?php echo $cat['cat_name']; ?> </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-info btn-block">添加</button>
        </form>


    </div>
    <div class="col-md-2"></div>
</div>
<div class="row" style="height: 30px;"></div>
