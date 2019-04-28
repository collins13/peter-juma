<?php
$email = ((isset($_POST['email']))?$_POST['email']:'');
$unsubscribe = ((isset($_POST['unsubscribe']))?$_POST['unsubscribe']:'');

if ($_POST) {
  $id =_GET['nid'];

  $sql = $conn->query("SELECT * FROM newsletter WHERE id='$id' LIMIT 1");

  $row = mysqli_fetch_assoc($sql);
  extract($row);

 for ($x=0; $x <count($_POST) ; $x++) {

   $to = $_POST["email$x"];
   $unsubscribeid = $_POST["unsubscribeid$x"];
   $body = $content.'<img src="http://localhost/newslatter/trackemail.php?eid='.$unsubscribeid.'" width="10" height="10 alt="trackemail.php?eid='..'"">';

   $headers = "From: ".$sender_email."\r\n ";
   $headers .= "Reply-To: ".$sender_email." \r\n ";
   $headers .= "MIME-Version 1.0:" . "\r\n";
   $headers .= "Content-Type:text/html;charset=iso-8859-1" . "\r\n";
   $retval = mail($to, $subject, $body, $headers);

   if( $retval == true ) {
      echo "Message sent successfully...";
   }else {
      echo "Message could not be sent...";
     }

   }

}

 ?>
