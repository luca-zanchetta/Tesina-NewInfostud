<?php
require_once('../Sito/phpFunctions.php');
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <title>Corsi di Laurea - Infostud</title>
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
            <form action="visualizzaCorsiDiLaurea.php" method="POST">
                <div class="nav-logo">
                    <input type="submit" name="ricerca" value="">
                    <img src="search.png" alt="err" width="20px" style="display: inline-flex;">
                </div>    
                    <input type="text" name="filtro">              
            </form>
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
        <div class="sidebar">
            <h5>
                <a class="opzione" href="homepage.php">Homepage</a>
            </h5>
            <h5>
                <a class="opzione" href="visualizzaCorsi.php">I nostri corsi</a>
            </h5>
            <h5>
                <a class="opzione" href="fittizia.php">I nostri docenti</a>
            </h5>
        </div>
        <div class="body">
            <h2 style="margin-left: 2.5%; font-size: 200%;">I NOSTRI CORSI DI LAUREA:</h2>
            <hr class="redBar" />
            <br />
            
            <?php
                $corsiDiLaurea = [];
                if(isset($_POST['filtro']) && $_POST['filtro'] != "") {
                    $corsiDiLaurea = getCorsiDiLaureaLike($_POST['filtro']);

                    if(!$corsiDiLaurea) {
                        echo "<h3 class=\"voceElenco\">Non sono disponibili corsi di laurea corrispondenti.</h3>";
                    }
                    else {
                        echo '<hr class="blackBar" />';
                    }

                    foreach($corsiDiLaurea as $corsoDiLaurea) {
                    ?>
                        <div style="display: flex; flex-direction: row;">
                            <?php echo "<h3 class=\"voceElenco\">".$corsoDiLaurea->nome."</h3>";?>
                            <a href="fittizia.php">
                                <img class="arrow" src="arrowBlack.png">
                            </a>
                        </div>
                        <hr class="blackBar" />
                    <?php
                    }
                }
                else {
                    $corsiDiLaurea = getCorsiDiLaurea();

                    if(!$corsiDiLaurea) {
                        echo "<h3 class=\"voceElenco\">Al momento non sono disponibili corsi di laurea.</h3>";
                    }
                    else {
                        echo '<hr class="blackBar" />';
                    }

                    foreach($corsiDiLaurea as $corsoDiLaurea) {
                    ?>
                        <div style="display: flex; flex-direction: row;">
                            <?php echo "<h3 class=\"voceElenco\">".$corsoDiLaurea->nome."</h3>";?>
                            <a href="fittizia.php">
                                <img class="arrow" src="arrowBlack.png">
                            </a>
                        </div>
                        <hr class="blackBar" />
                    <?php
                    }
                }
                
            ?>
        </div>
    </div>
</div>
</body>
</html>