<?php include 'includes/header.php'; ?>

<style media="screen">
.content{
border: 0px solid black;
border-radius: 3px;
padding: 5px;
margin: 0 auto;
width: 50%;
}

.post{
border-bottom: 1px solid black;
padding: 10px;
margin-top: 10px;
margin-bottom: 10px;
}

.post:last-child{
border: 0;
}

.post h1{
font-weight: normal;
font-size: 30px;
}

.post a.link{
text-decoration: none;
color: black;
}

.post-text{
letter-spacing: 1px;
font-size: 15px;
font-family: serif;
color: gray;
text-align: justify;
}
.post-action{
margin-top: 15px;
margin-bottom: 15px;
}

.like,.unlike{
border: 0;
background: none;
letter-spacing: 1px;
color: lightseagreen;
}

.like,.unlike:hover{
cursor: pointer;
}
</style>
<div class="content">

 <?php
  include 'config/config.php';
 $userid = 4;
 $query = "SELECT * FROM recipes";
 $result = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($result)){
  $postid = $row['id'];
  $title = $row['title'];
  $content = $row['body'];

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
   <h1><a href="#" class='link' target='_blank'><?php echo $title; ?></a></h1>
   <div class="post-text">
    <?php echo $content; ?>
   </div>
   <div class="post-action">
   <!-- Rating -->
   <select class='rating' id='rating_<?php echo $postid; ?>' data-id='rating_<?php echo $postid; ?>'>
    <option value="1" >1</option>
    <option value="2" >2</option>
    <option value="3" >3</option>
    <option value="4" >4</option>
    <option value="5" >5</option>
   </select>
   <div style='clear: both;'></div>
   Average Rating : <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?></span>

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
<?php include 'includes/footer.php'; ?>
