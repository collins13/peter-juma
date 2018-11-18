<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<style media="screen">
  body{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    line-height: 1.6;
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
</style>
<!-- Modal -->
<?php include 'includes/modal-data.php'; ?>
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Welcome to FoodTrendz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="closeBtn">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
    <div class="container">
      <h1 class="my-4">Welcome to Modern Business</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <?php
         $recipe = $conn->query("SELECT * FROM recipes");

       ?>

      <!-- Portfolio Section -->
      <h2>Portfolio Heading</h2>

      <div class="row">
<?php while($row = mysqli_fetch_assoc($recipe)) : ?>
        <div class="col-lg-3 col-sm-6 portfolio-item">
          <div class="card h-100 bg-transparent">
            <a href="#"><img class="card-img-top img-responsive" src="images/<?=$row['image1'];?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <h4><i><?=$row['title']?></i></h4>
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
              <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-success pull-right ">View this recipe</a>
              </div>
            </div>
             <!--<div class="card-footer bg-transparent border-success">
               <a href="details-modal.php?id=<?=$row['id'];?>" class="btn btn-outline-success btn-block">read more about the recipe</a>
             </div>-->
          </div>
        </div>
      <?php endwhile; ?>

    </div><hr>
      <!-- /.row -->
      <?php
         $video = $conn->query("SELECT * FROM videos LIMIT 1");

       ?>
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Modern Business Features</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <?php while($row1 = mysqli_fetch_assoc($video)) : ?>
        <div class="col-lg-6">
          <video width="320" height="240" width="100%;" controls>
              <source src="videos/<?=$row1['name']?>" type="video/mp4">
              Your browser does not support the video tag.
          </video>
        </div>
      <?php endwhile; ?>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>To receive latest updates about recipes and our newslatter texts about food please subscribe</p>
        </div>
        <div class="col-md-4">
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
