<?php
//implenentazione del pattern Post/Redirect/Get per 
//l'inserimento di una nuova faq
require_once('phpFunctions.php');

if(!isset($_POST['richiesta'])) header('Location: homepage.php');

switch ($_POST['richiesta']) {
    case 'modificaFaq':
        # Richiesta proveniente da visualizzaFaq.php
        # Otteniamo i parametri 
        $newText = $_POST['newText'];
        $id = $_POST['id'];

        modificaFaq($id,$newText);
        break;
    
    default:
        # code...
        break;
}

?>