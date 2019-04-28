<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'functions/helpers.php'; ?>
<style media="screen">
html, body, body div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, figure, footer, header, hgroup, menu, nav, section, time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}
  .modal{
    position: fixed;
    z-index: 0.5;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);

  }
  .modal-content{
    background-color: #f4f4f4;
    margin: 20% auto;
    width: 100%;
    height: 100%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2),0 7px 20px 0 rgba(0, 0, 0, 0.17);
    animation-name: modalopen;
    animation-duration: 3s;
    background-image: url("images/download.jpeg");
  }
  .modal-header h3, .modal-footer h4{
    margin: 0;
  }
  .modal-header{
    background: coral;
    padding: 15px;
    color: #fff;
  }
  .modal-body{
    padding: 10px 20px;
  }
  .modal-footer{
    background: coral;
    padding: 10px;
    color: #fff;
    text-align: center;
  }
  @keyframes modalopen {
    from{opacity: 0}
    to{opacity: 1}

  }
  a.clearfix{
    color:black;
    text-decoration: none;
  }
</style>
<!-- Modal -->
<?php include 'includes/modal-data.php'; ?>
  <div id="loading"></div>
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Welcome to FoodTrendz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="closeBtn">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
             <div class="card h-100">
               <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
               <div class="card-body">
                 <h4 class="card-title">
                   <a href="#">Item Two</a>
                 </h4>
               </div>
             </div>
           </div>
           <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card h-100">
                 <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                 <div class="card-body">
                   <h4 class="card-title">
                     <a href="#">Item Two</a>
                   </h4>
                 </div>
               </div>
             </div>
        </div>
        <h3>To receive Latest Updates on food tranndz please Subscribe below</h3>
        <form class="" action="index.php" method="post">
          <div class="row">
            <div class="form-group col-md-8">
              <input type="email" name="email" value="<?=$email?>" class="form-control" placeholder="Your email...">
            </div>
            <div class="form-group">
              <input type="submit"  value="Subscribe" class="btn btn-outline-danger">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
    <?php include 'includes/couricel.php'; ?>
    <!-- Page Content -->
    <div class="container-fluid"><hr/>
      <!-- Marketing Icons Section -->
      <?php $week = $conn->query("SELECT * FROM recipes ORDER BY id DESC LIMIT 1"); ?>
      <h1 style="font-size:30px; margin-bottom:3px;"><b>Be the cook everybody needs!</b></h1>
      <div class="row">
        <div class="col-md-6">
            <?php while($best = mysqli_fetch_assoc($week)): ?>
      <div class="card flex-md-row mb-4 box-shadow h-md-250" style="height:90%;">
        <div class="col-md-6">
          <img class="card-img-right img-responsive"
                style="width:100%; height:100%;" src="images/<?=$best['image1'];?>" alt="Card image cap">
        </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Best of the week</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#"><?=$best['title'];?></a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto"><?=shortentext($best['body']);?></p>
              <a href="details-modal.php?id=<?=$best['id'];?>">Continue reading</a>
            </div>
          </div>
      </div>
       <?php endwhile; ?>
    </div>

      <style media="screen">
        .card-img-right{
          height: 80%;
          width: 50%;
        }
      </style>
      <?php
      $top_rated = $conn->query("SELECT *  FROM recipes, post_rating WHERE post_rating.postid =recipes.id ORDER BY rating DESC LIMIT 1");
       ?>
      <div class="col-md-6">
        <?php while($rated = mysqli_fetch_assoc($top_rated)): ?>
        <div class="card flex-md-row mb-4 box-shadow h-md-250"  style="height:90%;">
          <div class="col-md-6">
            <img class="card-img-right img-responsive"
                  style="width:100%; height:100%;" src="images/<?=$rated['image1'];?>" alt="Card image cap">
          </div>
          <div class="col-md-6">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Top rated</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#"><?=$rated['title'];?></a>
            </h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="card-text mb-auto"><?=shortentext($rated['body']);?></p>
            <a href="details-modal.php?id=<?=$rated['id'];?>">Continue reading</a>
          </div>
        </div>
      </div>
<?php endwhile; ?>
      </div>
      </div>
        <!-- /.row -->
      <?php
         $recipe = $conn->query("SELECT * FROM recipes WHERE archive = 0");

         $recipeQuery = mysqli_num_rows($recipe);

       ?>

      <!-- Portfolio Section -->
