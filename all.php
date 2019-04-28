<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
      <?php
      $title = mysqli_real_escape_string($conn, $_GET['title']);
         $recipe = $conn->query("SELECT * FROM recipes WHERE title ='$title'");

         $recipeQuery = mysqli_num_rows($recipe);

       ?>

      <!-- Portfolio Section -->
      <h2>Portfolio Heading</h2>
      <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <div class="row">
            <?php if ($recipeQuery > 0): ?>

    <?php while($row = mysqli_fetch_assoc($recipe)) : ?>
            <div class="col-lg-3 col-sm-6 portfolio-item">
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
                 <!--<div class="card-footer bg-transparent border-success">
                   <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-outline-success btn-block">read more about the recipe</a>
                 </div>-->
              </div>
            </div>
          <?php endwhile; ?>
    <?php endif; ?>
        </div>

        </div>
      </div>


<?php include 'includes/footer.php'; ?>
  </body>

</html>
