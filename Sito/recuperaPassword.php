<?php
require_once('../Sito/phpFunctions-login.php');
require_once('../Sito/phpFunctions-get.php');


if(isset($_COOKIE['loginType'])) {
    if(isset($_POST['forgotPWD'])) {
        $presenzaDati = FALSE;
        $registrato = FALSE;

        switch($_COOKIE['loginType']) {
            case "Studente":
                if((isset($_POST['matricola']) && $_POST['matricola'] != "")) {
                    $presenzaDati = TRUE;
                        
                    $registrato = verificaPresenzaMatricola($_POST['matricola'], $_COOKIE['loginType']);
                    if($registrato) {
                        $password = getPasswordStudente($_POST['matricola']);
                        if($password != "") {
                            setcookie('matricola', "{$_POST['matricola']}");
                            setcookie('password', "{$password}");
                            header('Location: avvisoPassword.php');
                        }
                    }
                }
                break;
                    
            case "Docente":
                if((isset($_POST['matricola']) && $_POST['matricola'] != "")) {
                    $presenzaDati = TRUE;

                    $registrato = verificaPresenzaMatricola($_POST['matricola'], $_COOKIE['loginType']);
                    if($registrato) {
                        $password = getPasswordDocente($_POST['matricola']);
                        if($password != "") {
                            setcookie('matricola', "{$_POST['matricola']}");
                            setcookie('password', "{$password}");
                            header('Location: avvisoPassword.php');
                        }
                    }
                }
                break;

            case "Segretario":
                if((isset($_POST['username']) && $_POST['username'] != "")) {
                    $presenzaDati = TRUE;

                    $registrato = verificaPresenzaUsername($_POST['username'], $_COOKIE['loginType']);
                    if($registrato) {
                        $password = getPasswordSegretario($_POST['username']);
                        if($password != "") {
                            setcookie('username', "{$_POST['username']}");
                            setcookie('password', "{$password}");
                            header('Location: avvisoPassword.php');
                        }
                    }
                }
                break;

            case "Amministratore":
                if((isset($_POST['username']) && $_POST['username'] != "")) {
                    $presenzaDati = TRUE;

                    $registrato = verificaPresenzaUsername($_POST['username'], $_COOKIE['loginType']);
                    if($registrato) {
                        $password = getPasswordAmministratore($_POST['username']);
                        if($password != "") {
                            setcookie('username', "{$_POST['username']}");
                            setcookie('password', "{$password}");
                            header('Location: avvisoPassword.php');
                        }
                    }
                }
                break;
        }
    }
}
else {
    header('Location: homepage.php');
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Recupera password - InfoStuff</title>
    <link rel="stylesheet" href="stileLogin.css">
    <link rel="stylesheet" href="stile-base.css">
</head>
<body class="bodyLogin">
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
                InfoStuff
            </h2>  
        </div>
        <div class="nav-right">
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
        </div>
    </div>
<div class="central-block">
    <div class="bodyReg">
        <h2 class="title">Recupera password <?php echo $_COOKIE['loginType']; ?></h2> 

        <form action="recuperaPassword.php" method="POST">
        <div class="box">
            <?php
                if($_COOKIE['loginType'] == "Studente" || $_COOKIE['loginType'] == "Docente") {
            ?>
            <h2>Matricola:</h2>
            <?php
                }
                elseif($_COOKIE['loginType'] == "Segretario" || $_COOKIE['loginType'] == "Amministratore") {
            ?>
            <h2>Username:</h2>
            <?php
                }

                if(isset($_POST['matricola']) && ($_COOKIE['loginType'] == "Studente" || $_COOKIE['loginType'] == "Docente")) {
                    echo "<input class=\"textField\" type=\"text\" name=\"matricola\" value=\"{$_POST['matricola']}\" required>";
                }
                elseif(!isset($_POST['matricola']) && ($_COOKIE['loginType'] == "Studente" || $_COOKIE['loginType'] == "Docente")) {
                ?>
                    <input class="textField" type="text" name="matricola" required>
                <?php
                }
                elseif(isset($_POST['username']) && ($_COOKIE['loginType'] == "Segretario" || $_COOKIE['loginType'] == "Amministratore")) {
                    echo "<input class=\"textField\" type=\"text\" name=\"matricola\" value=\"{$_POST['username']}\" required>";
                }
                elseif(!isset($_POST['username']) && ($_COOKIE['loginType'] == "Segretario" || $_COOKIE['loginType'] == "Amministratore")) {
                ?>
                    <input class="textField" type="text" name="username" required>
                <?php
                }
            ?>
                <br />
                <input class="bottoni" type="submit" name="forgotPWD" value="RECUPERA" style="width: 33%;">
            </form>
        </div> 
        <?php
        if(isset($_POST['forgotPWD'])) {
            if(!$presenzaDati) {                // Manca qualche dato
                echo "
                    <div class=\"box4\">
                        <h2 class=\"error\">DATI MANCANTI! Riprovare.</h2>
                    </div>";
            }
            if($presenzaDati && !$registrato) {                  // Utente non registrato
                echo "
                    <div class=\"box4\">
                        <h2 class=\"error\">UTENTE NON REGISTRATO! Riprovare.</h2>
                    </div>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>