<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

    <div id="wrapper">

      <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Archives</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-archive"></i>
              Archives data table</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Ratings</th>
                      <th>Restore</th>
                      <th>Clear</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Ratings</th>
                      <th>Restore</th>
                      <th>Clear</th>
                    </tr>
                  </tfoot>
                  <?php
                  include '../config/config.php';
                   $archive = $conn->query("SELECT * FROM recipes WHERE archive =1");
                   if (isset($_GET['restore'])) {
                     $restore_id = $_GET['restore'];

                     $update = $conn->query("UPDATE recipes SET archive = 0 WHERE id ='$restore_id'");

                   }

                   if (isset($_GET['delete'])) {
                    $delete_id = $_GET['delete'];

                     $delete = $conn->query("DELETE FROM recipes WHERE id ='$delete_id'");
                   }
                  ?>
                  <tbody>
                 <?php while($check = mysqli_fetch_assoc($archive)): ?>
                   <tr>
                     <td><?=$check['id'];?></td>
                     <td><?=$check['title'];?></td>
                     <td>
                       <img src="../images/<?=$check['image1'];?>" alt="image1"
                       class="img img-responsive"
                       style="width:20%">
                     </td>
                     <td><?=$check['category'];?></td>
                     <td><?=$check['ratings'];?></td>
                     <td><a href="archive.php?restore=<?=$check['id']?>" class="btn btn-success btn-sm">Restore</a></td>
                     <td><a href="archive.php?delete=<?=$check['id']?>" class="btn btn-danger btn-sm">Empty</a></td>
                   </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
