<?php
session_start();
include_once 'mysqli_connect.php';

if(!isset($_SESSION['userSession'])){
    header("Location: log_in.php");
}
require ('header.php');

if(isset($_POST['submit'])){
    $password = $MySQLi_CON->real_escape_string(trim($_POST['new_password']));
    
    // Malaysia timezone code
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $current_datetime = date("Y-m-d H:i:s");
    
    $id = $_SESSION['userSession'];
    
    $result = $MySQLi_CON->query("UPDATE users SET user_password = '$password', password_update = '$current_datetime' WHERE id='$id'" );
    
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

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
        <form action="" method="post" class="form-horizontal">
            
            <h2 class="form-signin-heading">Change Password</h2><hr/>
            
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            
            <div class="form-group">
                <label for="old_password" class="col-sm-2">Old&nbsp;Password</label>
                <div class="col-sm-10">
                    <input type="password" name="old_username" class="form-control" placeholder="Old Password">
                </div>
            </div>
            
            <div class="form-group">
                <label for="new_password" class="col-sm-2">New&nbsp;Password</label>
                <div class="col-sm-10">
                    <input type="password" name="new_password" class="form-control" placeholder="New Password">
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