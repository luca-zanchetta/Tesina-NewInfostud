<?php
require_once('../Sito/phpFunctions-get.php');
require_once('../Sito/phpFunctions-insert.php');
require_once('../Sito/phpFunctions-misc.php');

/* ================================= 
========= Login functions ==========
==================================== */

function verificaPresenzaMatricola($matricola, $loginType) {
    $file = "";

    if($loginType == "Studente")
        $file = '../Xml/studenti.xml';
    elseif($loginType == "Docente")
        $file = '../Xml/docenti.xml';
    else
        return 0;   /* ERRORE */

    
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file($file) as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $matr = $con->textContent;
        
        if($matr == $matricola) return TRUE;
    }

    return FALSE;
}

function verificaPresenzaUsername($username, $loginType) {
    $file = "";

    if($loginType == "Segretario")
        $file = '../Xml/segreteria.xml';
    elseif($loginType == "Amministratore")
        $file = '../Xml/amministrazione.xml';
    else
        return 0;   /* ERRORE */

    
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file($file) as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $uname = $con->textContent;
        
        if($uname == $username) return TRUE;
    }

    return FALSE;
}

function verificaPasswordStudentiDocenti($password, $loginType) {
    $file = "";

    if($loginType == "Studente")
        $file = '../Xml/studenti.xml';
    elseif($loginType == "Docente")
        $file = '../Xml/docenti.xml';
    else
        return 0;   /* ERRORE */
    
    
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file($file) as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $matricola = $con->textContent;
        $con = $con->nextSibling;
        $nome = $con->textContent;
        $con = $con->nextSibling;
        $cognome = $con->textContent;
        $con = $con->nextSibling;
        $pwd = $con->textContent;
        
        if($pwd == $password) return TRUE;
    }

    return FALSE;
}

function verificaPasswordSegretarioAmministratore($password, $loginType) {
    $file = "";

    if($loginType == "Segretario")
        $file = '../Xml/segreteria.xml';
    elseif($loginType == "Amministratore")
        $file = '../Xml/amministrazione.xml';
    else
        return 0;   /* ERRORE */
    
    
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file($file) as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $username = $con->textContent;
        $con = $con->nextSibling;
        $pwd = $con->textContent;
        
        if($pwd == $password) return TRUE;
    }

    return FALSE;
}

?>