<?php

include_once 'mysqli_connect.php';

if (isset($_GET['user_search'])){
    $user_search = $_GET['user_search'];
}
else{
    header('Location: pokedex.php');	
}

$query = "SELECT * FROM pokedata WHERE poke_name LIKE '%" . $user_search . "%'";
$result = $MySQLi_CON->query($query);

if ($result->num_rows > 0) {
    while($PokeRow = $result->fetch_assoc()) {
        if($PokeRow["poke_type2"] !=""){
            
            $chk_id = $MySQLi_CON->query("SELECT id FROM pokedata WHERE poke_name='".$PokeRow["poke_name"]."'");
            $poke_id = mysqli_fetch_assoc($chk_id);
            $id = $poke_id['id'];

            $link = 'http://localhost/web_project/pokemon.php?value=' . $id;
            
            echo  '    
                <div class="col-xs-6 col-sm-4 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">'
                            . $PokeRow["poke_id"] . 
                        '</div>
                            
                        <div class="panel-body">
                            <img src="pokemon/' . $PokeRow["poke_name"] . '.jpg" style="width:100px;height:110px;"><br><br>
                            <a href="'.$link.'">'. $PokeRow["poke_name"] .'</a><br>
                            '. $PokeRow["poke_type1"] .' · '. $PokeRow["poke_type2"] .'
                        </div>
                    </div>
                </div>';
        }
        else{
            
            $chk_id = $MySQLi_CON->query("SELECT id FROM pokedata WHERE poke_name='".$PokeRow["poke_name"]."'");
            $poke_id = mysqli_fetch_assoc($chk_id);
            $id = $poke_id['id'];

            $link = 'http://localhost/web_project/pokemon.php?value=' . $id;
            
            echo '    
                <div class="col-xs-6 col-sm-4 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">'
                            . $PokeRow["poke_id"] . 
                    '</div>

                    <div class="panel-body">
                        <img src="pokemon/' . $PokeRow["poke_name"] . '.jpg" style="width:100px;height:110px;"><br><br>
                        <a href="'.$link.'">'. $PokeRow["poke_name"] .'</a><br>
                        '.$PokeRow["poke_type1"].'
                    </div>
                    </div>
                    </div>';}
                    
        }
}
else{
    echo '<div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Unable to search '. $user_search.' !
            </div>';
}
$MySQLi_CON->close();
?>