<hr>

      <div class="row">
        <?php if ($recipeQuery > 0): ?>

<?php while($row = mysqli_fetch_assoc($recipe)) : ?>
    <div class="col-md-3 col-sm-6 mb-4 portfolio-item card-block">
      <a href="details-modal.php?id=<?=$row['id'];?>" class="clearfix">
        <div class="card h-100 view zoom">
          <img class="card-img-top img-responsive" src="images/<?=$row['image1'];?>" alt="">
          <div class="card-body">
            <h6 class="card-title" style="font-weight:bold;">
              <?=$row['title']?>
            </h6>
            <h4 style=" font-size: smaller;  font-family: serif;"><?=shortenText($row['body']);?></h4>
          </div>
          <!-- rating result-->
          <?php

          // User rating
          $query = "SELECT * FROM post_rating WHERE postid='$row[id]'";
          $userresult = mysqli_query($conn,$query) or die(mysqli_error());
          $fetchRating = mysqli_fetch_array($userresult);
          $rating = $fetchRating['rating'];

          // get average
          $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid='$row[id]'";
          $avgresult = mysqli_query($conn,$query) or die(mysqli_error());
          $fetchAverage = mysqli_fetch_array($avgresult);
          $averageRating = $fetchAverage['averageRating'];

          $query = "SELECT ROUND(AVG(rating),1) as averageCount FROM post_rating WHERE postid='$row[id]'";
          $avgresult = mysqli_query($conn,$query) or die(mysqli_error());
          $fetchAverage = mysqli_fetch_array($avgresult);
          $averageCount = $fetchAverage['averageCount'];

          if($averageRating <= 0){
           $averageRating = "Not rated.";
         }elseif ($averageRating == 1) {
          $averageRating = '<h1>&#9733;</h1>';
        }elseif ($averageRating == 2) {
          $averageRating = '<p>&#9733; &#9733;</p>';
        }elseif ($averageRating == 3) {
          $averageRating = '<p>&#9733; &#9733; &#9733;</p>';
        }elseif ($averageRating == 4) {
          $averageRating = '<p>&#9733; &#9733; &#9733; &#9733;</p>';
        }elseif ($averageRating == 5) {
          $averageRating = '<p>&#9733; &#9733; &#9733; &#9733; &#9733;</p>';
         }

         //average count

         if ($averageCount <=0) {
           $averageCount = 0;
         }
           ?>
          <div class="card-footer row">
            <div class="col-md-8">
            <small class="text-warning co-md-8"><?=$averageRating;?><!--&#9733; &#9733; &#9733; &#9733; &#9734;--></small>
          </div>
          <div class="col-md-4">
            <p><?=$averageCount;?> stars</p>
          </div>
          </div>
        </div>
        </a>
      </div>
      <!--  <div class="col-lg-3 col-sm-6 portfolio-item">
          <div class="card h-100 bg-transparent">
            <a href="#"><img class="card-img-top img-responsive" src="images/<?=$row['image1'];?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <h4><?=$row['title']?></h4>
              </h4><br/>
              <div class="ratings">
              <p>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                (35)
              </p>
              </div>
              <div class="foot">
              <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-outline-success pull-right" style="border-radius:0;">View this recipe</a>
              </div>
            </div>
             <div class="card-footer bg-transparent border-success">
               <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-outline-success btn-block">read more about the recipe</a>
             </div>
          </div>
        </div>-->
      <?php endwhile; ?>
    <?php elseif($recipeQuery == 0):?>
<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
</div>
<?php endif; ?>
    </div><hr>
      <!-- /.row -->
      <?php
         $video = $conn->query("SELECT * FROM videos LIMIT 1");

       ?>

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-6">
          <p>To receive latest updates about recipes and our newslatter texts about food please subscribe</p>
        </div>
        <div class="col-md-6">
          <form class="form-inline">
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" placeholder="your email....">
  </div>
  <button type="submit" class="btn btn-outline-danger mb-2">Subscribe</button>
</form>
        </div>
      </div>

    </div>
    <!-- /.container -->
<?php include 'includes/footer.php'; ?>
  </body>

</html>
