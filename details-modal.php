<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'functions/helpers.php'; ?>
<?php
if (isset($_GET['id'])) {
  $details_id = $_GET['id'];

  $details = $conn->query("SELECT * FROM recipes WHERE id ='$details_id'");
}

 ?>

<div class="container-fluid">
    <div class="row">
      <?php while($detailsrow = mysqli_fetch_assoc($details)) : ?>
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-body">
              <?php include 'includes/details-couricel.php'; ?>
            <h5 class="card-title"><?=$detailsrow['title']?></h5>
          </div>
        </div>
      </div>
      <!--rating racipe-->
      <div class="col-12 col-md-4">
        <div class="content">

         <?php
          include 'config/config.php';
         $userid = 4;
         $query = "SELECT * FROM recipes WHERE id ='$details_id'";
         $result = mysqli_query($conn,$query);
         while($row = mysqli_fetch_array($result)){
          $postid = $row['id'];
          $title = $row['title'];
          $content = $row['body'];
          $image = $row['image1'];

          // User rating
          $query = "SELECT * FROM post_rating WHERE postid='$postid' and userid='$userid'";
          $userresult = mysqli_query($conn,$query) or die(mysqli_error());
          $fetchRating = mysqli_fetch_array($userresult);
          $rating = $fetchRating['rating'];

          // get average
          $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid='$postid'";
          $avgresult = mysqli_query($conn,$query) or die(mysqli_error());
          $fetchAverage = mysqli_fetch_array($avgresult);
          $averageRating = $fetchAverage['averageRating'];

          if($averageRating <= 0){
           $averageRating = "No rating yet.";
          }
         ?>
          <div class="post">
           <h1>Rate this <a href="#" class='link' target='_blank'><?php echo $title; ?></a> Recipe</h1>
           <img src="images/<?=$image;?>" alt="rate-image" class="img-fluid rounded"><hr/>
           <div class="post-action">
           <!-- Rating -->
           <div class="card">
              <div class="card-body">
                <h5 class="card-title">Give us 5 star</h5>
                <select class='rating' id='rating_<?php echo $postid; ?>' data-id='rating_<?php echo $postid; ?>'>
                 <option value="1">1</option>
                 <option value="2" >2</option>
                 <option value="3" >3</option>
                 <option value="4" >4</option>
                 <option value="5" >5</option>
               </select></p>

              </div>
              <div class="card-footer" style="height:70px;">
                <div class="alert alert-success" role="alert">
                  <strong>Well !</strong>
                  Average Rating for this recipe :
                  <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?></span>.
               </div>
              </div>
          </div>
           <div style='clear: both;'></div>



           <!-- Set rating -->
           <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.min.js"></script>
           <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
           <script type='text/javascript'>
           $(document).ready(function(){
            $('#rating_<?php echo $postid; ?>').barrating('set',<?php echo $rating; ?>);
           });
           </script>
           </div>
          </div>
         <?php
         }
         ?>

        </div>
      </div>
      <!--end rating-->
    </div>
<hr>
  <div class="row">
  <div class="col-6 col-md-8">
    <div class="card">
  <div class="card-header" style="background:green; color:white;">
    <h4>Procedures</h4>
  </div>
  <div class="card-body">
    <p class="card-text"><?=$detailsrow['body'];?></p>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
  </div>
<?php endwhile; ?>

<?php $details1 = $conn->query("SELECT * FROM recipes ORDER BY id DESC LIMIT 3"); ?>
  <div class="col-6 col-md-4">
<?php while($advert = mysqli_fetch_assoc($details1)): ?>
<div class="card flex-md-row mb-4 box-shadow h-md-250" style="height:30%;">
<div class="col-md-5">
  <img class="img-fluid" src="images/<?=$advert['image1'];?>" style="width:100%; height:100%;">
</div>
  <div class="card-body">
    <div class="col-md-7">
    <p class="card-text"><?=shortentext($advert['body']);?></p>
    <a href="details-modal.php?id=<?=$advert['id']?>"><i class="fa fa-hand-point-right"></i> this recipe</a>
  </div>
</div>
</div>
      <?php endwhile; ?>
</div><br/>
</div>
<!--<h2>Our Customers</h2>
<div class="row">
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
  <div class="col-lg-2 col-sm-4 mb-4">
    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
  </div>
</div>-->
<!-- /.row -->
<?php
$name = ((isset($_POST['name']))?$_POST['name']:'');
$content = ((isset($_POST['content']))?$_POST['content']:'');

if($_POST){
  $insert = $conn->query("INSERT INTO comments(name, comment) VALUES('$name', '$content')");
}

 ?>
<div id="comments">
  <div class="card">
  <div class="card-header">
    Drop a comment below
  </div>
  <div class="card-body">
    <form class="" action="details-modal.php?id=<?=$details_id ?>" method="POST">
      <div class="form-group col-md-6">
        <label for="name">Name*</label>
        <input type="text" name="name" value="<?=$name?>" required placeholder="enter your name" class="form-control">
      </div>
      <div class="form-group col-md-6">
          <label for="name">Message*</label>
      <textarea name="content" rows="8" cols="80" class="form-control" id="content" required><?=$content?></textarea>
      <script>
      ClassicEditor
          .create( document.querySelector( '#content' ) )
          .catch( error => {
              console.error( error );
          } );
      </script>
      </div>
      <div class="form-group col-md-6">
      <input type="submit" value="Comment" class="btn btn-success">
      </div>
    </form>

  </div>
  <hr>
  <a href="#" class="btn btn-primary col-md-6" id="view">View Comments</a>
  <style media="screen">
  .ck-editor__editable {
    min-height: 300px;
  }
  .error{
    color: red;
    font-weight:bold;
    font-size: 15px;
  }
  .container {
border: 2px solid #dedede;
background-color: #f1f1f1;
border-radius: 5px;
padding: 10px;
margin: 10px 0;
}

/* Darker chat container */
.darker {
border-color: #ccc;
background-color: #ddd;
}

/* Clear floats */
.container::after {
content: "";
clear: both;
display: table;
}

/* Style images */
.container img {
float: left;
max-width: 60px;
width: 100%;
margin-right: 20px;
border-radius: 50%;
}

/* Style the right image */
.container img.right {
float: right;
margin-left: 20px;
margin-right:0;
}

/* Style time text */
.time-right {
float: right;
color: #aaa;
}

/* Style time text */
.time-left {
float: left;
color: #999;
}

#view-comments{
  display: none;
  margin-left: 10px;
}
#view{
  margin-left: 10px;
  margin-bottom: 10px;
}

  </style>

    <?php $comments = $conn->query("SELECT * FROM comments") ?>
  <div id="view-comments">
    <?php while($all = mysqli_fetch_assoc($comments)): ?>
  <div class="container">
  <img src="images/default-avatar_s.gif" alt="Avatar">
  <p><?=$all['name']?></p>
  <p><?=$all['comment']?></p>
  <span class="time-right"><?=$all['date']?></span>
</div>
<?php endwhile; ?>
</div>
</div>

</div>
</div><hr>


<?php include 'includes/footer.php'; ?>
