<?php
require_once('../Sito/phpFunctions-display.php');
require_once('../Sito/phpFunctions-get.php');
session_start();

if(!isset($_POST['gestisciStudente']) && !isset($_POST['gestisciDocente']) && !isset($_POST['gestisciSegretario'])) {
    header('Location: homepage-users.php');
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stile-amministrazione.css">
    <link rel="stylesheet" href="stileHomepage-users.css">
    <title>Gestione Utenza - Infostud</title>
</head>
<body style="background-color: gainsboro;">
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
        </div>
        <div class="nav-right">
        <?php
        if(!isset($_SESSION['loginType'])) {?>
            <h2>
                <form action="login.php" method="POST">
                    <input type="submit" value="">
                    <input name="loginType" type="hidden" value="Studente">
                </form>
                    Studenti      
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php" method="POST">
                    <input type="submit" value="">
                    <input name="loginType" type="hidden" value="Docente">
                </form>
                    Docenti
                
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php" method="POST">
                    <input type="submit" value="">
                    <input name="loginType" type="hidden" value="Segretario">
                </form>
                    Segreteria
                
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php" method="POST">
                    <input type="submit" value="">
                    <input name="loginType" type="hidden" value="Amministratore">
                </form>
                    Amministrazione
            </h2>
        <?php
        }
        elseif(isset($_SESSION['loginType'])) {?>
            <h2>
                <form action="logout.php">
                    <input type="submit" value="">
                </form>
                    Logout
            </h2>
            <div class="vertical-bar"></div>
            <div class="nav-logo">
                <a href="homepage-users.php">
                    <img src="account.png" alt="logo" width="90px">
                </a>
            </div>
        <?php
        }?>    
        </div>
    </div>
    <div class="central-block">
        <?php
        if(isset($_SESSION['loginType']))
            creaSidebar($_SESSION['loginType']);
        ?>
        <div class="body">
            <div class="infoTitle">
                <div class="infoTitle-position">
                    <?php
                    if(isset($_POST['gestisciStudente']))
                        echo '<h2 style="margin-left: 3%;">GESTIONE STUDENTE</h2>';
                    elseif(isset($_POST['gestisciDocente']))
                        echo '<h2 style="margin-left: 3%;">GESTIONE DOCENTE</h2>';
                    elseif(isset($_POST['gestisciSegretario']))
                        echo '<h2 style="margin-left: 3%;">GESTIONE SEGRETARIO</h2>';
                    ?>
                </div>
                <div class="infoTitle-user">
                <?php
                    if(isset($_POST['gestisciStudente'])) {
                        $studente = getStudenteFromMatricola($_POST['matricola']);
                        echo "<h2 style=\"margin-right: 3%;\">{$studente->nome} {$studente->cognome}, {$studente->matricola}</h2>";
                    }
                    elseif(isset($_POST['gestisciDocente'])) {
                        $docente = getDocenteFromMatricola($_POST['matricola']);
                        echo "<h2 style=\"margin-right: 3%;\">{$docente->nome} {$docente->cognome}, {$docente->matricola}</h2>";
                    }
                    elseif(isset($_POST['gestisciSegretario'])) {       
                        $segretario = getSegretarioFromUsername($_POST['username']);
                        echo "<h2 style=\"margin-right: 3%;\">{$segretario->username}</h2>";
                    }?>
                </div>
            </div>    
            <div><hr class="redBar" /></div>
            <?php
            if(isset($_POST['gestisciStudente'])) 
                displayFullStudente($studente);

            elseif(isset($_POST['gestisciDocente'])) 
                displayFullDocente($docente);
                
            elseif(isset($_POST['gestisciSegretario']))
                displayFullSegretario($segretario);
            ?>
            <div class="menuAdmin" style="margin-left: 30%; margin-top: 5%;">
                <form action="fittizia.php" style=""><input class="admin" type="submit" value="MODIFICA"></form>
                <form action="fittizia.php" style="margin-left: 20%;"><input class="admin" type="submit" value="SOSPENDI"></form>
                <form action="fittizia.php" style="margin-left: 20%;"><input class="admin" type="submit" value="ELIMINA"></form>
            </div>
        </div>
    </div>
</div>
</body>
</html>