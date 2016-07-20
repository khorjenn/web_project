<?php
session_start();

include_once 'mysqli_connect.php';

if(isset($_SESSION['userSession'])!=""){
    header("Location: index.php");
    exit;
}


if(isset($_POST['submit'])){
    $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
    $password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
    
    $query = $MySQLi_CON->query("SELECT * FROM users WHERE user_name='$username'");
    $row = $query->fetch_array();
    
    if($password == $row['user_password']){
        $_SESSION['userSession'] = $row['id'];
        header("Location: index.php");
    }
    else{
        $msg = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username or Password does not exists !
                </div>";     
    }
    $MySQLi_CON->close();
}
require ('header.php');

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
        <form action="" method="post" onsubmit="return checkForm(this);" class="form-horizontal">
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            
            <h2 class="form-signin-heading">Log In</h2><br>
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
            
            <h2>Are you a new user?</h2>
            <h3>Create Your Account Now!</h3><br>
            <a href="user_signup.php" class="btn btn-info">Sign up</a>
        </form>
    </div>
</div>

<?php
require ('footer.php');
?>

