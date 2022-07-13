<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Login - Infostud</title>
    <link rel="stylesheet" href="stileLogin.css">
    <link rel="stylesheet" href="stile-base.css">
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
                <form action="login.php">
                    <input type="submit" value="">
                </form>
                    Studenti      
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php">
                    <input type="submit" value="">
                </form>
                    Docenti
                
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php">
                    <input type="submit" value="">
                </form>
                    Segreteria
                
            </h2>
            <div class="vertical-bar"></div>
            <h2>
                <form action="login.php">
                    <input type="submit" value="">
                </form>
                    Amministrazione
            </h2>   
        </div>
    </div>
<div class="central-block">
    <div class="body">
        <h2 class="title">LOGIN PER /da inserire con php/</h2> 

        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="box">
            <h2>Matr o IGN:</h2>
            <?php
                if(isset($_POST['matricola'])) {
                    echo "<input class=\"textField\" type=\"text\" name=\"matricola\" value=\"{$_POST['matricola']}\">";
                }
                elseif(!isset($_POST['matricola'])) {
                    ?>
                    <input class="textField" type="text" name="matricola">
                    <?php
                }
            ?>
            <br />
            <h2>Password:</h2>
            <input class="textField" type="password" name="password">
        </div> 
        <div>
            <input class="bottoni" type="submit" name="invio" value="LOGIN">
        </div>
        </form>
        <div class="box2">
            <h2>Non sei registrato?</h2>
            <form action="form_registrazione.php">
                <input class="bottoni2" type="submit" name="reg" value="REGISTRATI">
            </form>
        </div>
        <?php
            if(isset($_POST['invio']) && ($_POST['matricola'] == "" || $_POST['password'] == "")) { // Manca qualche dato
                echo "
                    <div class=\"box4\">
                        <h2 class=\"error\">DATI MANCANTI! Riprovare.</h2>
                    </div>";
            }
            elseif(isset($_POST['invio']) && (!$utente) && ($verifica_presenza == 1) && !(($_POST['matricola'] == "" || $_POST['password'] == ""))) { // Lo studente non è registrato
                echo "
                    <div class=\"box4\">
                        <h2 class=\"error\">PASSWORD ERRATA! Riprovare.</h2>
                    </div>";
            }            
            elseif(isset($_POST['invio']) && (!$utente) && ($verifica_presenza == 0) && !(($_POST['matricola'] == "" || $_POST['password'] == ""))) { // Lo studente non è registrato
                echo "
                    <div class=\"box4\">
                        <h2 class=\"error\">STUDENTE NON REGISTRATO! Riprovare.</h2>
                    </div>";
            }
        ?>
    </div>
</div>

</body>
</html>