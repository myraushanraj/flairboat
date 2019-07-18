<?php
$conn2 = mysqli_connect('localhost','superlative_game','$sgaming@123$', 'superlative_gaming');
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "flareboat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['email'])){
   $email=$_POST['email'];
   $fullname=$_POST['name'];
   $contact=$_POST['contact'];
   $user_type=$_POST['user_type'];
   $user_password=$_POST['password'];
  //insert in db
  date_default_timezone_set("Asia/Kolkata");
$current_time=date("Y-m-d h:i:sa");
$sql = "INSERT INTO `users` (`user_id`, `name`, `email`, `contact`, `user_type`, `resume`, `created_date`, `status`) VALUES (NULL, '$fullname', '$email', '$contact', '$user_type', 're', '$current_time', '1');";

if ($conn->query($sql) === TRUE) {
    $msg= "Thanks, We will contact you soon!!";
    echo "<script> window.location.assign('register.html?msg=".$msg."')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



}
     


if(isset($_GET['action'])){
   $q1=$_POST['q1'];
   $q2=$_POST['q2'];
  $q3=$_POST['q3'];
  echo "redirecting....";
  $q3 =implode(',', $q3);

  $career_full_name=$_POST['career_full_name'];
  $career_email=$_POST['career_email'];
  $career_contact=$_POST['career_contact'];
  $career_subject=$_POST['career_subject'];


  $target_dir = "uploads/";

   $target_file = $target_dir ."career".time(). basename($_FILES["fileToUpload"]["name"]);
  
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       if($check !== false) {
          // echo "File is an image - " . $check["mime"] . ".";
           $uploadOk = 1;
       } else {
          // echo "File is not an image.";
           $uploadOk = 0;
       }
   }
   // Check if file already exists
   if (file_exists($target_file)) {
      // echo "Sorry, file already exists.";
       $uploadOk = 0;
   }
   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 2000000) {
      // echo $_FILES["fileToUpload"]["size"];
       $uploadOk = 0;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" && $imageFileType != "pdf") {
     //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
   }
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
 //echo "<script>alert('Sorry, File is not uploaded!')</script>";
 $target_file='';
   // if everything is ok, try to upload file
   } else {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       } else {
        
          // echo "Sorry, there was an error uploading your file.";
       }
   }
//insert in db
date_default_timezone_set("Asia/Kolkata");
$current_time=date("Y-m-d h:i:sa");
$sql = "INSERT INTO `career_tbl` (`id`, `name`, `email`, `contact`, `subject`, `q1`, `q2`, `q3`, `file_name`, `date`) VALUES (NULL, '$career_full_name', '$career_email', '$career_contact', '$career_subject', '$q1', '$q2', '$q3', '$target_file', '$current_time');";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Thanks, We will contact you soon!')</script>";
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

// $to = "raushanraj10695@gmail.com, careers@superlativegaming.in";
// $subject = "New Career form details of superlativegaing.in";

// $message = "
// <html>
// <head>
// <title>Superlativegaming.in</title>
// </head>
// <body>
// <p style='font-size:20px;'>New Career form details of superlativegaing.in</p>
// <table style='border: 2px solid red;border-style: dotted;background: #000;color: #2196F3;font-size: 24px;padding: 5px;'>

// <tr>
// <td>Name</td>
// <td>$career_full_name</td>
// </tr>
// <tr>
// <td>Email</td>
// <td>$career_email</td>
// </tr>
// <tr>
// <td>Contact</td>
// <td>$career_contact</td>
// </tr>
// <tr>
// <td>Subject</td>
// <td>$career_subject</td>
// </tr>
// <tr>
// <td>Who are the three people apart from family that have influenced a major life decision and how?</td>
// <td>$q1</td>
// </tr>
// <tr>
// <td>Name one place in the world that you think holds the most potential for you as a person to work in and how?</td>
// <td>$q2</td>
// </tr>
// <tr>
// <td>What would you rather do?</td>
// <td>$q3</td>
// </tr>
// <tr>
// <td>Upload CV</td>
// <td><a href='http://superlativegaming.in/contact/php/$target_file' target='_blank'>View</a></td>
// </tr>

// </table>
// </body>
// </html>
// ";

// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: website@superlativegaming.in' . "\r\n";
// $headers .= 'Cc: careers@superlativegaming.in' . "\r\n";

// mail($to,$subject,$message,$headers);

// echo "<script> window.location.assign('./../../');</script>";
?>