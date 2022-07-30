<?php
require_once('../Sito/phpFunctions.php');
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileVisualizzazioneLista.css">
    <title>Docenti - Infostud</title>
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
        <div class="nav-central">
            <form action="visualizzaDocenti.php" method="POST">
                <div class="nav-logo">
                    <input type="submit" name="ricerca" value="">
                    <img src="search.png" alt="err" width="20px" style="display: inline-flex;">
                </div>    
                    <input type="text" name="filtro">              
            </form>
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
        <div class="sidebar">
            <div style="display: flex;">
                <h5 style="display: flex; margin: 0px;">
                    <a class="opzione" href="homepage.php">Homepage</a>
                </h5>
            </div>
            <div style="display: flex;">
                <h5 style="display: flex; margin: 0px;">
                    <a class="opzione" href="visualizzaCorsiDiLaurea.php">I nostri corsi di laurea</a>
                </h5>
            </div>
            <div style="display: flex;">
                <h5 style="display: flex; margin: 0px;">
                    <a class="opzione" href="visualizzaCorsi.php">I nostri corsi</a>
                </h5>
            </div>
        </div>
        <div class="body">
            <h2 style="margin-left: 2.5%; font-size: 200%;">I NOSTRI DOCENTI:</h2>
            <hr class="redBar" />
            <div class="listContainer">
                <div class="listItem">
                    <div class="element" style="width: 25%;">
                        <h2>Cognome</h2>
                    </div>
                    <div class="element" style="width: 25%;">
                        <h2>Nome</h2>
                    </div>
                    <div class="element" style="width: 25%;">
                        <h2>Materia</h2>
                    </div>
                </div>
                <hr />
            <?php
                $corsi = [];
                if(isset($_POST['filtro']) && $_POST['filtro'] != "") {
                    $corsi = getDocentiLike($_POST['filtro']);

                    if(!$corsi) {
                        echo "<h3 class=\"voceElenco\">Nessun docente corrispondente ai criteri di ricerca.</h3>";
                    }
                    else {
                        foreach($docenti as $docente) {
                            $nomeCorso = getNomeCorso($docente->id_corso);
                        ?>
                            <div class="listItem">
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $docente->cognome ?></h2>
                                </div>
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $docente->nome ?></h2>
                                </div>
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $nomeCorso ?></h2>
                                </div>
                                <div class="lastElement" style="width: 25%;">
                                    <a href="fittizia.php"><img class="arrow" width="30px" height="30px" alt="err" src="arrowBlack.png"></a>
                                </div>
                            </div>
                            <hr />
                        <?php
                        }
                    }
                }
                else {
                    $docenti = getDocenti();

                    if(!$docenti) {
                        echo "<h3 class=\"voceElenco\">Al momento non ci sono docenti registrati.</h3>";
                    }
                    else {
                        foreach($docenti as $docente) {
                            $nomeCorso = getNomeCorso($docente->id_corso);
                        ?>
                            <div class="listItem">
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $docente->cognome ?></h2>
                                </div>
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $docente->nome ?></h2>
                                </div>
                                <div class="element" style="width: 25%;">
                                    <h2><?php echo $nomeCorso ?></h2>
                                </div>
                                <div class="lastElement" style="width: 25%;">
                                    <a href="fittizia.php"><img class="arrow" width="30px" height="30px" alt="err" src="arrowBlack.png"></a>
                                </div>
                            </div>
                            <hr />
                        <?php
                        }
                    }
                }
            ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>