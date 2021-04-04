<?php
  require_once'./dbcon.php';
  session_start();

  if (isset($_POST['registration'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];

    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);

    $photo_name = $username.'.'.$photo;

    $input_error = array();



    if(empty($name)){
      $input_error['name'] = "The name field is required";
    }

    if(empty($email)){
      $input_error['email'] = "The email field is required";
    }
    if(empty($username)){
      $input_error['username'] = "The username field is required";
    }
    if(empty($password)){
      $input_error['password'] = "The password field is required";
    }
    if(empty($c_password)){
      $input_error['c_password'] = "The confirm password field is required";
    }
    if(count($input_error)==0){
          $email_check = mysqli_query($linnk,"SELECT * FROM `users` WHERE `email`='$email';");
          if(mysqli_num_rows($email_check)==0)
          {
              $username_check = mysqli_query($linnk,"SELECT * FROM `users` WHERE `username`='$username';");
              {
                if(mysqli_num_rows($username_check)==0){

                  if(strlen($username) > 7){

                    if(strlen($password)>7){

                       if($password == $c_password){
                        //  $password = md5($password);

                         $query="INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                            $result = mysqli_query($linnk,$query);

                            if($result){

                              $_SESSION['data_insert_success'] = "Data Insert Success!";
                               move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                               header('location:registration.php');

                            }
                            else {
                              $_SESSION['data_insert_error'] = "Data Insert Error!";
                            }
                       }
                       else {
                         $password_not_match = "Password not match";
                       }

                    }
                    else {
                      $password_l = "Password more than 8 characters";
                    }
                  }
                  else {
                    $username_l = "Username more than 8 characters";
                  }

                }
                else
                {
                    $username_error = "This username already exists";
                }
              }
          }
          else{
            $email_error = "This email address already exists";
          }
        }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Registration</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <h1>User Registration Form</h1>

      <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>'; }?>

      <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>'; } ?>

      <hr>
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <!--NAME............................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="name">Name</label>
                <div class="col-sm-4">
                  <input id="name" class="form-control" type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="Enter your name">
                </div>
                  <label for="" class="error">
                     <?php
                      if(isset($input_error['name']))
                      {
                        echo($input_error['name']);
                      }
                      ?>
                  </label>
            </div>



           <!--EMAIL.............................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="email">Email</label>
                <div class="col-sm-4">
                  <input id="email" class="form-control" type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="Enter your email">
                </div>

                <label for="" class="error">
                   <?php
                    if(isset($input_error['email']))
                    {
                      echo($input_error['email']);
                    }
                    ?>
                </label>

                <label for="" class="error">
                   <?php
                    if(isset($email_error))
                    {
                      echo $email_error;
                    }
                    ?>
                </label>

            </div>


            <!--USERNAME.........................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="username">Username</label>
                <div class="col-sm-4">
                  <input id="username" class="form-control" type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="Enter your username">
                </div>
                <label for="" class="error">
                   <?php
                    if(isset($input_error['username']))
                    {
                      echo($input_error['username']);
                    }
                    ?>
                </label>

                <label for="" class="error">
                   <?php
                    if(isset($username_error))
                    {
                      echo $username_error;
                    }
                    ?>
                </label>

                <label for="" class="error">
                   <?php
                    if(isset($username_l))
                    {
                      echo $username_l;
                    }
                    ?>
                </label>
            </div>

            <!--PASSWORD........................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="password">Password</label>
                <div class="col-sm-4">
                  <input id="password" class="form-control" type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Enter your password">
                </div>
                <label for="" class="error">
                   <?php
                    if(isset($input_error['password']))
                    {
                      echo($input_error['password']);
                    }
                    ?>
                </label>

                <label for="" class="error">
                   <?php
                    if(isset($password_l))
                    {
                      echo ($password_l);
                    }
                    ?>
                </label>
            </div>

            <!--CONFIRM PASSWORD.......................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="c_password">Confirm Password</label>
                <div class="col-sm-4">
                  <input id="c_password" class="form-control" type="password" name="c_password" value="<?php if(isset($c_password)){echo $c_password;} ?>" placeholder="Enter your Confirm Password">
                </div>
                <label for="" class="error">
                   <?php
                    if(isset($input_error['c_password']))
                    {
                      echo($input_error['c_password']);
                    }
                    ?>
                </label>

                <label for="" class="error">
                   <?php
                    if(isset($password_not_match))
                    {
                      echo 'Password not match';
                    }
                    ?>
                </label>
            </div>

            <!--PHOTO..................................-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="photo">Photo</label>
                <div class="col-sm-4">
                  <input id="photo" type="file" name="photo" value="" placeholder="Enter your photo">
                </div>
            </div>


             <!--SUBMIT..................................-->
            <div class="col-sm-4 col-sm-offset-1">
              <input type="submit" name="registration" value="Registration" class="btn btn-success">
            </div>

          </form>

         </div>
      </div>

       <br>
        <p>If you have an account? then please <a href="login.php">Login</a> </p>
      <hr>

      <footer>
          <p>Copyright &copy;2015 - <?= date("Y") ?> All Rights Reserved</p>
      </footer>
    </div>
  </body>
</html>
