<?php
   require_once'./dbcon.php';
   session_start();
   if(isset($_SESSION['user_login'])){
     header('location:index.php');
   }

   if(isset($_POST['login'])){
     $username=$_POST['username'];
     $password=$_POST['password'];

     $username_check = mysqli_query($linnk,"SELECT * FROM `users` WHERE `username`='$username'");
       if(mysqli_num_rows($username_check) > 0){
             $row = mysqli_fetch_assoc($username_check);
             if($row['password']==$password){
               if($row['status']=='active'){
                 $_SESSION['user_login'] = $username;
                 header('location:index.php?page=homepage');
               }else{
                 $status_inactive = "Your status inactive";
               }
             }
             else {
               $wrong_password = "This password not found";
             }

       }else {
         $username_not_found = "This username not found";
       }

   }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin login</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">

  </head>
  <body>
    <div class="container animated flash">
      <h1 class="text-center">Management Project</h1>
      <br>

      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <h2 class="text-center">Login Form</h2>
          <br>

          <form class="" action="" method="post">
             <div class="">
               <input type="text" class="form-control" name="username" value="<?php if(isset($username)){echo $username;}  ?>" placeholder="Username" required="">

             </div>
               <br>
             <div class="">
               <input type="password" class="form-control" name="password" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Password" required="">

             </div>
              <br>

             <div class="">
               <input type="submit" name="login" value="login" class="btn btn-success">
             </div>


          </form>
          
          <br><br/>
          <p> Don't have an account ? then please <a href="registration.php"> Register</a> </p>

        </div>

      </div>
      <br>
      <?php if(isset($username_not_found)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$username_not_found.'</div>';} ?>
        <?php if(isset($wrong_password)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$wrong_password.'</div>';} ?>
          <?php if(isset($status_inactive)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$status_inactive.'</div>';} ?>

    </div>
  </body>
</html>
