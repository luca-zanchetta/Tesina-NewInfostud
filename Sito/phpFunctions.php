<?php
/*======================================================*/
/*======================classi php======================*/
/*======================================================*/
class corso {
    public $id;
    public $nome;
    public $descrizione;
    public $matricola_prof;
    public $colore;
    public $anno;
    public $semestre;
    public $curriculum;
    public $cfu;
    public $ssd;
    public $id_corso_laurea;
}
class utente {
    public $matricola;
    public $nome;
    public $cognome;
    public $password;
}
class appello{
    public $codice;
    public $data_appello;
    public $data_scadenza;
    public $id_corso;
}
class corsoDiLaurea {
    public $id;
    public $nome;
}
class docente {
    public $matricola;
    public $nome;
    public $cognome;
    public $password;
    public $id_corso;
}
/*======================================================*/
/*=====================Funzioni php=====================*/
/*======================================================*/
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
function getCorsi(){
     /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaCorsi = [];

    for ($i=0; $i<$records->length; $i++) {
        $corso = new corso();
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $corso->id = $con->textContent;
        $con = $con->nextSibling;
        $corso->nome = $con->textContent;
        $con = $con->nextSibling;
        $corso->descrizione = $con->textContent;
        $con = $con->nextSibling;
        $corso->matricola_prof = $con->textContent;
        $con = $con->nextSibling;
        $corso->colore = $con->textContent;
        $con = $con->nextSibling;
        $corso->anno = $con->textContent;
        $con = $con->nextSibling;
        $corso->semstre = $con->textContent;
        $con = $con->nextSibling;
        $corso->curriculum = $con->textContent;
        $con = $con->nextSibling;
        $corso->cfu = $con->textContent;
        $con = $con->nextSibling;
        $corso->ssd = $con->textContent;
        $con = $con->nextSibling;
        $corso->id_corso_laurea = $con->textContent;

        $listaCorsi[] = $corso;
    }
    return $listaCorsi;

}
function getCorsoById($_id){
    /*accedo al file xml*/
    $xmlString = "";
   foreach ( file("../Xml/corsi.xml") as $node ) {
       $xmlString .= trim($node);
   }
   
   // Creazione del documento
   $doc = new DOMDocument();
   $doc->loadXML($xmlString);
   $records = $doc->documentElement->childNodes;

   for ($i=0; $i<$records->length; $i++) {
       $corso = new corso();
       $record = $records->item($i);

       $con = $record->firstChild;
       $id = $con->textContent;
       if($id != $_id) continue; 

       $corso->id = $id;
       $con = $con->nextSibling;
       $corso->nome = $con->textContent;
       $con = $con->nextSibling;
       $corso->descrizione = $con->textContent;
       $con = $con->nextSibling;
       $corso->info_prof = $con->textContent;
       $con = $con->nextSibling;
       $corso->id_colore = $con->textContent;
       $con = $con->nextSibling;
       $corso->anno = $con->textContent;
       $con = $con->nextSibling;
       $corso->semestre = $con->textContent;
       $con = $con->nextSibling;
       $corso->curriculum = $con->textContent;
       $con = $con->nextSibling;
       $corso->cfu = $con->textContent;
       $con = $con->nextSibling;
       $corso->ssd = $con->textContent;
       
       return $corso;
   }
   return null;  
}
function getCorsiLike($_nome){
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaCorsi = [];

    for ($i=0; $i<$records->length; $i++) {
        $corso = new corso();
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $corso->id = $con->textContent;
        $con = $con->nextSibling;
        $corso->nome = $con->textContent;
        $con = $con->nextSibling;
        $corso->descrizione = $con->textContent;
        $con = $con->nextSibling;
        $corso->matricola_prof = $con->textContent;
        $con = $con->nextSibling;
        $corso->colore = $con->textContent;
        $con = $con->nextSibling;
        $corso->anno = $con->textContent;
        $con = $con->nextSibling;
        $corso->semstre = $con->textContent;
        $con = $con->nextSibling;
        $corso->curriculum = $con->textContent;
        $con = $con->nextSibling;
        $corso->cfu = $con->textContent;
        $con = $con->nextSibling;
        $corso->ssd = $con->textContent;
        $con = $con->nextSibling;
        $corso->id_corso_laurea = $con->textContent;
        
        /*controllo sul nome*/
        if(preg_match("#^{$_nome}#i", $corso->nome)) $listaCorsi[] = $corso;
    }
    return $listaCorsi;
}

