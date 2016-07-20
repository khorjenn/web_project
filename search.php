<?php
session_start();
require ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3>List of Pokémon you search</h3><br>
            <?php
            require ('search_pokemon.php');
            ?>
            
        </div>
    </div>
    <a href="pokedex.php" class="btn btn-success">Back to Pokédex</a>
</div>

<?php
require ('footer.php');
?>