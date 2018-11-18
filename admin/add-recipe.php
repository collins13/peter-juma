<!DOCTYPE html>
<?php include 'scripts/add-post.php'; ?>
<?php include 'includes/header.php'; ?>
<style media="screen">
.ck-editor__editable {
  min-height: 300px;
}
.error{
  color: red;
  font-weight:bold;
  font-size: 15px;
}

</style>
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
            <li class="breadcrumb-item active">Overview</li>
          </ol>


          <!-- DataTables -->
          <?php if (isset($_GET['add'])): ?>
          <div class="card text-center">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">

                  <form action="add-recipe.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label for="title">Recipe Tiitle:</label>
                      <span class="error"><?=$titile_error;?></span>
                      <input type="text" class="form-control" name="title" id="title" required="required" value="<?=$title;?>" aria-describedby="titleHelp" placeholder="Enter title">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="title">image1:</label>
                      <input type="file" class="form-control" name="image1" id="image1" required="required" aria-describedby="titleHelp" placeholder="Enter image1">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="title">image2:</label>
                      <input type="file" class="form-control" name="image2" id="image2" required="required" aria-describedby="titleHelp" placeholder="Enter image1">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="title">image3:</label>
                      <input type="file" class="form-control" name="image3" id="image3" required="required" aria-describedby="titleHelp" placeholder="Enter image1">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="title">video:</label>
                      <input type="file" class="form-control" name="image4" id="image4" required="required" aria-describedby="titleHelp" placeholder="Enter image1">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="content">Method*:</label>
                <span class="error"><?=$titile_error;?></span>
                  <textarea name="content" class="form-control" id="content"><?=$content?></textarea>
                  <script>
                  ClassicEditor
                      .create( document.querySelector( '#content' ) )
                      .catch( error => {
                          console.error( error );
                      } );
		              </script>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-outline-success btn-block">Submit</button>
                    </div>
                    <div class="col-md-6">
                      <a href="add-recipe.php" class="btn btn-outline-danger btn-block">Cancel</a>
                    </div>
                  </div>

                </form>

                </div>
                <div class="card-footer text-muted">
                  2 days ago
                </div>
         </div>
       <?php else : ?>
         <a href="add-recipe.php?add=1" class="btn btn-success">Add New Recipe</a><hr>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
          <?php endif; ?>
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
