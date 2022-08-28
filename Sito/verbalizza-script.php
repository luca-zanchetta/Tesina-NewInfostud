<?php
require_once('phpFunctions-modify.php');


$success = FALSE;

echo "<p>DENTRO</p>";
if(isset($_POST['verbalizza']) && isset($_POST['idPrenotazioni']) && isset($_POST['esito'])) {
    echo "<p>DENTRO</p>";
    for($i = 0; $i < sizeof($_POST['idPrenotazioni']); $i++) {
        if($_POST['esito'][$i] != "NULL") {
            if(modificaEsitoPrenotazione($_POST['idPrenotazioni'][$i], $_POST['esito'][$i]))
                $success = TRUE;
            else {
                $success = FALSE;
                break;
            }
        }
    }

    if($success)
        header('Location: avvisoOK.php');
    else {
        setcookie('verb', 'ERRORE: Verbalizzazione fallita.');
        header('Location: avvisoErrore.php');
    }
}
?>