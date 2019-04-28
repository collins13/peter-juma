<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link href="bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
      </script>
  </head>
  <body>
    <!-- Modal -->
    <!-- Button trigger modal
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
      Launch demo modal
    </button>-->
    <div class="article">
<h3 class="text-center">This is article:  <?=$detailsrow['title']?></h3><hr>
<div class="article-rate">
 <h2>Rate this Article:</h2>
 <?php foreach (range(1, 5) as $rating): ?>
   <a href="rate.php?article=<?=$detailsrow['id']?>&rating=<?=$rating;?>"><i class="fa fa-star fa-2x"><?=$rating;?></i></a>

 <?php endforeach; ?>

</div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
<script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
//jQuery
$(window).load(function(){
   setTimeout(function(){
       $('#exampleModalLong').modal('show');
   }, 5000);
});

  </body>
</html>
