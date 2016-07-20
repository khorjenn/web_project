<?php
session_start();
include_once 'mysqli_connect.php';

if(!isset($_SESSION['userSession'])){
    header("Location: log_in.php");
}

if(isset($_POST['submit'])){
    $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
    $email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
    
    $id = $_SESSION['userSession'];
    
    $result = $MySQLi_CON->query("UPDATE users SET user_name = '$username', email_address = '$email' WHERE id='$id'" );
    
     if($result){
            $msg = "<div class='alert alert-success'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Changed !
                </div>";
        }
        else{
            $msg = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while changed !
                </div>";
        }
    
    $MySQLi_CON->close();
}
require ('header.php');
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
        <form action="" method="post" class="form-horizontal">
            
            <h2 class="form-signin-heading">Update Profile</h2><hr/>
            
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            
            <div class="form-group">
                <label for="username" class="col-sm-2">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Username" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="email" class="col-sm-2">Email&nbsp;Address</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require ('footer.php');
?>