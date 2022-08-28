<?php
require_once('phpFunctions-get.php');


function generaMatricola($tipoUtenza) {
    $file = "";

    if($tipoUtenza == "Studente")
        $file = '../Xml/studenti.xml';
    elseif($tipoUtenza == "Docente")
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
        $ultimaMatricola = $con->textContent;
    }

    return (intval($ultimaMatricola) + 1);
}


function verificaPresenzaCorsoDiLaurea($nome) {
    $listaCorsiDiLaurea = getCorsiDiLaurea();

    foreach($listaCorsiDiLaurea as $corso)
        if(strtolower($corso->nome) == strtolower($nome))
            return TRUE;
    
    return FALSE;
}


function verificaPresenzaCorso($corso) {
    $listaCorsi = getCorsiFromCorsoDiLaurea($corso->idCorsoLaurea);

    foreach($listaCorsi as $c)
        if($c->nome == $corso->nome)
            return TRUE;
    
    return FALSE;
}


function verificaPresenzaAppello($appello) {
    $listaAppelli = getAppelliFromCorso($appello->idCorso);
    $dataAppello = getDataFromDataora($appello->dataOra);

    foreach($listaAppelli as $app) {
        $dataApp = getDataFromDataora($app->dataOra);
        if($dataAppello == $dataApp)
            return TRUE;
    }

    return FALSE;
}


function verificaPresenzaStudente($studente) {
    if($studente == NULL)
        return FALSE;

    $studenti = getStudenti();
    foreach($studenti as $stud)
        if($stud->nome == $studente->nome && $stud->cognome == $studente->cognome)
            return TRUE;
    
    return FALSE;
}


function verificaPresenzaDocente($docente) {
    if($docente == NULL)
        return FALSE;

    $docenti = getDocenti();
    foreach($docenti as $doc)
        if($doc->nome == $docente->nome && $doc->cognome == $docente->cognome)
            return TRUE;
    
    return FALSE;
}


function verificaPresenzaSegretario($segretario) {
    if($segretario == NULL)
        return FALSE;

    $segretari = getSegretari();
    foreach($segretari as $seg)
        if($seg->username == $segretario->username)
            return TRUE;
    
    return FALSE;
}


function verificaPresenzaAmministratore($admin) {
    if($admin == NULL)
        return FALSE;

    $admins = getAmministratori();
    foreach($admins as $amm)
        if($amm->username == $admin->username)
            return TRUE;
    
    return FALSE;
}


function nextFaqid(){
    $xmlString = "";
    foreach ( file("../Xml/faqs.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaId = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }
    $id = 1;

    while(in_array($id,$listaId)){
        $id++;
    }
    
    return $id;
}

function nextFaqVoteId(){
    $xmlString = "";
    foreach ( file("../Xml/votoFAQ.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaId = [];
     
    for ($i=0; $i<$records->length; $i++) { 
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }
    $id = 1;

    while(in_array($id,$listaId)){
        $id++;
    }
    
    return $id;
}

function  nextPostId() {
    $xmlString = "";
    foreach ( file("../Xml/posts.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaId = [];
     
    for ($i=0; $i<$records->length; $i++) { 
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }
    $id = 1;

    while(in_array($id,$listaId)){
        $id++;
    }
    
    return $id;
}
function  nextCommentVoteId() {
    $xmlString = "";
    foreach ( file("../Xml/votoCommento.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaId = [];
     
    for ($i=0; $i<$records->length; $i++) { 
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }
    $id = 1;

    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}

function nextCommentId() {
    $xmlString = "";
    foreach ( file("../Xml/commenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaId = [];
     
    for ($i=0; $i<$records->length; $i++) { 
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }
    $id = 1;

    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}

function calcolaIdCorso() {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaId = [];
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }

    $id=1;
    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}


function calcolaIdCorsoDiLaurea() {
    $xmlString = "";
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaId = [];
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }

    $id=1;
    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}


function calcolaIdAppello() {
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaId = [];
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }

    $id=1;
    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}


function calcolaIdPrenotazione() {
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaId = [];
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $listaId[] = $con->textContent;
    }

    $id=1;
    while(in_array($id,$listaId)){
        $id++;
    }

    return $id;
}


function verificaAppelloPrenotato($studente, $appello) {
    $appelliPrenotati = getAppelliPrenotati($studente);

    if(!$appelliPrenotati)
        return FALSE;
    
    foreach($appelliPrenotati as $appelloPrenotato)
        if($appello->id == $appelloPrenotato->id)
            return TRUE;
    
    return FALSE;
}

function verificaEsameSostenuto($studente, $idCorso) {
    $esamiSuperati = getEsamiSuperati($studente);

    if(!$esamiSuperati)
        return FALSE;
    
    foreach($esamiSuperati as $esameSuperato)
        if($esameSuperato->id == $idCorso)
            return TRUE;
    
    return FALSE;
}
?>