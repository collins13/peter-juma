<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>
<div class="container" style="margin-top:80px;">

<?php
if (isset($_POST['search_submit'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);

  $sql = $conn->query("SELECT * FROM recipes WHERE title LIKE '%$search%' OR body LIKE' %$search%' OR image1 LIKE '%$search%'");
  $queryResult = mysqli_num_rows($sql);
  echo "there are ".$queryResult." result!";


  if ($queryResult > 0) {?>

    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
    <div class="col-lg-3 col-sm-6 portfolio-item">
        <div class="card h-100 bg-transparent">
          <div class="card-body">
            <h4 class="card-title">
                <a href="all.php?title=<?=$row['title']?>"><h4><?=$row['title']?></h4>
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
          </div>
           <!--<div class="card-footer bg-transparent border-success">
             <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-outline-success btn-block">read more about the recipe</a>
           </div>-->
        </div>
      </div>
      <?php }?>
    </div>
    <?php
  }else {
    echo "there are no result matching your search";
  }
}


 ?>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
