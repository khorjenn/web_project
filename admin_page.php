<?php
session_start();

include_once 'mysqli_connect.php';

if(!isset($_SESSION['adminSession'])){
    header("Location: admin_login.php");
    
}
$query = $MySQLi_CON->query("SELECT * FROM admin WHERE id=".$_SESSION['adminSession']);
$userRow = $query->fetch_array();

if(isset($_POST['submit'])){
    $poke_id = $MySQLi_CON->real_escape_string(trim($_POST['poke_id']));
    $poke_name = $MySQLi_CON->real_escape_string(trim($_POST['poke_name']));
    $poke_type1 = $MySQLi_CON->real_escape_string(trim($_POST['poke_type1']));
    $poke_type2 = $MySQLi_CON->real_escape_string(trim($_POST['poke_type2']));
    $poke_bio = $MySQLi_CON->real_escape_string(trim($_POST['poke_bio']));
    $poke_hp = $MySQLi_CON->real_escape_string(trim($_POST['hp']));
    $poke_attack = $MySQLi_CON->real_escape_string(trim($_POST['attack']));
    $poke_defense = $MySQLi_CON->real_escape_string(trim($_POST['defense']));
    $poke_spatk = $MySQLi_CON->real_escape_string(trim($_POST['spatk']));
    $poke_spdef = $MySQLi_CON->real_escape_string(trim($_POST['spdef']));
    $poke_speed = $MySQLi_CON->real_escape_string(trim($_POST['speed']));
    
    $check_pokesname = $MySQLi_CON->query("SELECT poke_name FROM pokedata WHERE poke_name='$poke_name'");
    $count = $check_pokesname->num_rows;
    
    if($count==0){
        $query = "INSERT INTO pokedata(poke_id, poke_name, poke_type1, poke_type2, poke_bio, hp, attack, defense, spatk, spdef, speed) "
                . "VALUES('$poke_id','$poke_name','$poke_type1','$poke_type2','$poke_bio','$poke_hp','$poke_attack','$poke_defense','$poke_spatk','$poke_spdef','$poke_speed')";
        
        if($MySQLi_CON->query($query)){
            $msg = "<div class='alert alert-success'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Insert !
                </div>";
        }
        else{
            $msg = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while insert !
                </div>";
        }
    }
    else{
        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry Pokemon already been insert !
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
        <title>Admin Page</title>
        
        <link rel="stylesheet" href="style.css" />
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" >
        
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" >
        
        <script src="validation.js"></script>
        
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    </head>
    
    <body id="body"> 
        <div align="center">
            <h2>Welcome - <?php echo $userRow['user_name']; ?></h2><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <form action="admin_page.php" method="post" onsubmit="return checkForm(this);">
                        
                        <h2 class="form-signin-heading">Insert Pokemon Data</h2><hr/>
                            
                            <?php
                            if(isset($msg)){
                                echo $msg;
                                
                            }
                            else{
                                ?>
                        
                        <div class='alert alert-info'>
                            <span><i class="fa fa-asterisk" aria-hidden="true"></i></span> &nbsp; Fill up all the Pokemon detail !
                        </div>
                            <?php
                            
                            }
                            ?>
                        <div class="form-group">
                            <label for="pokeid">Pokemon ID</label>
                            <input type="text" name="poke_id" class="form-control" placeholder="Pokemon ID">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokename">Pokemon Name</label>
                            <input type="text" name="poke_name" class="form-control" placeholder="Pokemon Name">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemontype1">Pokemon Type 1</label>
                            <input type="text" name="poke_type1" class="form-control" placeholder="Pokemon Type 1">
                        </div>
            
                        <div class="form-group">
                            <label for="pokemontype1">Pokemon Type 2</label>
                            <input type="text" name="poke_type2" class="form-control" placeholder="Pokemon Type 2">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokebio">Pokemon Biography</label>
                            <textarea name="poke_bio" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemonhp">Pokemon HP</label>
                            <input type="text" name="hp" class="form-control" placeholder="Pokemon HP">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemonattack">Pokemon Attack</label>
                            <input type="text" name="attack" class="form-control" placeholder="Pokemon Attack">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemondefense">Pokemon Defense</label>
                            <input type="text" name="defense" class="form-control" placeholder="Pokemon Defense">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemonspatk">Pokemon Sp. Atk</label>
                            <input type="text" name="spatk" class="form-control" placeholder="Pokemon Sp. Atk">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemonspdef">Pokemon Sp. Def</label>
                            <input type="text" name="spdef" class="form-control" placeholder="Pokemon Sp. Def">
                        </div>
                        
                        <div class="form-group">
                            <label for="pokemonspeed">Pokemon Speed</label>
                            <input type="text" name="speed" class="form-control" placeholder="Pokemon Speed">
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-success">Insert</button>
                    </form>
                </div>
            </div>
            <a href="admin_logout.php" class="btn btn-info"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a>
        </div>
    </body>
</html>