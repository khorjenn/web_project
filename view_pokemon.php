<?php

include_once 'mysqli_connect.php';

$getid = $_GET['value'];

$query = "SELECT * FROM pokedata WHERE id = $getid";
$result = $MySQLi_CON->query($query);

if ($result->num_rows > 0) {
    if($PokeRow = $result->fetch_assoc()) {
        if($PokeRow["poke_type2"] !=""){
            echo'<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                 '. $PokeRow["poke_id"] .'
                            </div>
                
                            <div class="panel-body">
                                <img src="pokemon/' . $PokeRow["poke_name"] . '.jpg" style="width:100px;height:110px;"><br><br>
                                    '. $PokeRow['poke_name'].'<br>
                                    '. $PokeRow["poke_type1"] .' · '. $PokeRow["poke_type2"] .'   
                            </div>
                        </div>
        
                        <blockquote>
                            <p>'. $PokeRow['poke_bio'].'</p>
                        </blockquote><br>
        
                        <h2><strong>Base stats</strong></h2><hr>
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Hp stats -->
                            <h4>HP <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['hp'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['hp'].'%">
                                    <span class="sr-only">45% Hp</span>
                                </div>
                            </div>
            
                            <!-- Attack stats -->
                            <h4>Attack <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['attack'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['attack'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Defense stats -->
                            <h4>Defense <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['defense'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['defense'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Sp.Attack stats -->
                            <h4>Sp. Atk <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['spatk'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['spatk'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Sp.Defense stats -->
                            <h4>Sp. Def <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['spdef'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['spdef'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>

                            <!-- Speed stats -->
                            <h4>Speed <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['speed'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['speed'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
                        </div><br>
                    <a href="pokedex.php" class="btn btn-success">Back to Pokédex</a>
                </div>
        </div>';
            
        }else{
            echo '<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                '. $PokeRow["poke_id"] .'
                            </div>
            
                            <div class="panel-body">
                                <img src="pokemon/' . $PokeRow["poke_name"] . '.jpg" style="width:100px;height:110px;"><br><br>
                                '. $PokeRow['poke_name'].'<br>
                                '. $PokeRow["poke_type1"] .'   
                            </div>
                        </div>
        
                        <blockquote>
                            <p>'. $PokeRow['poke_bio'].'</p>
                        </blockquote><br>
        
                        <h2><strong>Base stats</strong></h2><hr>
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Hp stats -->
                            <h4>HP <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['hp'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['hp'].'%">
                                    <span class="sr-only">45% Hp</span>
                                </div>
                            </div>
            
                            <!-- Attack stats -->
                            <h4>Attack <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['attack'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['attack'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Defense stats -->
                            <h4>Defense <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['defense'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['defense'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Sp.Attack stats -->
                            <h4>Sp. Atk <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['spatk'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['spatk'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
            
                            <!-- Sp.Defense stats -->
                            <h4>Sp. Def <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['spdef'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['spdef'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
                
                            <!-- Speed stats -->
                            <h4>Speed <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> '. $PokeRow['speed'].'</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150" style="width: '. $PokeRow['speed'].'%">
                                    <span class="sr-only">49% Attack</span>
                                </div>
                            </div>
                        </div><br>
                    <a href="pokedex.php" class="btn btn-success">Back to Pokédex</a>
                </div>
            </div>';
        }
        
        }
}
else{
     echo '<div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Error to view pokemon !
            </div>';
}
$MySQLi_CON->close();
?>