<div class="row">
  <div class="col-md-8">
    <div class="page-header">
     <h2><?php echo strtoupper($catName); ?>   Article</h2>
   </div>
  </div>
  <div class="col-md-4">
    <div class="page-header">
     <h3>Leaderboard</h3>
  </div>
</div>

<div class="col-md-8">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach ($artList as $art): ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $art['title']; ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php
          $content = htmlspecialchars_decode($art['content']);
          $content = mb_substr($content,0,100);
          echo $content;
        ?>
        <a  class="btn btn-info btn-xs" href="/index.php<?php echo '?cat='.$catId.'&id='.$art['id']; ?>" role="button">click read it</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

</div>
</div>
<?php include 'right.php'; ?>
<?php include 'page.php'; ?>
