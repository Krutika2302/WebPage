




  

 <?php 
include('../dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
<?php
$email = '';
if(isset($_POST['email'])) {
  $email=$_POST['email'];
}


if(isset($_POST['update'])){

// $newpassword=md5($_POST['newpassword'] );
$newpassword=$_POST['newpassword'];
$sql ="SELECT r_email FROM requesterlogin_tb  WHERE r_email='".$email."'";

    $query=$conn->query($sql);
    // $query-> bindParam(':email', $email, PDO::PARAM_STR);
    // $query->execute();
    $results = $query->fetch_assoc();
    if($query ->num_rows > 0)
    {
        // $qconn="update requesterlogin_tb set r_passwor=".$newpassword." where r_email='".$email."'";
        // $chngpwd1 = $conn->query($qconn);
        $sql = "UPDATE requesterlogin_tb SET r_password = '$newpassword' WHERE r_email = '$email'";
        $conn->query($sql);
        // $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
        // $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      //  dd($res);die;
        echo "<script>alert('Your Password succesfully changed');</script>";
    }
    else {
        echo "<script>alert('Email id  is invalid');</script>"; 
    }
}

?>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

<body>
<div class="modal fade" id="forgotpassword">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

       
        <h3 class="modal-title">Password Recovery</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Your Email address*" required="">
                </div>
 
  <div class="form-group">
                  <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="">
                </div>
  <div class="form-group">
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="">
                </div>
                <div class="form-group">
                  <input type="submit" value="Reset My Password" name="update" class="btn btn-block">
                </div>
              </form>
              <div class="text-center">
                <p class="gray_text">For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
                <p><a href="RequesterLogin.php" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

