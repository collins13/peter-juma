<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php
if (isset($_GET['id'])) {
  $details_id = $_GET['id'];

  $details = $conn->query("SELECT * FROM recipes WHERE id ='$details_id'");
}

 ?>

<div class="container" style="margin-top:5px;">

</div>
<div class="col-sm-6">

  </div>

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
      <div class="col-12 col-md-4">hello</div>
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
    2 days ago
  </div>
</div>
  </div>
<?php endwhile; ?>
<?php $details1 = $conn->query("SELECT * FROM recipes ORDER BY id DESC LIMIT 3"); ?>
  <div class="col-6 col-md-4">
    <div class="card">
  <div class="card-header" style="background:green; color:white;">
    <h4>Related Recipes</h4>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <?php while($advert = mysqli_fetch_assoc($details1)) : ?>
    <div class="row">
  <div class="col-md-8">
    <div class="thumbnail">
      <a href="images/pexels-photo-675951.jpeg">
        <img src="images/<?=$advert['image1']?>" alt="Fjords" style="width:100%">
        <div class="caption">
          <a href="detail-modal.php?id=<?=$advert['id']?>">view this recipe</a><hr>
        </div>
      </a>
    </div>
  </div>
</div>
<?php endwhile ?>
  </div>
 </div>
</div>
</div>
<h2>Our Customers</h2>
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
</div>
<!-- /.row -->

</div><hr>

<?php include 'includes/footer.php'; ?>
