<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
<?php include '../config/config.php'; ?>
<style media="screen">
.ck-editor__editable {
  min-height: 300px;
}
.error{
  color: red;
  font-weight:bold;
  font-size: 15px;
}
.error{
  color: red;
  font-weight: bold;

}

</style>
    <div id="wrapper">

      <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

<?php $sql  = $conn->query("SELECT * FROM newsletter"); ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="send.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Send Newslatter</li>
          </ol>

          <div class="card">
        <div class="card-header">
          Send Newsletter
        </div>
        <div class="card-body">
          <div id="list-elements">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Created On</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Creator Email</th>
      <th scope="col">Sender Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($sql)) : ?>
    <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['subject'];?></td>
      <td><?=$row['time'];?></td>
      <td><?=$row['sender_name'];?></td>
      <td><?=$row['sender_email'];?></td>
      <td><?=$row['creator_name'];?></td>
      <td>
        <a href="edit.php?edit=<?=$row['id'];?>" class="btn btn-outline-success btn-sm">Preview </a> |
        <a href="send.php?send=<?=$row['id']?>" class="btn btn-outline-success btn-sm">Send</a>
      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
          </div>
        </div>
      </div>

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