/*
function existsUser($_username,$_password){
    $xmlString = "";
    foreach ( file("Xml/utenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        $user = new utente();
        $con = $record->firstChild;
        $user->matricola = $con->textContent;
        $con = $con->nextSibling;
        $user->nome = $con->textContent;  
        $con = $con->nextSibling;
        $user->cognome = $con->textContent;
        $con = $con->nextSibling;
        $user->password = $con->textContent;

        if($user->matricola == $_username && $user->password == $_password) {
            return true;
        }
    }

    return false;
}

function getUserByUsername($_username) {
    $xmlString = "";
    foreach ( file("Xml/utenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        $user = new utente();
        $con = $record->firstChild;
        $user->matricola = $con->textContent;
        $con = $con->nextSibling;
        $user->nome = $con->textContent;  
        $con = $con->nextSibling;
        $user->cognome = $con->textContent;
        $con = $con->nextSibling;
        $user->password = $con->textContent;
        
        if(!strcmp($user->matricola, $_username))
            return $user;
    }
    return null;
}*/         /* Il file utenti.xml non è previsto */

function getNomeCorso($num) {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    if($records->length > 0) { /* C'è almeno un corso */
        for ($i=0; $i<$records->length; $i++) {
            $record = $records->item($i); // i-esimo corso

            $idElement = $record->firstChild;   // Id
            $id = $idElement->textContent;
            if($id == $num) {
                $nomeCorsoElement = $idElement->nextSibling;    // Nome corso
                $nomeCorso = $nomeCorsoElement->textContent;
            }
        }
    }
    else $nomeCorso = "ERRORE";

    return $nomeCorso;
}


function getColoreCorso($num) {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    if($records->length > 0) { /* C'è almeno un corso */
        for ($i=0; $i<$records->length; $i++) {
            $record = $records->item($i); // i-esimo corso

            $idElement = $record->firstChild;   // Id
            $id = $idElement->textContent;
            if($id == $num) {
                $nomeCorsoElement = $idElement->nextSibling;
                $descrizioneElement = $nomeCorsoElement->nextSibling;
                $infoProfElement = $descrizioneElement->nextSibling;

                $coloreCorsoElement = $infoProfElement->nextSibling;
                $coloreCorso = $coloreCorsoElement->textContent;
            }
        }
    }
    else $coloreCorso = "white";

    return $coloreCorso;
}

function cercaCorso($nomeCorsoDaCercare) {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    if($records->length > 0) {
        for ($i=0; $i<$records->length; $i++) {
            $record = $records->item($i);

            $idElement = $record->firstChild;
            $id = $idElement->textContent;
            $nomeElement = $idElement->nextSibling;
            $nome = $nomeElement->textContent;

            if($nome == $nomeCorsoDaCercare) {
                return $id;
            }
        }
    }

    return 0;
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

function inserisciCorso($nuovoCorso) {
       
    $xml = simplexml_load_file('../Xml/corsi.xml');

    $newcorso = $xml->addChild('corso'); //crea una tupla<corso> </corso>
    $asd = $newcorso->addChild('id', $nuovoCorso->id);
    $asd = $newcorso->addChild('nome', $nuovoCorso->nome);
    $asd = $newcorso->addChild('descrizione', $nuovoCorso->descrizione);
    $asd = $newcorso->addChild('info_prof', $nuovoCorso->info_prof);
    $asd = $newcorso->addChild('id_colore', $nuovoCorso->id_colore);
    $asd = $newcorso->addChild('anno', $nuovoCorso->anno);
    $asd = $newcorso->addChild('semestre', $nuovoCorso->semestre);
    $asd = $newcorso->addChild('curriculum', $nuovoCorso->curriculum);
    $asd = $newcorso->addChild('cfu', $nuovoCorso->cfu);
    $asd = $newcorso->addChild('ssd', $nuovoCorso->ssd);
    
    //sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsi.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);
    if(!$result) return FALSE;
    else
        return TRUE;
    
}

/*
function getColori() {
    $xmlString = "";
    foreach ( file("Xml/colori.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    $listaColori = [];
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $colore = $con->textContent;

        $listaColori[] = $colore;
    }

    return $listaColori;    
}*/     /* Il file colori.xml non è previsto */

function inserisciAppello($nuovoAppello) {
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $codice = $con->textContent;

        if($codice == $nuovoAppello->codice) return false;
    }

    //il codice inserito non è duplicato

    $xml = simplexml_load_file('../Xml/appelli.xml');

    $newcorso = $xml->addChild('appello'); //crea una tupla<corso> </corso>
    $asd = $newcorso->addChild('codice', $nuovoAppello->codice);
    $asd = $newcorso->addChild('data_appello', $nuovoAppello->data_appello);
    $asd = $newcorso->addChild('data_scadenza', $nuovoAppello->data_scadenza);
    $asd = $newcorso->addChild('id_corso', $nuovoAppello->id_corso);

    //sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/appelli.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);
    if(!$result) return FALSE;
    else
        return TRUE;
}
function eliminaAppello($codice){
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $nodeToRemove = null;
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->getElementsByTagName("appello");
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);

        $con = $record->firstChild;
        $_codice = $con->textContent;

        if($codice == $_codice)
            $nodeToRemove=$record;
    }

    //Now remove it.
    if ($nodeToRemove->parentNode->removeChild($nodeToRemove) == null) return false;
    
    echo $doc->save("../Xml/appelli.xml"); 
    return true;
}
function eliminaAppelliCorso($id_corso){
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->getElementsByTagName("appello");
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);

        $con = $record->firstChild;
        $_codice = $con->textContent;
        $con = $con->nextSibling;
        $con = $con->nextSibling;
        $con = $con->nextSibling;
        $idCorso= $con->textContent;

        if($id_corso == $idCorso)
            $record->parentNode->removeChild($record);
    }

    echo $doc->save("../Xml/appelli.xml"); 
    return true;
}

