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
<?php
$subjecterr ='';
$semailerr ='';
$snameerr ='';
$contenterr ='';

$subject = ((isset($_POST['subject']))?$_POST['subject']: '');
$semail = ((isset($_POST['semail']))?$_POST['semail']: '');
$sname = ((isset($_POST['sname']))?$_POST['sname']: '');
$content = ((isset($_POST['content']))?$_POST['content']: '');
if ($_POST) {
if (empty($subject)) {
  $subjecterr='subject field is required';
}else {
  $subject = mysqli_real_escape_string($conn, $subject);
}
if (empty($semail)) {
  $semailerr='sender email field is required';
}else {
  $semail = mysqli_real_escape_string($conn, $semail);
}
if (empty($sname)) {
  $snameerr='sender name field is required';
}else {
  $sname = mysqli_real_escape_string($conn, $sname);
}
if (empty($content)) {
  $contenterr='content field is required';
}else {
  $content = mysqli_real_escape_string($conn, $content);
 }

 if (!empty($subject) && !empty($semail) && !empty($sname) && !empty($content)) {
   $sql = $conn->query("INSERT INTO newsletter(subject, sender_email, sender_name, creator_name, description, time, status)
                                   VALUES('$subject', '$semail', '$sname','$_SESSION[f_name]', '$content', now(), 'active')");
 }
}
 ?>
    <div id="wrapper">

      <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">newslatter</li>
          </ol>

          <div class="card">
        <div class="card-header">
          Newsletter
        </div>
        <div class="card-body">
          <div id="form-elements">
            <form class="" action="newslatter.php" method="post">
          <div class="row">
              <div class="form-group col-md-6">
                <label for="subject">Subject</label>
                <span class="error">* <?php echo $subjecterr;?></span>
                <input type="text" name="subject" id="subject" value="" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="semail">Sender email</label>
                <span class="error">* <?php echo $semailerr;?></span>
                <input type="email" name="semail" id="semail" value="<?=$semail;?>" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="sname">Sender's Name</label>
                <span class="error">* <?php echo $snameerr;?></span>
                <input type="text" name="sname" id="sname" value="<?=$sname;?>" class="form-control">
              </div>
          </div>
          <div class="form-group">
            <label for="content">content</label>
            <span class="error">* <?php echo $contenterr;?></span>
            <textarea name="content" id="content" rows="8" cols="80" class="form-control"><?=$content;?></textarea>
            <script>
            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
            </script>
          </div>
          <input type="submit" value="Send newsletter" class="btn btn-block btn-success">
            </form>

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
