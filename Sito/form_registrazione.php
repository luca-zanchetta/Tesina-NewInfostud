<?php
    if(isset($_POST['loginType'])) {
        $login = $_POST['loginType'];
    }
    else {
        header('Location: homepage.php');
    }
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileLogin.css">
    <title>Registrazione - Infostud</title>
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
        <div class="body">
            <h2 class="title">Registrazione <?php echo $login; ?></h2>
            <?php
            if($login == "Studente") {?>
            <div class="boxReg">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                        <h3>Cognome: </h3>
                        <h3>Data di nascita: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                        <input class="textField" type="text" name="nome">
                        <input class="textField" type="text" name="cognome">
                        <input class="textField" type="text" name="dataNascita">
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <form action="fittizia.php" method="POST">
                        <input class="bottoni" type="submit" name="reg" value="INVIO">
                    </form>
                </div>
            </div>
            <?php
            }
            elseif($login == "Docente") {?>
            <div class="boxReg">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                        <h3>Cognome: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                        <input class="textField" type="text" name="nome">
                        <input class="textField" type="text" name="cognome">
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <form action="fittizia.php" method="POST">
                        <input class="bottoni" type="submit" name="reg" value="INVIO">
                    </form>
                </div>
            </div>
            <?php
            }
            elseif($login == "Segretario" || $login == "Amministratore") {?>
            <div class="boxReg">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Username: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                        <input class="textField" type="text" name="username">
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <form action="fittizia.php" method="POST">
                        <input class="bottoni" type="submit" name="reg" value="INVIO">
                    </form>
                </div>
            </div>
            <?php
            }?>
        </div>
    </div>
</div>
</body>
</html>