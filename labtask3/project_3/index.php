<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img{
            width:30%;
            border: 2px solid #000;
            padding: 20px;
        }

        h2{
            margin-left: 10%;
            margin-top: 2%;
        }
        button{
            margin-left: 20px;
        }
        input{
            margin-left: 20px;

        }
    </style>
</head>
<body>
    <div class="img">

        <form  class="upload-form">
            <h2>Profile Picture</h2>
            <img src="img.png" alt="picture">
            <input class="upload-file"  type="file" accept="image/png,image/jpeg"><br><br>
            <hr>
            <input type=submit>
        </form>

    </div>
</body>
</html>