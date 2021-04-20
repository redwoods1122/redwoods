
<table class="table table-bordered">
      <h4>Classification</h4>
      <thead>
      <tr>
        <th>Name</th><th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($catList as $cat): ?>
      <tr>
        <td><?php echo $cat['cat_name']; ?></td>
        <td class="text-left">
                    <a href="/index.php?act=cat_edit&id=<?php echo $cat['id']; ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="/index.php?act=cat_dele&id=<?php echo $cat['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td></td><td><a href="/index.php?act=cat_insert" class="btn btn-success" style="float: left">Add</a></td>
      </tr>
      </tbody>

</table>