function eliminaCorso($_id) {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->getElementsByTagName("corso");
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);

        $con = $record->firstChild;
        $id = $con->textContent;

        if($id == $_id){
            $record->parentNode->removeChild($record);
            break;
        }
            
    }

    echo $doc->save("../Xml/corsi.xml"); 
    return true;
}

function getCorsiDiLaurea() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsoDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaCorsiDiLaurea = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea();
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $corsoDiLaurea->id = $con->textContent;
        $con = $con->nextSibling;
        $corsoDiLaurea->nome = $con->textContent;
             
        $listaCorsiDiLaurea[] = $corsoDiLaurea;
    }
    return $listaCorsiDiLaurea;
}

function getCorsiDiLaureaLike($_nome) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsoDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaCorsiDiLaurea = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea();
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $corsoDiLaurea->id = $con->textContent;
        $con = $con->nextSibling;
        $corsoDiLaurea->nome = $con->textContent;
             
        /*controllo sul nome*/
        if(preg_match("#^{$_nome}#i", $corsoDiLaurea->nome))
            $listaCorsiDiLaurea[] = $corsoDiLaurea;
    }
    return $listaCorsiDiLaurea;
}

function getNomeCorsoDiLaureaByID($_id) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsoDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea();
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $corsoDiLaurea->id = $con->textContent;
        $con = $con->nextSibling;
        $corsoDiLaurea->nome = $con->textContent;
        if($corsoDiLaurea->id == $_id)
            return $corsoDiLaurea->nome;
    }
    return NULL;
}

function getDocenti() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaDocenti = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $docente = new docente();
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $docente->matricola = $con->textContent;
        $con = $con->nextSibling;
        $docente->nome = $con->textContent;
        $con = $con->nextSibling;
        $docente->cognome = $con->textContent;
        $con = $con->nextSibling;
        $docente->password = $con->textContent;
        $con = $con->nextSibling;
        $docente->id_corso = $con->textContent;
             
        $listaDocenti[] = $docente;
    }
    return $listaDocenti;
}

function getDocentiLike($_nome) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaDocenti = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $docente = new docente();
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $docente->matricola = $con->textContent;
        $con = $con->nextSibling;
        $docente->nome = $con->textContent;
        $con = $con->nextSibling;
        $docente->cognome = $con->textContent;
        $con = $con->nextSibling;
        $docente->password = $con->textContent;
        $con = $con->nextSibling;
        $docente->id_corso = $con->textContent;
        
        /*controllo sul nome*/
        if(preg_match("#^{$_nome}#i", ($docente->cognome." ".$docente->nome)))
            $listaDocenti[] = $docente;
    }
    return $listaDocenti;
    
}
?>