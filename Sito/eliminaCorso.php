<?php
require_once('phpFunctions.php');
session_start();
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <title>Homepage</title>
</head>
<body>
    <div class="header">
        <div class="nav-left">
            <div class="nav-logo">
                <a href="homepage.php">
                    <img src="https://store-images.s-microsoft.com/image/apps.51215.9007199266623456.05e3a154-d5ac-49d8-af6e-ab2f789dc26d.f443b25b-1668-48aa-8137-f8e5609aee45?mode=scale&q=90&h=300&w=300" alt="logo" width="90px">
                </a>
            </div>
            <div class="vertical-bar"></div>
                <h2>
                    <form action="">
                        <input type="button">
                    </form>
                    Infostud
                </h2>
            <div class="vertical-bar"></div>
                <?php
                    if(isset($_SESSION['login'])){
                        ?>
                        <h2>
                            <a class="logout" href="amministrazione.php">
                                Amministrazione
                            </a>
                        </h2>
                        <div class="vertical-bar"></div>
                        <h2>
                            <a class="logout" href="logout.php">
                                Logout
                            </a>
                        </h2>
                    <?php
                    }else{
                        ?>
                        <h2>
                            <a class="logout" href="login.php">
                                Login
                            </a>
                        </h2>
                    <?php
                    }
                ?>      
        </div>
        <div class="nav-central">
            <form action="homepage.php" method="GET">
                <div class="nav-logo">
                    <input type="submit" name="ricerca" value="">
                    <img src="search.png" alt="err" width="20px" style="display: inline-flex;">
                </div>    
                    <input type="text" name="filtro" value="<?php if(isset($_GET['filtro'])) echo $_GET['filtro'];?>">              
            </form>
        </div>
        <div class="nav-right">
            <img src="account.png" alt="dasdas" width="90px">
        </div>
    </div>
    <div class="central-block">
        <div class="sidebar">
            <h5>
                <a class="opzione" href="homepage.php">Visualizza corsi</a>
            </h5>
            <h5>
                <a class="opzione" href="visualizzaAppelli.php">Visualizza appelli</a>
            </h5>
        </div>
        <div class="body">
            <h1 style="text-align: center; color: green;">CORSI DISPONIBILI:</h1>
            <div class="container-esami">
                <?php 
                $listaCorsi = [];
                if(isset($_GET['filtro']) && $_GET['filtro'] != "")
                    $listaCorsi = getCorsiLike($_GET['filtro']);
                else
                    $listaCorsi = getCorsi();

                    foreach($listaCorsi as $corso){
                        ?>
                         <div class="blocco-esame" style="background-color:<?php echo $corso->id_colore?>">
                            <div class="nome-esame" >
                                <?php echo $corso->nome?>
                            </div> 
                                <div class="info-button">
                                    Elimina
                                    <form action="eliminaCorsoScript.php" method="GET">
                                        <input type="submit" name="iscriviti" value="" >
                                        <input type="hidden" name="corso" value="<?php echo $corso->id?>">
                                    </form>
                                </div>  
                            </div>  
                        <?php
                    }  
                ?>   
            </div>           
        </div>
    </div>
</div>
</body>
</html>