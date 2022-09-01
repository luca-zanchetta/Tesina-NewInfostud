<?php
//implenentazione del pattern Post/Redirect/Get per 
//l'eliminazione di una nuova faq
session_start();
require_once('phpFunctions-insert.php');
require_once('phpFunctions-delete.php');
#require_once('phpFunctions-modify.php');
require_once('phpClasses.php');


if(!isset($_SESSION['loginType']))
    header('Location: homepage.php');


if(isset($_POST['votaPost'])){
    #siamo sicuri che l'utenza sia di tipo Studente
    if(($_POST['voto'] == $_POST['tipoVoto'])){
        #il voto va rimosso
        echo $_POST['tipoVoto'];
        deletePostVote($_SESSION['matricola'],$_POST['idPost']);
        echo "caso 1 voto = type";

    }elseif($_POST['voto'] == 0){
        echo $_POST['tipoVoto'];
        insertPostVote($_POST['idPost'],$_POST['tipoVoto'],$_SESSION['matricola']);
        echo "caso 2 voto = 0";
    }else{
        echo $_POST['tipoVoto'];
        deletePostVote($_SESSION['matricola'],$_POST['idPost']);
        insertPostVote($_POST['idPost'],$_POST['tipoVoto'],$_SESSION['matricola']);
        #modifyFaqVote($_SESSION['matricola'],$_POST['idFaq'],$_POST['type']);
        echo "caso 3 voto != type";
    }

    calcolaReputazioneStudente($_POST['autorePost']);
    //header("Location: homepage-users-visualizzaPost.php?idPost={$_POST['idPost']}&idCorso={$_POST['idCorso']}&pageNum={$_POST['pageNum']}");
}
?>