<?php session_start(); ?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileLogin.css">
    <title>ERRORE :(</title>
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
                InfoStuff
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
        <div class="bodyReg">
            <div class="box">
                <?php
                if(isset($_COOKIE['cdl'])) {
                    echo "<h1>{$_COOKIE['cdl']}</h1>";
                    setcookie('cdl', '', time()-60);
                }
                elseif(isset($_COOKIE['corso'])) {
                    echo "<h1>{$_COOKIE['corso']}</h1>";
                    setcookie('corso', '', time()-60);
                }
                elseif(isset($_COOKIE['appello'])) {
                    echo "<h1>{$_COOKIE['appello']}</h1>";
                    setcookie('appello', '', time()-60);
                }
                elseif(isset($_COOKIE['verb'])) {
                    echo "<h1>{$_COOKIE['verb']}</h1>";
                    setcookie('verb', '', time()-60);
                }
                elseif(isset($_COOKIE['modificaAppello'])) {
                    echo "<h1>{$_COOKIE['modificaAppello']}</h1>";
                    setcookie('modificaAppello', '', time()-60);
                }
                elseif(isset($_COOKIE['elimina'])) {
                    echo "<h1>{$_COOKIE['elimina']}</h1>";
                    setcookie('elimina', '', time()-60);
                }
                elseif(isset($_COOKIE['modificaCorsoDiLaurea'])) {
                    echo "<h1>{$_COOKIE['modificaCorsoDiLaurea']}</h1>";
                    setcookie('modificaCorsoDiLaurea', '', time()-60);
                }
                elseif(isset($_COOKIE['modificaCorso'])) {
                    echo "<h1>{$_COOKIE['modificaCorso']}</h1>";
                    setcookie('modificaCorso', '', time()-60);
                }
                elseif(isset($_COOKIE['prossimita'])) {
                    echo "<h1>{$_COOKIE['prossimita']}</h1>";
                    setcookie('prossimita', '', time()-60);
                }
                elseif(isset($_COOKIE['pwd'])) {
                    echo "<h1>{$_COOKIE['pwd']}</h1>";
                    setcookie('pwd', '', time()-60);
                }
                elseif(isset($_COOKIE['modificaUtenza'])) {
                    echo "<h1>{$_COOKIE['modificaUtenza']}</h1>";
                    setcookie('modificaUtenza', '', time()-60);
                }
                else
                    echo "<h1>ERRORE: Registrazione fallita.</h1>";
                ?>
            </div>
            <div style="padding-bottom: 10%;">
            <?php
            if(isset($_SESSION['loginType'])) {?>
                <form action="homepage-users.php">
                    <input class="bottoneHome" type="submit" name="invio" value="Torna alla home">
                </form>
            <?php
            }
            else {?>
                <form action="homepage.php">
                    <input class="bottoneHome" type="submit" name="invio" value="Torna alla home">
                </form>
            <?php
            }?>
            </div>
        </div>
    </div>
</div>
</body>
</html>