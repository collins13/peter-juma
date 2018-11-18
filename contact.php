<?php include 'includes/header.php';  ?>
<?php
include 'config/config.php';
$name_error ='';
$phone_error ='';
$email_error = '';
$message_error = '';
$name = ((isset($_POST['name']))?$_POST['name']:'');
$phone = ((isset($_POST['phone']))?$_POST['phone']:'');
$email = ((isset($_POST['email']))?$_POST['email']:'');
$message = ((isset($_POST['message']))?$_POST['message']:'');
  if ($_POST) {

  if (empty($name)) {
    $name_error ='name fild is required';
  }
  if (empty($phonr)) {
    $phone_error ='name fild is required';
  }
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_error = 'is a valid email address';
} else {
  $email_error = 'is not a valid email address';
}
if (empty($message)) {
  $message_error ='this field cant be empty';
}
if (!empty($name) && !empty($phone) && !empty($message)) {
  $contactQuery = $conn->query("INSERT INTO contacts(name, phone, email, content)
                             VALUES('$name', '$phone', '$email', '$message')");
                             // Create the email and send the message
$to = 'peterjuma@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";
$retval = mail($to,$email_subject,$email_body,$headers);

         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }

header("Location:contact.php");
}
  }
 ?>
 <style media="screen">
.error{
  color: red;
  font-weight: bold;
}
 </style>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="images/contact-us_orig.png"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            3481 Saint Lucia
            <br>Beverly Hills, CA 90210
            <br>
          </p>
          <p>
            <abbr title="Phone">Phone</abbr>: +(175) 87135203
          </p>
          <p>
            <abbr title="Email">Email</abbr>:
            <a href="peterjuma@hotmail.com">peterjuma@hotmail.com
            </a>
          </p>
          <p>
            <abbr title="Hours">Hours</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" method="POST" action="contact.php" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <span class="error">  <?=$name_error;?></span>
                <input type="text" class="form-control" name="name" id="name" value="<?=$name;?>" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                  <span class="error"><?=$phone_error;?></span>
                <input type="tel" class="form-control" name="phone" id="phone" value="<?=$phone?>" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?=$email?>" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                  <span class="error"><?=$message_error;?></span>
                <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">
                </textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-outline-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  </body>

</html>
