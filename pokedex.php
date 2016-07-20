<?php
session_start();
require ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3>List of Pokémon</h3><br>
            <?php
            require ('pokedex_data.php');
            ?>
        </div>
    </div>
</div>

<?php
require ('footer.php');
?>