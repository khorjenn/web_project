<?php
session_start();

include_once 'mysqli_connect.php';

if(isset($_SESSION['adminSession'])!=""){
    header("Location: admin_page.php");
    exit;
}

if(isset($_POST['submit'])){
    $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
    $password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
    
    $query = $MySQLi_CON->query("SELECT * FROM admin WHERE user_name='$username'");
    $row = $query->fetch_array();
    
    if($password == $row['user_password']){
        $_SESSION['adminSession'] = $row['id'];
        header("Location: admin_page.php");
    }
    else{
        $msg = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username or Password does not exists !
                </div>";     
    }
    $MySQLi_CON->close();
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>PokéPedia</title>
        
        <link rel="stylesheet" href="style.css" />
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" >
        
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" >
        
        <script src="validation.js"></script>
        
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    </head>
    
    <body id="body"> 
        <div align="center">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <form action="" method="post" onsubmit="return checkForm(this);" class="form-horizontal">
                        <?php
                        if(isset($msg)){
                            echo $msg;
                            
                        }?>
                        
                        <h2 class="form-signin-heading">Admin Log In</h2><hr><br>
                        <div class="form-group">
                            <label for="username" class="col-sm-2">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-sm-2">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div><hr>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
