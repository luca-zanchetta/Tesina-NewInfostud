<?php
require_once('phpClasses.php');
require_once('phpFunctions-get.php');
require_once('phpFunctions-misc.php');


/* ================================= 
======== Modify functions ==========
==================================== */

function assegnaCorso($id_corso, $matricola_docente, $matricola_codocente) {
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $corsi = simplexml_load_file('../Xml/corsi.xml');

    foreach($corsi as $corso) {
        if($corso->id == $id_corso) {
            $corso->matricolaDocente = $matricola_docente;
            $corso->matricolaCoDocente = $matricola_codocente;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsi.xml', "w");
    $result = fwrite($f,  $corsi->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function modificaEsitoPrenotazione($idPrenotazione, $nuovoEsito) {
    if($idPrenotazione == 0)
        return FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $prenotazioni = simplexml_load_file('../Xml/prenotazione.xml');

    foreach($prenotazioni as $prenotazione) {
        if($prenotazione->id == $idPrenotazione)
            $prenotazione->esito = $nuovoEsito;
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/prenotazione.xml', "w");
    $result = fwrite($f,  $prenotazioni->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else{
        $prenotazione = getPrenotazioneFromId($idPrenotazione);
        $studente = getStudenteFromMatricola($prenotazione->matricolaStudente);
        if(calcolaMedia_CFU($studente))
            return TRUE;
    }
}


function calcolaMedia_CFU($studente) {
    if(!$studente)
        return FALSE;
    
    $esamiSuperati = getVerbalizzazioniPositive($studente);

    $numeroEsamiSuperati = sizeof($esamiSuperati);
    $cfuTot = 0;
    $sommaVoti = 0;
    $media = 0.0;

    // Calcolo dei cfu e della media

    foreach($esamiSuperati as $esameSuperato) {
        $appello = getAppelloFromId($esameSuperato->idAppello);
        $corso = getCorsoById($appello->idCorso);
        
        $cfuTot += $corso->cfu;
        $sommaVoti += intval($esameSuperato->esito);
    }
    
    if($numeroEsamiSuperati == 0) {
        $cfuTot = 0;
        $media = 0.0;
    }
    else {
        $media = $sommaVoti/$numeroEsamiSuperati;
        round($media, 2);   # La media ha due cifre significative
    }   


    // Modifica dei dati dello studente


    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/studenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $studenti = simplexml_load_file('../Xml/studenti.xml');

    foreach($studenti as $stud) {
        if($stud->matricola == $studente->matricola) {
            $stud->cfuTotale = $cfuTot;
            $stud->media = $media;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/studenti.xml', "w");
    $result = fwrite($f,  $studenti->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function modificaAppello($idAppello, $nuovaData, $nuovaOra, $nuovoCorso) {
    if($idAppello == 0)
        return FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $appelli = simplexml_load_file('../Xml/appelli.xml');

    foreach($appelli as $appello) {
        if($appello->id == $idAppello) {
            $appello->dataOra = $nuovaData." ".$nuovaOra;
            $appello->idCorso = $nuovoCorso;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/appelli.xml', "w");
    $result = fwrite($f,  $appelli->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else{
        return TRUE;
    }
}


function modificaFaq($id, $newText) {
    $xmlString = "";
    foreach ( file("../Xml/faqs.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $faqs = simplexml_load_file('../Xml/faqs.xml');

    foreach($faqs as $faq)
        if($faq->id == $id)
            $faq->risposta = $newText;

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/faqs.xml', "w");
    $result = fwrite($f,  $faqs->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function modifyFaqVote($matricola,$idFaq,$voto){
    $xmlString = "";
    foreach ( file("../Xml/votoFAQ.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    $voti = simplexml_load_file('../Xml/votoFAQ.xml');

    foreach($voti as $voto){
        if($voto->idFAQ == $idFaq && $voto->matricolaStudente == $matricola)
            $voto->utilita = (string)$voto;
    }
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/votoFAQ.xml', "w");
    $result = fwrite($f,  $voti->asXML());
    fclose($f);

    updateFaqUtility($idFaq);

    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function updateFaqUtility($idFaq) {
    #aggiorniamo il campo utilitaTotale della faq passata
    $xmlString = "";
    foreach ( file("../Xml/votoFAQ.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    $utilitaTot = 0;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $tmp = $con->textContent;
        $con = $con->nextSibling;
        $tmp = $con->textContent;
        $con = $con->nextSibling;
        $tmp = $con->textContent;
        if($tmp != $idFaq) continue;
        $con = $con->nextSibling;
        $stato = $con->textContent;
        if(!$stato) continue;
        $con = $con->nextSibling;
        $utilita = $con->textContent;
        $utilitaTot+=(int)$utilita;
    }

    #modifico la FAQ
    $xmlString = "";
    foreach ( file("../Xml/faqs.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $faqs = simplexml_load_file('../Xml/faqs.xml');

    foreach($faqs as $faq){
        if($faq->id == $idFaq)
            $faq->utilitaTotale = $utilitaTot;
    }
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/faqs.xml', "w");
    $result = fwrite($f,  $faqs->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function modifyContentText($id, $newText) {
    $xmlString = "";
    foreach ( file("../Xml/commenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $commenti = simplexml_load_file('../Xml/commenti.xml');

    foreach($commenti as $comm)
        if($comm->id == $id)
            $comm->corpo = $newText;

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/commenti.xml', "w");
    $result = fwrite($f,  $commenti->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}

function modifyPostContent($id, $newText) {
    $xmlString = "";
    foreach ( file("../Xml/posts.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $posts = simplexml_load_file('../Xml/posts.xml');

    foreach($posts as $post)
        if($post->id == $id)
            $post->corpo = $newText;

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/posts.xml', "w");
    $result = fwrite($f,  $posts->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    else
        return TRUE;
}

function updateCommentAccordo($idCommento){
    $xmlString = "";
    foreach ( file("../Xml/votoCommento.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    $accordoTot = 0;
    $numVoti = 0;

    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $tmp = $con->textContent; #id
        $con = $con->nextSibling;
        $tmp = $con->textContent; #matricola studente
        $con = $con->nextSibling;
        $tmp = $con->textContent; #idCommento
        if($tmp != $idCommento) continue;
        $con = $con->nextSibling;
        $accordo = $con->textContent; #accordo
        $con = $con->nextSibling;
        $tmp = $con->textContent; #idAutoreCommento
        $con = $con->nextSibling;
        $stato = $con->textContent; #stato
        if(!$stato) continue;
        
        $accordoTot+=(int)$accordo;
        $numVoti++;
    }

    $media =  $numVoti > 0 ? $accordoTot/$numVoti : 0;
    #modifico la FAQ
    $xmlString = "";
    foreach ( file("../Xml/commenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $commenti = simplexml_load_file('../Xml/commenti.xml');

    foreach($commenti as $commento){
        if($commento->id == $idCommento)
            $commento->accordoMedio = bcdiv($media, 1, 2);
    }
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/commenti.xml', "w");
    $result = fwrite($f,  $commenti->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function modificaCorsoDiLaurea($idCorsoDiLaurea, $nome) {
    if($idCorsoDiLaurea == 0)
        return FALSE;

    $modificato = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $corsiDiLaurea = simplexml_load_file('../Xml/corsiDiLaurea.xml');

    foreach($corsiDiLaurea as $corsoDiLaurea) {
        if($corsoDiLaurea->id == $idCorsoDiLaurea && !verificaPresenzaCorsoDiLaurea($nome)) {
            $corsoDiLaurea->nome = $nome;
            $modificato = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsiDiLaurea.xml', "w");
    $result = fwrite($f,  $corsiDiLaurea->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificato)
        return TRUE;
}


function modificaCorso($idCorso, $nome, $descrizione, $matricolaDocente, $matricolaCodocente, $anno, $semestre, $curriculum, $cfu, $ssd, $idCorsoLaurea) {
    if($idCorso == 0)
        return FALSE;

    $modificato = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $corsi = simplexml_load_file('../Xml/corsi.xml');

    foreach($corsi as $corso) {
        if($corso->id == $idCorso) {
            $corso->nome = $nome;
            $corso->descrizione = $descrizione;
            $corso->matricolaDocente = $matricolaDocente;
            $corso->matricolaCoDocente = $matricolaCodocente;
            $corso->anno = $anno;
            $corso->semestre = $semestre;
            $corso->curriculum = $curriculum;
            $corso->cfu = $cfu;
            $corso->ssd = $ssd;
            $corso->idCorsoLaurea = $idCorsoLaurea;

            $modificato = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsi.xml', "w");
    $result = fwrite($f,  $corsi->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificato)
        return TRUE;
}


function modificaPasswordStudente($matricola, $nuovaPassword) {
    if($matricola == 0 || $nuovaPassword == "")
        return FALSE;

    $modificata = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/studenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $studenti = simplexml_load_file('../Xml/studenti.xml');

    foreach($studenti as $studente) {
        if($studente->matricola == $matricola && $studente->stato != 0) {
            $studente->password = $nuovaPassword;
            $modificata = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/studenti.xml', "w");
    $result = fwrite($f,  $studenti->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificata)
        return TRUE;
}


function modificaPasswordDocente($matricola, $nuovaPassword) {
    if($matricola == 0 || $nuovaPassword == "")
        return FALSE;

    $modificata = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $docenti = simplexml_load_file('../Xml/docenti.xml');

    foreach($docenti as $docente) {
        if($docente->matricola == $matricola && $docente->stato != 0) {
            $docente->password = $nuovaPassword;
            $modificata = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/docenti.xml', "w");
    $result = fwrite($f,  $docenti->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificata)
        return TRUE;
}


function modificaPasswordSegretario($username, $nuovaPassword) {
    if($username == 0 || $nuovaPassword == "")
        return FALSE;

    $modificata = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/segreteria.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $segretari = simplexml_load_file('../Xml/segreteria.xml');

    foreach($segretari as $segretario) {
        if($segretario->username == $username && $segretario->stato != 0) {
            $segretario->password = $nuovaPassword;
            $modificata = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/segreteria.xml', "w");
    $result = fwrite($f,  $segretari->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificata)
        return TRUE;
}


function modificaPasswordAmministratore($username, $nuovaPassword) {
    if($username == 0 || $nuovaPassword == "")
        return FALSE;

    $modificata = FALSE;

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/amministrazione.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $amministratori = simplexml_load_file('../Xml/amministrazione.xml');

    foreach($amministratori as $amministratore) {
        if($amministratore->username == $username && $amministratore->stato != 0) {
            $amministratore->password = $nuovaPassword;
            $modificata = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/amministrazione.xml', "w");
    $result = fwrite($f,  $amministratori->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $modificata)
        return TRUE;
}
?>