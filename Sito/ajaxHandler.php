<?php
//implenentazione del pattern Post/Redirect/Get per 
//l'inserimento di una nuova faq
require_once('phpFunctions.php');
session_start();

if(!isset($_POST['richiesta'])) header('Location: homepage.php');

switch ($_POST['richiesta']) {
    case 'modificaFaq':
        # Richiesta proveniente da visualizzaFaq.php
        # Otteniamo i parametri 
        $newText = $_POST['newText'];
        $id = $_POST['id'];

        modificaFaq($id,$newText);
        echo $newText;
        break;       
    case 'modificaVotoPost': 
        $vote = $_POST['newVote'];
        $idCommento = $_POST['id'];
        $idAutore = $_POST['autore'];
        //sicuramente utenza è ti tipo studente

        echo deleteCommentVote($idCommento,  $_SESSION['matricola']);
        echo insertCommentVote($idCommento,  $_SESSION['matricola'], $vote,$idAutore);
        break;

    case 'modificaContenutoPost': 
        $text = $_POST['newText'];
        $idCommento = $_POST['id'];
        //sicuramente utenza è ti tipo studente

        echo modifyContentText($idCommento,$text);
        break;
    default:
        # code...
        break;
}

?>