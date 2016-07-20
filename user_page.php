<?php
session_start();

include_once 'mysqli_connect.php';

if(!isset($_SESSION['userSession'])){
    header("Location: user_login.php");
    
}
$query = $MySQLi_CON->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']);
$userRow = $query->fetch_array();
$MySQLi_CON->close();

require ('header.php');
?>

<h2>Welcome - <?php echo $userRow['user_name']; ?></h2><br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Username
            </div>
            <div class="panel-body">
                <?php echo $userRow['user_name']; ?>
            </div>
        </div><br>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                Email
            </div>
            <div class="panel-body">
                <?php echo $userRow['email_address']; ?>
            </div>
        </div><br>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                Your password have been updated since
            </div>
            <div class="panel-body">
                <div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Changed Your Password Regularly to ensure your account is safely !
                </div>
                <?php echo $userRow['password_update']; ?>
            </div>
            
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                Your Account created since
            </div>
            <div class="panel-body">
                <?php echo $userRow['date_entered']; ?>
            </div>
        </div>
    </div>
</div>

<?php
require ('footer.php');
?>
