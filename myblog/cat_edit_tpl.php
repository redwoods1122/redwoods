<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3 class="text-center">Edit Class</h3>
        <form action="/index.php?act=do_cat_edit&id=<?php echo $catCurrent['0']['id']; ?>" method="post">
            <div class="form-group">
            <input type="text" class="form-control"  placeholder="Class Name" name="cat_name" value="<?php echo $catCurrent['0']['cat_name']; ?>">
            </div>
            <button type="submit" class="btn btn-info btn-block">Save</button>
        </form>


    </div>
    <div class="col-md-4"></div>
</div>
<div class="row" style="height: 30px;"></div>
