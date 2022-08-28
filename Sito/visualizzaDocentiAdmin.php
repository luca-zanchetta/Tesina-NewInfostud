<?php
session_start();
require_once('../Sito/phpFunctions-display.php');
require_once('../Sito/phpFunctions-get.php');
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stile-amministrazione.css">
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
            <form action="visualizzaDocentiAdmin.php" method="POST">
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
        <?php
        if(isset($_SESSION['loginType']))
            creaSidebar($_SESSION['loginType']);
        ?>
        <div class="body">
            <h2 style="margin-left: 2.5%; font-size: 200%;">DOCENTI ISCRITTI:</h2>
            <div><hr class="redBar" /></div>
            <div class="listContainer">
                <div class="listItem">
                    <div class="element">
                        <h2>Matricola</h2>
                    </div>
                    <div class="element">
                        <h2>Cognome</h2>
                    </div>
                    <div class="element">
                        <h2>Nome</h2>
                    </div>
                    <div class="element">
                    </div>
                </div>
                <hr />
            <?php
                $docenti = [];     // Da implementare ricerca con MATRICOLA (vedi relazione)
                if(isset($_POST['filtro']) && $_POST['filtro'] != "") {
                    $docente = getDocenteFromMatricola($_POST['filtro']);

                    if(!$docente) {
                        echo "<h3 class=\"voceElenco\">Nessun docente corrispondente ai criteri di ricerca.</h3>";
                    }
                    else {
                        ?>
                            <div class="listItem">
                                <div class="element">
                                    <h2><?php echo $docente->matricola; ?></h2>
                                </div>
                                <div class="element">
                                    <h2><?php echo $docente->cognome; ?></h2>
                                </div>
                                <div class="element">
                                    <h2><?php echo $docente->nome; ?></h2>
                                </div>
                                <div class="element">
                                    <form action="gestioneUtenza.php" method="POST">
                                        <input class="admin" type="submit" name="gestisciDocente" value="GESTISCI">
                                        <input type="hidden" name="matricola" value="<?php echo $docente->matricola; ?>">
                                    </form>
                                </div>
                            </div>
                            <hr />
                        <?php
                    }
                }
                else {
                    $docenti = getDocenti();

                    if(!$docenti) {
                        echo "<h3 class=\"voceElenco\">Nessun docente registrato.</h3>";
                    }
                    else {
                        foreach($docenti as $docente) {
                        ?>
                            <div class="listItem">
                                <div class="element">
                                    <h2><?php echo $docente->matricola; ?></h2>
                                </div>
                                <div class="element">
                                    <h2><?php echo $docente->cognome; ?></h2>
                                </div>
                                <div class="element">
                                    <h2><?php echo $docente->nome; ?></h2>
                                </div>
                                <div class="element">
                                    <form action="gestioneUtenza.php" method="POST">
                                        <input class="admin" type="submit" name="gestisciDocente" value="GESTISCI">
                                        <input type="hidden" name="matricola" value="<?php echo $docente->matricola; ?>">
                                    </form>
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