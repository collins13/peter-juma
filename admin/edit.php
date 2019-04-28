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
#description{
  padding: 10px;
  border: 1px solid #c8c8c8;
  width: 500px;
  min-height: 200px;
  margin-top: 20px;
}
#heading{
  margin-top: 20px;
  font-size: 18px;
  font-weight: bold;
}
#option{
  margin-top: 15px;
}
#view-form{
  display: none;
  margin-top: 20px;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
  $('#edit-newsletter').click(function(){
    $('#view-form').slideToggle(700);
    return false;
  });
});

</script>
    <div id="wrapper">

      <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <?php
if (isset($_GET['edit'])) {
  $edit_id = $_GET['edit'];
}
     ?>

<?php $sql  = $conn->query("SELECT * FROM newsletter WHERE id = '$edit_id'"); ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="send.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Preview Newslatter</li>
          </ol>

          <div class="card">
        <div class="card-header">
          Preview Newsletter
        </div>
        <div class="card-body">
          <div id="preview-elements">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Sender Name</th>
      <th scope="col">Sender Email</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($edit_id == true): ?>
    <?php while($row = mysqli_fetch_assoc($sql)) : ?>
    <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['subject'];?></td>
      <td><?=$row['sender_name'];?></td>
      <td><?=$row['sender_email'];?></td>
    </tr>
  <?php endwhile; ?>
<?php else: ?>
  <div class="alert alert-danger" role="alert">
  <strong>Ooops!!</strong> Invalid Newletter please choose another one.
</div>
    <?php endif; ?>
  </tbody>
</table><hr>
<?php $description = $conn->query("SELECT * FROM newsletter WHERE id ='$edit_id'"); ?>
<h3 id="heading">Newslatter Description</h3>
<div id="description">
  <?php while($row1 = mysqli_fetch_assoc($description)) : ?>
<?=$row1['description'];?>
  <?php endwhile; ?>
</div>

<!--delete newsletter-->
<?php
$delete = $conn->query("DELETE FROM newslatter WHERE id ='$edit_id'");

 ?>
<div id="option">
  <a href="#" id="edit-newsletter" class="btn btn-outline-warning btn-sm">Edit</a> |
  <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
</div>
<?php $update = $conn->query("SELECT * FROM newsletter WHERE id ='$edit_id'"); ?>
<?php while ($row2 = mysqli_fetch_assoc($update) ) {
  $subject = $row2['subject'];
  $semail = $row2['sender_email'];
  $sname = $row2['sender_name'];
  $content = $row2['description'];
} ?>

  <form class="" action="edit.php?edit=<?=$edit_id;?>" method="post">
  <div id="view-form">
    <h3>Edit Newletter</h3>
    <div class="form-group col-md-6">
      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" value="<?=$subject;?>" class="form-control">
    </div>
    <input type="hidden" name="hidden_id" value="<?=$edit_id;?>">
    <div class="form-group col-md-6">
      <label for="subject">Sender Email</label>
      <input type="email" name="semail" id="semail" value="<?=$semail;?>" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="subject">Sender Name</label>
      <input type="text" name="sname" id="sname" value="<?=$sname;?>" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <textarea name="content" id="content" class="form-control" rows="8" cols="80"><?=$content;?></textarea>
      <script>
      ClassicEditor
          .create( document.querySelector( '#content' ) )
          .catch( error => {
              console.error( error );
          } );
      </script>
    </div>
    <input type="submit" value="Edit Newsletter" name="submit" class="btn btn-outline-success">
</div>
  </form>
          </div>
        </div>
      </div>
      <?php
      $subject = ((isset($_POST['subject']))?$_POST['subject']:'');
      $semail = ((isset($_POST['sender_email']))?$_POST['sender_email']:'');
      $sname = ((isset($_POST['sender_name']))?$_POST['sender_name']:'');
      $content = ((isset($_POST['description']))?$_POST['description']:'');
      $id = ((isset($_POST['hidden_id']))?$_POST['hidden_id']:'');
      if ($_POST) {
        if (empty($subject) || empty($semail) || empty($sname) || empty($content)) {
       echo "all fields are required";
      }else {
        $sqlupdate = $conn->query("UPDATE newsletter SET subject ='$subject',
                                   sender_email ='$semail', sender_name ='$sname',
                                   description='$content' WHERE id = '$id'");
         if ($sqlupdate) {
           echo "updated successfull";
         }else {
           echo "please check ur database";
         }
      }
      }
       ?>
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
