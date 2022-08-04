<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']) || $_SESSION['loginType'] != "Amministratore")
    header('Location: homepage.php');

if(isset($_SESSION['username']))
    $adminLoggato = getAdminFromUsername($_SESSION['username']);
else
    echo "<p>ERRORE</p>";


if(isset($_POST['invio'])) {
    $presenzaDati = FALSE;

    if((isset($_POST['nome']) && $_POST['nome'] != "") && 
       (isset($_POST['docente']) && $_POST['docente'] != "seleziona") && 
       (isset($_POST['anno']) && $_POST['anno'] != "seleziona") && 
       (isset($_POST['semestre']) && $_POST['semestre'] != "seleziona") &&
       (isset($_POST['curriculum']) && $_POST['curriculum'] != "") &&
       (isset($_POST['cfu']) && $_POST['cfu'] != "seleziona") &&
       (isset($_POST['ssd']) && $_POST['ssd'] != "") &&
       (isset($_POST['corsoLaurea']) && $_POST['corsoLaurea'] != "seleziona") &&
       (isset($_POST['descrizione']) && $_POST['descrizione'] != ""))
            $presenzaDati = TRUE;
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
    <title>Inserisci corso - Infostud</title>
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
                    <h2>Home > Inserisci corso</h2>
                </div>
                <div class="infoTitle-user">
                <?php
                    echo "<h2>{$adminLoggato->username}</h2>";
                ?>
                </div>
            </div>
            <div>    
                <hr class="redBar" />
            </div>
            <div class="boxInsC">
            <form action="inserisciCorso.php" method="POST" id="input">
                <div class="insContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                        <h3>Docente: </h3>
                        <h3>Anno: </h3>
                        <h3>Semestre: </h3>
                        <h3>Curriculum: </h3>
                        <h3>CFU: </h3>
                        <h3>SSD: </h3>
                        <h3>Corso di Laurea: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\" value=\"{$_POST['nome']}\">";
                    elseif(!isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\">";
                    ?>
                    <select class="choice" name="docente">
                        <?php
                            if(isset($_POST['docente']) && $_POST['docente'] != "seleziona")
                                echo "<option value=\"{$_POST['docente']}\">{$_POST['docente']}</option>";
                            elseif(!isset($_POST['docente']))
                                echo "<option value=\"seleziona\">Docente...</option>";
                                        
                            $docenti = [];
                            $docenti = getDocenti();
                            foreach($docenti as $docente) {
                                echo "<option value=\"{$docente->matricola}\">{$docente->nome} {$docente->cognome}</option>";
                            }
                        ?>
                    </select>
                    <select class="choice" name="anno">
                        <?php
                            if(isset($_POST['anno']) && $_POST['anno'] != "seleziona")
                                echo "<option value=\"{$_POST['anno']}\">{$_POST['anno']}</option>";
                            elseif(!isset($_POST['anno']))
                                echo "
                                <option value=\"seleziona\">Anno...</option>
                                <option value=\"1\">1</option>
                                <option value=\"2\">2</option>
                                <option value=\"3\">3</option>
                                ";
                        ?>
                    </select>
                    <select class="choice" name="semestre">
                        <?php
                            if(isset($_POST['semestre']) && $_POST['semestre'] != "seleziona")
                                echo "<option value=\"{$_POST['semestre']}\">{$_POST['semestre']}</option>";
                            elseif(!isset($_POST['semestre']))
                                echo "
                                <option value=\"seleziona\">Semestre...</option>
                                <option value=\"1\">1</option>
                                <option value=\"2\">2</option>
                                ";
                        ?>
                    </select>
                    <?php
                    if(isset($_POST['curriculum']))
                        echo "<input class=\"textField\" type=\"text\" name=\"curriculum\" value=\"{$_POST['curriculum']}\">";
                    elseif(!isset($_POST['curriculum']))
                        echo "<input class=\"textField\" type=\"text\" name=\"curriculum\">";
                    ?>
                    <select class="choice" name="cfu">
                        <?php
                            if(isset($_POST['cfu']) && $_POST['cfu'] != "seleziona")
                                echo "<option value=\"{$_POST['cfu']}\">{$_POST['cfu']}</option>";
                            elseif(!isset($_POST['cfu']))
                                echo "
                                <option value=\"seleziona\">CFU...</option>
                                <option value=\"3\">3</option>
                                <option value=\"6\">6</option>
                                <option value=\"9\">9</option>
                                <option value=\"12\">12</option>
                                ";
                        ?>
                    </select>
                    <?php
                    if(isset($_POST['ssd']))
                        echo "<input class=\"textField\" type=\"text\" name=\"ssd\" value=\"{$_POST['ssd']}\">";
                    elseif(!isset($_POST['ssd']))
                        echo "<input class=\"textField\" type=\"text\" name=\"ssd\">";
                    ?>
                    <select class="choice" name="corsoLaurea">
                        <?php
                            if(isset($_POST['corsoLaurea']) && $_POST['corsoLaurea'] != "seleziona")
                                echo "<option value=\"{$_POST['corsoLaurea']}\">{$_POST['corsoLaurea']}</option>";
                            elseif(!isset($_POST['corsoLaurea']))
                                echo "<option value=\"seleziona\">Corso di laurea...</option>";
                                        
                            $corsiLaurea = [];
                            $corsiLaurea = getCorsiDiLaurea();
                            foreach($corsiLaurea as $corso) {
                                echo "<option value=\"{$corso->id}\">{$corso->nome}</option>";
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <div style="text-align:center;">
                    <h3>Descrizione: </h3>
                    <textarea form="input" name="descrizione"></textarea>
                </div>
                <div style="padding-top: 1%; margin-left: 50%;">
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