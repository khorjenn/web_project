<?php
session_start();
require ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <?php
            require ('view_pokemon.php');
            ?>
        </div>
    </div>
</div>

<?php
require ('footer.php');
?>