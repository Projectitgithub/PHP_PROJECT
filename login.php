<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body{
            background-color: yellow;
            color: black;
        }
        h1{
            text-align: center;
            font-size: 40px;
        }
        form{
            text-align: center;
            font-size: 40px;
        }
        .cls2{
            text-align: center;
            font-size: 40px;
        }
        button{
            background-color: green;
            font-size: 40px;
        }
    </style>
</head>
<body>
    <h1>Login </h1>
    <form class="" action=""method="POST"autocomplete="off">
        <label for="usernameemail">Username or Email :</label>
        <input type="text" name="usernameemail" id="usernameemail"  value="">
        <br>
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="">
        <br>
        <br>
        <button type="submit" name="submit">Login </button> 

    </form>
    <br>
    <br>
    <div class="cls2">
    <a href="registration.php">Registration</a>
    </div>
    


    <?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $usernameemail=$_POST['usernameemail'];
        $password=$_POST['password'];
        $result=mysqli_query($conn,"select * from tb_user where
        username='$usernameemail' or email='$usernameemail'");
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SEESSION["login"] = true;
                $_SEESSION["id"]= $row["id"];
                header("Location: index.php");
            }
            else{
                echo
                "<script> alert('Wrong Password'); </script>";

            }

        }
        else{
            echo
            "<script> alert('Username not registred'); </script>";
        }
    }

    
    
    
    
    
    ?>



</body>
</html>