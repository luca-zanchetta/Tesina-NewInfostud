<?php
require_once('phpFunctions.php');
session_start();

if(!isset($_SESSION['login'])) header("Location: login.php");
if(isset($_POST['invio'])) {
    if($_POST['codice'] == "" || $_POST['data-appello'] == "" || $_POST['ora-appello'] == "" || $_POST['data-scadenza'] == "" || $_POST['ora-scadenza'] == "" ||$_POST['corso'] == "") {
        //Dati mancanti...
        ?><script>console.log("dati mancanti");</script><?php
    }
    else {
        $nuovoAppello = new appello();

        $nuovoAppello->codice = $_POST['codice'];
        $nuovoAppello->data_appello = $_POST['data-appello']." ".$_POST['ora-appello'];
        $nuovoAppello->data_scadenza = $_POST['data-scadenza']." ".$_POST['ora-scadenza'];
        $nuovoAppello->id_corso = $_POST['corso'];
        
        if(inserisciAppello($nuovoAppello)){
            header("Location: avvisoOK.html");
        }else{
            header("Location: AvvisoErrore.html");
        }
    }
}
elseif(!isset($_POST['invio'])) {
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stile-amministrazione.css">
    <title>Amministrazione - Nuovo appello</title>
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
                    <form action=" ">
                        <input type="button">
                    </form>
                    Infostud
                </h2>
            <div class="vertical-bar"></div>
                <?php
                    if(isset($_SESSION['login'])){
                        ?>
                        <h2>
                            <a class="logout" href="amministrazione.php">
                                Amministrazione
                            </a>
                        </h2>
                        <div class="vertical-bar"></div>
                        <h2>
                            <a class="logout" href="logout.php">
                                Logout
                            </a>
                        </h2>
                    <?php
                    }else{
                        ?>
                        <h2>
                            <a class="logout" href="login.php">
                                Login
                            </a>
                        </h2>
                    <?php
                    }
                ?>      
        </div>
        <!-- 
        <div class="nav-central">
            <form action="homepage.php" method="GET">
                <div class="nav-logo">
                    <input type="submit" name="ricerca" value="">
                    <img src="search.png" alt="err" width="20px" style="display: inline-flex;">
                </div>    
                    <input type="text" name="filtro" value="<?php if(isset($_GET['filtro'])) echo $_GET['filtro'];?>">           
            </form>
        </div>
         -->  
        <div class="nav-right">
            <img src="account.png" alt="dasdas" width="90px">
        </div>
    </div>
    <div class="central-block">
        <div class="sidebar">
            <h5>
                <a class="opzione" href="homepage.php">Visualizza corsi</a>
            </h5>
            <h5>
                <a class="opzione" href="visualizzaAppelli.php">Visualizza appelli</a>
            </h5>
        </div>
        <div class="body">
            <div style="display:flex;align-items:center; flex-direction:column">
                <h1 style="text-align: center; color: green; display:flex;">NUOVO APPELLO</h1>
                <?php
                    if(isset($_POST['invio'])) {
                        if($_POST['codice'] == "" || $_POST['data-appello'] == "" || $_POST['ora-appello'] == "" || $_POST['data-scadenza'] == "" || $_POST['ora-scadenza'] == "" ||$_POST['corso'] == "") 
                            echo "<h3 style=\"text-align: center; color: red; display:flex;\">DATI MANCANTI!</h3>";
                    }
                    ?>
                <form style="display: flex;" action="nuovoAppello.php" id="input" method="POST">
                    <div class="form-body">
                        <div class="input-form">
                            <div class="input-container">
                                <h3>
                                    codice:
                                </h3>
                                <input type="text" name="codice">
                            </div>
                            <div class="input-container">
                                <h3>
                                    data appello:
                                </h3>
                                <input type="date" name="data-appello">
                            </div>
                            <div class="input-container">
                                <h3>
                                    orario appello:
                                </h3>
                                <input type="time" name="ora-appello">
                            </div>
                            <div class="input-container">
                                <h3>
                                    data scadenza:
                                </h3>
                                <input type="date" name="data-scadenza">
                            </div>
                            <div class="input-container">
                                <h3>
                                    orario scadenza:
                                </h3>
                                <input type="time" name="ora-scadenza">
                            </div>
                            <div class="input-container">
                                <h3>
                                    corso:
                                </h3>
                                <select name="corso" form="input">
                                    <?php
                                        $listaCorsi = getCorsi();
                                        foreach($listaCorsi as $corso ){
                                            ?><option value="<?php echo $corso->id ?>"><?php echo $corso->nome ?></option><?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="submit">
                                <input type="submit" name="invio" value="INVIO">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>