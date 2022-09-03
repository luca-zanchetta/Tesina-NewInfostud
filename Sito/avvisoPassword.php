<?php session_start(); ?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileLogin.css">
    <title>Recupera password - Infostud</title>
</head>
<body style="background-color: white;">
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
        <div class="bodyReg">
            <div class="box">
                <?php
                if(isset($_COOKIE['matricola']) && isset($_COOKIE['password'])) {
                    echo "<h1>Matricola: {$_COOKIE['matricola']}</h1>";
                    echo "<h1>Password: {$_COOKIE['password']}</h1><br />";
                    echo '<h3 style="color: red; text-align: center;">Non dimenticarla!</h3>';
                    setcookie('matricola', '', time()-60);
                    setcookie('password', '', time()-60);
                }
                elseif(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                    echo "<h1>Username: {$_COOKIE['username']}</h1>";
                    echo "<h1>Password: {$_COOKIE['password']}</h1><br />";
                    echo '<h3 style="color: red; text-align: center;">Non dimenticarla!</h3>';
                    setcookie('username', '', time()-60);
                    setcookie('password', '', time()-60);
                }
                else
                    echo "<h1>ERRORE: Recupero password fallito.</h1>";
                ?>
            </div>
            <div style="padding-bottom: 10%;">
                <form action="login.php" method="POST">
                    <input class="bottoneHome" type="submit" name="invio" value="Torna al login">
                    <input type="hidden" name="loginType" value="<?php echo $_COOKIE['loginType']; ?>">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>