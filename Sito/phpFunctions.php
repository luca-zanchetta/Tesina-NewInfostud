<?php
require_once('phpClasses.php');

/* ================================= 
========== PHP FUNCTIONS ===========
==================================== */

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}


function creaSidebar($loginType) {
    switch($loginType) {

        case "Studente":
            echo '
            <div class="sidebar">
                <h5>
                    Informazioni
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza carriera</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Appelli prenotati</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Prenota appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Esami sostenuti</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">Bacheca</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">FAQ</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />
            </div>
            ';
            break;


        case "Docente":
            echo '
            <div class="sidebar">
                <h5>
                    Informazioni
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">FAQ</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />
            </div>
            ';
            break;


        case "Segretario":
            echo '
            <div class="sidebar">
                <h5>
                    Informazioni
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Gestione prenotazioni</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">Bacheca</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">FAQ</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />
            </div>
            ';
            break;


        case "Amministratore":
            echo '
            <div class="sidebar">
                <h5>
                    Informazioni
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Gestione prenotazioni</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">Bacheca</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="fittizia.php">FAQ</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />

                <h5>
                    Moderazione utenze
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza studenti</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza docenti</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="fittizia.php" style="display: flex; margin: 0px;">Visualizza segreteria</a>
                    </h5>
                </div>

                <hr style="width: 90%; margin-left: -2%;" />
            </div>
            ';
            break;
    }
}





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





/* ================================= 
========== Get functions ===========
==================================== */

function getCorsi() {
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


function getCorsoById($_id) {
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
        $docente = new docente("", "", "", 0);  # Default constructor
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
        $docente = new docente("", "", "", 0);  # Default constructor
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

    return ($ultimaMatricola + 1);
}





/* ================================= 
======== Insert functions ==========
==================================== */

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

    $newcorso = $xml->addChild('appello'); //crea una tupla <appello> </appello>
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


function inserisciStudente($studente) {
    $xmlString = "";
    foreach ( file("../Xml/studenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $xml = simplexml_load_file('../Xml/studenti.xml');

    // Crea una tupla <studente> </studente>

    $newStudente = $xml->addChild('studente');
    $tmp = $newStudente->addChild('matricola', $studente->matricola);
    $tmp = $newStudente->addChild('nome', $studente->nome);
    $tmp = $newStudente->addChild('cognome', $studente->cognome);
    $tmp = $newStudente->addChild('password', $studente->password);
    $tmp = $newStudente->addChild('dataNascita', $studente->dataNascita);
    $tmp = $newStudente->addChild('reputazioneTotale', $studente->reputazioneTotale);
    $tmp = $newStudente->addChild('cfuTotale', $studente->cfuTotale);
    $tmp = $newStudente->addChild('media', $studente->media);
    $tmp = $newStudente->addChild('idCorsoDiLaurea', $studente->idCorsoLaurea);


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/studenti.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function inserisciDocente($docente) {
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $xml = simplexml_load_file('../Xml/docenti.xml');

    // Crea una tupla <docente> </docente>

    $newDocente = $xml->addChild('docente');
    $tmp = $newDocente->addChild('matricola', $docente->matricola);
    $tmp = $newDocente->addChild('nome', $docente->nome);
    $tmp = $newDocente->addChild('cognome', $docente->cognome);
    $tmp = $newDocente->addChild('password', $docente->password);
    $tmp = $newDocente->addChild('idCorso', $docente->idCorso);


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/docenti.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}

function inserisciSegretario($segretario) {
    $xmlString = "";
    foreach ( file("../Xml/segreteria.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $username = $con->textContent;

        if($username == $segretario->username) 
            return false;   /* Lo username non può essere duplicato! */
    }


    $xml = simplexml_load_file('../Xml/segreteria.xml');

    // Crea una tupla <segretario> </segretario>

    $newSegretario = $xml->addChild('segretario');
    $tmp = $newSegretario->addChild('username', $segretario->username);
    $tmp = $newSegretario->addChild('password', $segretario->password);

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/segreteria.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function inserisciAmministratore($amministratore) {
    $xmlString = "";
    foreach ( file("../Xml/amministrazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
        
        $con = $record->firstChild;
        $username = $con->textContent;

        if($username == $amministratore->username) 
            return false;   /* Lo username non può essere duplicato! */
    }


    $xml = simplexml_load_file('../Xml/amministrazione.xml');

    // Crea una tupla <amministratore> </amministratore>

    $newAmministratore = $xml->addChild('amministratore');
    $tmp = $newAmministratore->addChild('username', $amministratore->username);
    $tmp = $newAmministratore->addChild('password', $amministratore->password);

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/amministrazione.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}




/* ================================= 
======== Delete functions ==========
==================================== */

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
?>