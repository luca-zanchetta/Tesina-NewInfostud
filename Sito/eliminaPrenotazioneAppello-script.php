<?php
require_once('phpFunctions.php');

if(isset($_POST['annulla']) && isset($_POST['idPrenotazione']) && $_POST['idPrenotazione'] != 0) {
    if(eliminaPrenotazioneAppello($_POST['idPrenotazione']))
        header('Location: avvisoEliminazione.php');
    else
        header('Location: avvisoErrore.php');
}
?>