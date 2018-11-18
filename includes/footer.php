
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    setTimeout(function() {
    $('#myModal').modal();
}, 5000);

function myFunction() {
var email = document.getElementById("email").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = '&email1=' + email ;
if (email == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "index.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}
    </script>
