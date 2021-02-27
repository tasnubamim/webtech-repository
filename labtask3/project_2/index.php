<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>    
        .border{
        width: 20%;
        border: 2px solid #000;
        padding: 5px;
        }
    </style>

</head>
<body>
        <form>
            <div class="border">
                <h2>Change Password</h2>
                <br>

                Current Password:
                
                <input type="password" placeholder="Old Password" id="old_password" required><br><br>

                <span style="color:blue">New Password:</span>
                <input type="password" placeholder="New Password" id="password" required><br><br>

                <span style="color:red">Retype Password:</span>
                <input type="password" placeholder="Confirm Password" id="confirm_password" required><br><br>
                <hr>
                
                <button type="submit" class="pure-button pure-button-primary">Confirm</button>
                <br>
            </div>
        </form>

    <script src="app.js"></script>

</body>
</html>