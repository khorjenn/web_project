<?php
session_start();
include_once 'mysqli_connect.php';

if(isset($_SESSION['userSession'])!=""){
    header("Location: index.php");
}
require ('header.php');

if(isset($_POST['submit'])){
    $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
    $email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
    $password = $MySQLi_CON->real_escape_string(trim($_POST['password1']));
    
    $check_usersname = $MySQLi_CON->query("SELECT user_name FROM users WHERE user_name='$username'");
    $count = $check_usersname->num_rows;
    
    // Malaysia timezone code
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $current_datetime = date("Y-m-d H:i:s");
    
    if($count==0){
        $query = "INSERT INTO users(user_name,email_address,user_password,date_entered) VALUES('$username','$email','$password','$current_datetime')";
        
        if($MySQLi_CON->query($query)){
            $msg = "<div class='alert alert-success'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Registered !
                </div>";
        }
        else{
            $msg = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !
                </div>";
        }
    }
    else{
        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry Username already been taken !
            </div>"; 
    }
 
 $MySQLi_CON->close();
}

?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
        <form action="user_signup.php" method="post" onsubmit="return checkForm(this);">
            
            <h2 class="form-signin-heading">Sign Up</h2><hr/>
            
            <?php
            if(isset($msg)){
                echo $msg;
                
            }
            else{
                ?>
            <div class='alert alert-info'>
                <span><i class="fa fa-asterisk" aria-hidden="true"></i></span> &nbsp; Fill up all the detail !
            </div>
            <?php
            
            }
            ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control" placeholder="Email Address">
            </div>
            
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" name="password1" class="form-control" placeholder="Password">
            </div>
            
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Create Your Account</button>
        </form>
    </div>
</div>

<?php
require ('footer.php');
?>
