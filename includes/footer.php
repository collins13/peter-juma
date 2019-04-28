
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <style media="screen">
      /* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
  padding: 60px 0;
}

section .section-title {
  text-align: center;
  color: #007b5e;
  margin-bottom: 50px;
  text-transform: uppercase;
}
#footer {
  background: #007b5e !important;
}
#footer h5{
padding-left: 10px;
  border-left: 3px solid #eeeeee;
  padding-bottom: 6px;
  margin-bottom: 20px;
  color:#ffffff;
}
#footer a {
  color: #ffffff;
  text-decoration: none !important;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
padding: 3px 0;
}
#footer ul.social li a i {
  margin-right: 5px;
font-size:25px;
-webkit-transition: .5s all ease;
-moz-transition: .5s all ease;
transition: .5s all ease;
}
#footer ul.social li:hover a i {
font-size:30px;
margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
color:#ffffff;
}
#footer ul.social li a:hover{
color:#eeeeee;
}
#footer ul.quick-links li{
padding: 3px 0;
-webkit-transition: .5s all ease;
-moz-transition: .5s all ease;
transition: .5s all ease;
}
#footer ul.quick-links li:hover{
padding: 3px 0;
margin-left:5px;
font-weight:700;
}
#footer ul.quick-links li a i{
margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
  font-weight: 700;
}

@media (max-width:767px){
#footer h5 {
  padding-left: 0;
  border-left: transparent;
  padding-bottom: 0px;
  margin-bottom: 10px;
}
}

      </style>
      <section id="footer">
  <div class="container">
    <div class="row text-center text-xs-center text-sm-left text-md-left">
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Quick links</h5>
        <ul class="list-unstyled quick-links">
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Quick links</h5>
        <ul class="list-unstyled quick-links">
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Quick links</h5>
        <ul class="list-unstyled quick-links">
          <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
          <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
          <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
        <ul class="list-unstyled list-inline social text-center">
          <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
          <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
        </ul>
      </div>
      </hr>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
        <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
      </div>
      </hr>
    </div>
  </div>
</section>
<!-- ./Footer -->
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="jquery-bar-rating/dist/jquery.barrating.min.js" type="text/javascript"></script>
    <script type="text/javascript">
  /*  var preloader = document.getElementById('loading');
    function modalFunction(){
      preloader.style.display 'none';
    };*/
    $(document).ready(function(){
      setTimeout(function() {
      $('#myModal').modal();
    }, 5000);
  });

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

//rating system
$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : 'insert_rating.php',
data : formData,
success:function(response){
$("#ratingForm")[0].reset();
window.setTimeout(function(){window.location.reload()},1000)
}
});
});

$(".card-block").click(function() {
  window.location = $(this).find("a").attr("href");
  return false;
});


//jquery hover myFunction

$(document).ready(function(){
  $(".col-lg-3").hover(function(){
    $(this).animate({
      marginTop: '-=1%',
    },200);
  },
  function(){
    $(this).animate({
      marginTop:'0%',
    },200)
  }
);
});

//rating system

function ratings(elem){
  var x = new XMLHttpRequest()
    url = 'ratings.php';
    var a = document.getElementById(elem).value;
    var vars = 'choice' + a;
    x.open("POST", url, true);
    x.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    x.onreadystatechange = function(){
      if (x.readyState == 4 && x.status == 200 ) {
        var return_data = x.responseText;
        document.getElementById('status').innerHTML = return_data;

      }
    }
    x.send(vars);
    document.getElementById('status').innerHTML = 'prosessing...';
}

//diplay Comments

$(document).ready(function(){
  $('#view').click(function(){
    $('#view-comments').slideToggle(700);
    return false;
  });
});



//rating javascript

$(function() {
 $('.rating').barrating({
  theme: 'fontawesome-stars',
  onSelect: function(value, text, event) {

   // Get element id by data-id attribute
   var el = this;
   var el_id = el.$elem.data('id');

   // rating was selected by a user
   if (typeof(event) !== 'undefined') {

     var split_id = el_id.split("_");
     var postid = split_id[1]; // postid

     // AJAX Request
     $.ajax({
       url: 'rating-ajax.php',
       type: 'post',
       data: {postid:postid,rating:value},
       dataType: 'json',
       success: function(data){
         // Update average
         var average = data['averageRating'];
         $('#avgrating_'+postid).text(average);
       }
     });
   }
  }
 });
});
    </script>
