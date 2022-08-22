<?php
//implenentazione del pattern Post/Redirect/Get per 
//l'eliminazione di una nuova faq
require_once('phpFunctions.php');
session_start();
if(!isset($_SESSION['loginType']))
    header('Location: homepage.php');

if(isset($_POST['idFaq'])){
    deleteFaq($_POST['idFaq']);
    echo "congo";
    header("Location: homepage-users-visualizzaFaq.php?idCorso=".$_POST['idCorso']);
}

?>