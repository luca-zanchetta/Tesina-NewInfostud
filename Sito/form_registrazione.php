<?php
require_once('phpFunctions.php');
require_once('phpClasses.php');

if(isset($_POST['loginType'])) {
    $login = $_POST['loginType'];

    if(isset($_POST['invio'])) {
        $presenza_dati = FALSE;

        switch($login) {
            case "Studente":
                if((isset($_POST['nome']) && $_POST['nome'] != "") && (isset($_POST['cognome']) && $_POST['cognome'] != "") && (isset($_POST['dataNascita']) && $_POST['dataNascita'] != "") && (isset($_POST['password']) && $_POST['password'] != "")) {
                    $presenza_dati = TRUE;
                    
                    $studente = new studente (
                        $_POST['nome'], 
                        $_POST['cognome'], 
                        $_POST['password'], 
                        $_POST['dataNascita']
                    );             

                    if(!inserisciStudente($studente))
                        header('Location: avvisoErrore.html');
                    else {
                        setcookie('matricola', $studente->matricola);
                        header('Location: avvisoOK.php');
                    }
                }
                break;

            case "Docente":
                if((isset($_POST['nome']) && $_POST['nome'] != "") && (isset($_POST['cognome']) && $_POST['cognome'] != "") && (isset($_POST['materia']) && $_POST['materia'] != "Seleziona materia...") && (isset($_POST['password']) && $_POST['password'] != "")) {
                    $presenza_dati = TRUE;

                    $idCorso = cercaCorso($_POST['materia']);

                    $docente = new docente (
                        $_POST['nome'],
                        $_POST['cognome'],
                        $_POST['password'],
                        $idCorso
                    );

                    if(!inserisciDocente($docente))
                        header('Location: avvisoErrore.html');
                    else {
                        setcookie('matricola', $docente->matricola);
                        header('Location: avvisoOK.php');
                    }
                }
                break;

            case "Segretario":
                if((isset($_POST['username']) && $_POST['username'] != "") && (isset($_POST['password']) && $_POST['password'] != "")) {
                    $presenza_dati = TRUE;

                    $segretario = new segretario (
                        $_POST['username'],
                        $_POST['password']
                    );

                    if(!inserisciSegretario($segretario))
                        header('Location: avvisoErrore.html');
                    else
                        header('Location: avvisoOK.php');
                }
                break;

            case "Amministratore":
                if((isset($_POST['username']) && $_POST['username'] != "") && (isset($_POST['password']) && $_POST['password'] != "")) {
                    $presenza_dati = TRUE;

                    $amministratore = new amministratore (
                        $_POST['username'],
                        $_POST['password']
                    );

                    if(!inserisciAmministratore($amministratore))
                        header('Location: avvisoErrore.html');
                    else
                        header('Location: avvisoOK.php');
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileLogin.css">
    <title>Registrazione - Infostud</title>
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
            <h2 class="title">Registrazione <?php echo $login; ?></h2>
            <?php
            if($login == "Studente") {?>
            <div class="boxReg">
            <form action="form_registrazione.php" method="POST">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                        <h3>Cognome: </h3>
                        <h3>Data di nascita: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\" value=\"{$_POST['nome']}\">";
                    elseif(!isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\">";
                    
                    if(isset($_POST['cognome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"cognome\" value=\"{$_POST['cognome']}\">";
                    elseif(!isset($_POST['cognome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"cognome\">";
                    
                    if(isset($_POST['dataNascita']))
                        echo "<input class=\"textField\" type=\"date\" name=\"dataNascita\" value=\"{$_POST['dataNascita']}\">";
                    elseif(!isset($_POST['dataNascita']))
                        echo "<input class=\"textField\" type=\"date\" name=\"dataNascita\">";
                    ?>
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                    <input name="loginType" type="hidden" value="Studente">
                </div>
            </form>
            </div>
            <?php
            }
            elseif($login == "Docente") {?>
            <div class="boxReg">
            <form action="form_registrazione.php" method="POST">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Nome: </h3>
                        <h3>Cognome: </h3>
                        <h3>Materia: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\" value=\"{$_POST['nome']}\">";
                    elseif(!isset($_POST['nome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"nome\">";
                    
                    if(isset($_POST['cognome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"cognome\" value=\"{$_POST['cognome']}\">";
                    elseif(!isset($_POST['cognome']))
                        echo "<input class=\"textField\" type=\"text\" name=\"cognome\">";
                    ?>
                        <div class="materie">
                            <select class="materie" name="materia">
                                <?php
                                if(isset($_POST['materia']) && $_POST['materia'] != "seleziona")
                                    echo "<option value=\"{$_POST['materia']}\">{$_POST['materia']}</option>";
                                elseif(!isset($_POST['materia']))
                                    echo "<option value=\"seleziona\">Seleziona materia...</option>";
                                
                                $materie = [];
                                $materie = getCorsi();
                                foreach($materie as $materia) {
                                    echo "<option value=\"{$materia->nome}\">{$materia->nome}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                    <input name="loginType" type="hidden" value="Docente">
                </div>
            </form>
            </div>
            <?php
            }
            elseif($login == "Segretario") {?>
            <div class="boxReg">
            <form action="form_registrazione.php" method="POST">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Username: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['username']))
                        echo "<input class=\"textField\" type=\"text\" name=\"username\" value=\"{$_POST['username']}\">";
                    elseif(!isset($_POST['username']))
                        echo "<input class=\"textField\" type=\"text\" name=\"username\">";
                    ?>
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                    <input name="loginType" type="hidden" value="Segretario">
                </div>
            </form>
            </div>
            <?php
            }
            elseif($login == "Amministratore") {?>
            <div class="boxReg">
            <form action="form_registrazione.php" method="POST">
                <div class="regContainer">
                    <div class="labels">
                        <h3>Username: </h3>
                        <h3>Password: </h3>
                    </div>
                    <div class="inputs">
                    <?php
                    if(isset($_POST['username']))
                        echo "<input class=\"textField\" type=\"text\" name=\"username\" value=\"{$_POST['username']}\">";
                    elseif(!isset($_POST['username']))
                        echo "<input class=\"textField\" type=\"text\" name=\"username\">";
                    ?>
                        <input class="textField" type="password" name="password">
                    </div>
                </div>
                <div style="padding-top: 1%; margin-left: 30%;">
                    <input class="bottoni" type="submit" name="invio" value="INVIO">
                    <input name="loginType" type="hidden" value="Amministratore">
                </div>
            </form>
            </div>
            <?php
            }
            if(isset($_POST['invio']) && !$presenza_dati) { // Manca qualche dato
                echo '
                    <div class="box4">
                        <h2 class="error">DATI MANCANTI! Riprovare.</h2>
                    </div>';
                if(isset($_POST['materia']))
                    echo "<h3>{$_POST['materia']}</h3>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>