<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']) || $_SESSION['loginType'] == "Studente")
    header('Location: homepage.php');

if(isset($_SESSION['username']) && $_SESSION['loginType'] == "Amministratore")
    $adminLoggato = getAdminFromUsername($_SESSION['username']);
elseif(isset($_SESSION['username']) && $_SESSION['loginType'] == "Segretario")
    $segretarioLoggato = getSegretarioFromUsername($_SESSION['username']);
elseif(isset($_SESSION['matricola']) && $_SESSION['loginType'] == "Docente")
    $docenteLoggato = getDocenteFromMatricola($_SESSION['matricola']);
else
    echo "<p>ERRORE</p>";


if(isset($_POST['invio'])) {
    $presenzaDati = FALSE;

    if($_SESSION['loginType'] == "Docente") {
        if((isset($_POST['data']) && $_POST['data'] != "") &&
        (isset($_POST['ora']) && $_POST['ora'] != ""))
             $presenzaDati = TRUE;
    }
    else {
        if((isset($_POST['data']) && $_POST['data'] != "") &&
           (isset($_POST['ora']) && $_POST['ora'] != "") &&
           (isset($_POST['corso']) && $_POST['corso'] != "seleziona"))
             $presenzaDati = TRUE;
    }

}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileHomepage-users.css">
    <link rel="stylesheet" href="stile-amministrazione.css">
    <title>Inserisci appello - Infostud</title>
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
        </div>
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
                    <h2>Home > Inserisci appello</h2>
                </div>
                <div class="infoTitle-user">
                <?php
                if(isset($_SESSION['username']) && $_SESSION['loginType'] == "Amministratore")
                    echo "<h2>{$adminLoggato->username}</h2>";
                elseif(isset($_SESSION['username']) && $_SESSION['loginType'] == "Segretario")
                    echo "<h2>{$segretarioLoggato->username}</h2>";
                elseif(isset($_SESSION['matricola']) && $_SESSION['loginType'] == "Docente")
                    echo "<h2>{$docenteLoggato->nome} {$docenteLoggato->cognome}, {$docenteLoggato->matricola}</h2>";                   
                ?>
                </div>
            </div>
            <div>    
                <hr class="redBar" />
            </div>
            <div class="boxInsAPP">
            <form action="inserisciAppello.php" method="POST" id="input">
                <div class="insContainer">
                    <div class="labels">
                        <h3>Data: </h3>
                        <h3>Ora: </h3>
                        <?php
                        if($_SESSION['loginType'] != "Docente")
                            echo "<h3>Corso: </h3>";
                        ?>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['data']))
                        echo "<input class=\"textField\" type=\"date\" name=\"data\" value=\"{$_POST['data']}\">";
                    elseif(!isset($_POST['data']))
                        echo "<input class=\"textField\" type=\"date\" name=\"data\">";
                    
                    if(isset($_POST['ora']))
                        echo "<input class=\"textField\" type=\"time\" name=\"ora\" value=\"{$_POST['ora']}\">";
                    elseif(!isset($_POST['data']))
                        echo "<input class=\"textField\" type=\"time\" name=\"ora\">";

                    
                    if($_SESSION['loginType'] != "Docente") {?>
                    <select class="choice" name="corso" style="width: 52%;">
                        <?php
                            if(isset($_POST['corso']) && $_POST['corso'] != "seleziona")
                                echo "<option value=\"{$_POST['corso']}\">{$_POST['corso']}</option>";
                            elseif(!isset($_POST['corso']))
                                echo "<option value=\"seleziona\">Corso...</option>";
                                        
                            $corsi = [];
                            $corsi = getCorsi();
                            foreach($corsi as $corso) {
                                echo "<option value=\"{$corso->id}\">{$corso->nome}</option>";
                            }
                        ?>
                    </select><?php
                    }?>
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 45%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                </div>
            </form>
            </div>
            <?php
            if(isset($_POST['invio']) && !$presenzaDati)
                echo "
                <div style=\"margin-left: -6%; padding-bottom: 7%;\">
                    <h2 class=\"error\">DATI MANCANTI! Riprovare.</h2>
                </div>";
            ?>
        </div>
    </div>
</div>
</body>
</html>