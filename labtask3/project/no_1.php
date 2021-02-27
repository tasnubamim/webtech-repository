<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .login{
            border: 1px solid #000;
            padding: 20px;
            width: 400px;
            margin-top: 50px;
            margin-left: 50px;
        }
        
    </style> 
</head>
<body>

<div class="login">
<?php
        $nameErr1 = $nameErr2 = "";
        $name = $password = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["name"]))
            {
                $nameErr1 = " * Name is required";
            }
            else 
            {
                $name = test_name($_POST["name"]);
            }
            
            if(empty($_POST["password"]))
            {
                $nameErr2 = " * Password is required";
            }

            else 
            {
                $password = test_password($_POST["password"]);
                
            } 

        }
        
        function test_name($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function test_password($password) {
            return $password;
        }
    ?>

    <h2>LOGIN</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
        Username:   <input type="text" name="name" placeholder="Username" pattern="[A-Za-z]{2,10}" >
        <span class="error"> <?php echo $nameErr1;?> </span>
        <br><br>
        
        Password: <input type="Password" name="password" placeholder="Password" pattern="[0-9]{8}[@,#,$,%]{1}" >    
        <span class="error"> <?php echo $nameErr2;?> </span>
        <br><br> 

        <hr>   
        <input type="checkbox" id="check"> 
        <span>Remember me</span>   
        <br><br>   

        <input type="submit" name="submit" value="Submit"> 
        <a href="#">Forgot Password</a>  
    </form>

    <?php
    echo "<h2> Input:</h2>";
    echo $name;
    echo '<br>';
    echo $password;
    ?>

<div>
    
</body>
</html>