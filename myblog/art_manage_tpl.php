<table class="table table-bordered">
      <h4>Article</h4>
      <thead>
      <tr>
        <th>Title</th><th>Class</th><th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($artList as $art): ?>
      <tr>
        <td><?php echo $art['title']; ?></td>
        <td><?php echo $art['cat_id']; ?></td>
        <td class="text-left">
                    <a href="/index.php?act=art_edit&id=<?php echo $art['id']; ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="/index.php?act=art_dele&id=<?php echo $art['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td></td><td></td><td><a href="/index.php?act=art_insert" class="btn btn-success" style="float: left">Add</a></td>
      </tr>
      </tbody>

</table>
<?php include 'page.php'; ?>
