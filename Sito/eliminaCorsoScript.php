<?php
    require_once('phpFunctions.php');
    if(isset($_GET['corso'])){
        eliminaAppelliCorso($_GET['corso']);
        eliminaCorso($_GET['corso']);
        header("Location: avvisoEliminazione.html");
    }
?>