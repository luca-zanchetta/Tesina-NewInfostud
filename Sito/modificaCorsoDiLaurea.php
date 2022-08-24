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
    if(isset($_POST['idCorsoDiLaurea']) && $_POST['idCorsoDiLaurea'] != 0 &&
       isset($_POST['nomeCorsoDiLaurea']) && $_POST['nomeCorsoDiLaurea'] != "") {

        if(!modificaCorsoDiLaurea($_POST['idCorsoDiLaurea'], $_POST['nome'])) {
            setcookie('modificaCorsoDiLaurea', "ERRORE: Modifica del corso di laurea in {$corsoDiLaurea->nome} non riuscita.");
            header('Location: avvisoErrore.php');
        }
        else
            header('Location: avvisoOK.php');
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
    <title>Modifica corso di laurea - Infostud</title>
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
                    <h2>Home > Gestisci corsi di laurea > Modifica</h2>
                </div>
                <div class="infoTitle-user">
                <?php
                    echo "<h2>{$adminLoggato->username}</h2>";
                ?>
                </div>
            </div>    
            <hr />
            <div class="boxInsCDL">
            <form action="modificaCorsoDiLaurea.php" method="POST">
                <div class="insContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['nomeCorsoDiLaurea']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\" value=\"{$_POST['nomeCorsoDiLaurea']}\" required>";
                    elseif(!isset($_POST['nomeCorsoDiLaurea']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\" required>";
                    ?>
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 50%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                    <input type="hidden" name="idCorsoDiLaurea" value="<?php echo $_POST['idCorsoDiLaurea']; ?>">
                    <input type="hidden" name="nomeCorsoDiLaurea" value="<?php echo $_POST['nomeCorsoDiLaurea']; ?>">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>