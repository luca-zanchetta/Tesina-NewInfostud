<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']))
    header('Location: homepage.php');

if(isset($_SESSION['matricola']))
    $studenteLoggato = getStudenteFromMatricola($_SESSION['matricola']);
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileVisualizzazioneLista.css">
    <link rel="stylesheet" href="stileHomepage-users.css">
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
        </div>
        <div class="nav-right">
        <h2>
            <form action="">
                <input type="button">
            </form>
                Logout
        </h2>
        <div class="vertical-bar"></div>
            <div class="nav-logo">
                <a href="homepage-users.php">
                    <img src="account.png" alt="logo" width="90px">
                </a>
            </div>
        </div>
        </div>
    </div>
    <div class="central-block">
        <?php creaSidebar($_SESSION['loginType']); ?>
        <div class="body">
            <div class="infoTitle">
                <div class="infoTitle-position">
                    <h2>Home > FAQ</h2><!--Generato dallo script-->
                </div>
                <div class="infoTitle-user">
                    <h2>Nome,Cognome, Matricola</h2><!--Generato dallo script-->
                </div>
            </div>    
            <hr />
        <div class="listContainer">
                <div class="listItem">
                    <div class="element">
                        <h2>Nome</h2>
                    </div>
                </div> 
                <hr class="redBar" />
                <form action="homepage-users-visualizzaFaq.php">
                    <div class="listItem">
                        <input type="submit" value="" class="bottoneCorsi"> <!--Struttura di ogni bottone -->
                        <input type="hidden">
                        <div class="element">
                            <h2>Basi di dati</h2>
                        </div>
                        <div class="element">
                            
                        </div>
                        <div class="lastElement">
                            <img src="arrowBlack.png" alt="err" width="30px" height="30px" style="display:flex;align-content:center">
                        </div>
                    </div> 
                </form>
                <hr />
                <div class="listItem">
                    <div class="element">
                        <h2>Elettronica I</h2>
                    </div>
                    <div class="element">
                        
                    </div>
                    <div class="lastElement">
                        <a href="fittizia.php"><img class="arrow" width="30px" height="30px" alt="err" src="arrowBlack.png"></a>
                    </div>
                </div> 
            <hr>
        </div>
    </div>
</div>
</body>
</html>