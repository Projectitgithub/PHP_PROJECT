<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            background-color: green;
            color: black;
        }
        h1{
            text-align: center;
            font-size: 40px;
        }
        form{
            color: black;
            text-align: center;
            font-size: 40px;
        }
        .cls1{
            text-align: center;
            font-size: 40px;

        }
        button{
            background-color: blue ;
            font-size: 40px;
        }

    </style>
</head>
<body>
    <h1>
        Registration
    </h1>
    <form class="" action="" method="POST" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" value="">
        <br>
        <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" value="">
        <br>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="">
        <br>
        <br>
        <label for="Password">Password : </label>
        <input type="password" name="password" id="password" value="">
        <br>
        <br>
        <label for="confirmpassword">Confirm password : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" value="">
        <br>
        <br>
        <button type="submit" name="submit">Register</button>
        

    </form>
    <br>
    <br>
    <div class="cls1">
        <a href="login.php">Login</a>
    </div>
    

    <!-- Check the form submit or not with the help of php....-->

    <?php
    include 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $duplicate = mysqli_query($conn,"select * from tb_user where username='$username' OR  email='$email' ");
        if(mysqli_num_rows($duplicate) > 0){
            echo 
            "<script> alert('Username or Email has already taken!!'); </script>";

        }
        else{
            if($password == $confirmpassword){
                $query="insert into tb_user values('','$name','$username','$email','$password')";
                mysqli_query($conn,$query);
                echo 
                "<script> alert ('Registration Successfully'); </script>";
            }
            
            else{
                echo
                "<script> alert ('Password does not match'); </script>";
            }
            }
    
    
    }
    
    
    
    ?>


</body>
</html>