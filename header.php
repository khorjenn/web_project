<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>PokéPedia</title>
        
        <link rel="stylesheet" href="style.css" />
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" >
        
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" >
        
        <script src="validation.js"></script>
        
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    </head>
    
    <body id="body"> 
        <div align="center">  
            <!-- Nav-bar -->
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php"><img src="photo/pokeball.jpg" alt="pokeball" style="width:27px;height:27px;"></a>
                        </div>
                        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!-- Menu Items -->
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                                
                                <!-- Dropdown Menu -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pokémon Data<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="pokedex.php">Pokédex</a></li>
                                        <li><a href="#">Moves</a></li>
                                        <li><a href="#">Abilities</a></li>
                                    </ul>
                                </li><!-- End of Dropdown Menu -->
                                
                                <!-- Dropdown Menu -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pokémon Game<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Pokémon Go</a></li>
                                        <li role="separator" class="divider"></li>
                                        
                                        <li><a href="#">Sun & Moon</a></li>
                                        <li role="separator" class="divider"></li>
                                        
                                        <li><a href="#">Omega Ruby & Alpha Sapphire</a></li>
                                        <li><a href="#">X & Y</a></li>
                                    </ul>
                                </li><!-- End of Dropdown Menu -->
                            </ul><!-- End of Menu Items -->
                            
                            <ul class="nav navbar-nav navbar-right">
                                <?php 
                                if(isset($_SESSION['userSession'])){
                                    echo '<!-- Dropdown Menu -->
                                        <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="user_page.php">View Profile</a></li>
                                        <li><a href="update_profile.php">Update Profile</a></li>
                                        <li><a href="change_password.php">Change Password</a></li>
                                        </ul>
                                        </li><!-- End of Dropdown Menu -->'
                                    .'<li><a href="user_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>';
                                }
                                else{
                                    echo '
                                        <form method="get" action="search.php" class="navbar-form navbar-left" >
                                        <div class="form-group">
                                        <input type="text" name="user_search" class="form-control" placeholder="Search Pokémon">
                                        </div>
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>'
                                    . '<li><a href="user_signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>'
                                    . '<li><a href="user_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>';
                                }
                                ?>   
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

