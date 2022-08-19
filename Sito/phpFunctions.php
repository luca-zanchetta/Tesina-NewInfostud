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





/* ================================= 
======== Display functions =========
==================================== */


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
                        <a class="opzionetab" href="homepage-users.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="homepage-users-Carriera.php" style="display: flex; margin: 0px;">Visualizza carriera</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="homepage-users-appelliPrenotati.php" style="display: flex; margin: 0px;">Appelli prenotati</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="homepage-users-prenotaAppello.php" style="display: flex; margin: 0px;">Prenota appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="homepage-users-esamiSostenuti.php" style="display: flex; margin: 0px;">Esami sostenuti</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-bacheca.php">Bacheca</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-faq.php">FAQ</a>
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
                        <a class="opzionetab" href="homepage-users.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="inserisciAppello.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaAppelli.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="gestionePrenotazioni.php" style="display: flex; margin: 0px;">Gestione prenotazioni</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-faq.php">FAQ</a>
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
                        <a class="opzionetab" href="homepage-users.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="inserisciAppello.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaAppelli.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="gestionePrenotazioni.php" style="display: flex; margin: 0px;">Gestione prenotazioni</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-bacheca">Bacheca</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-faq.php">FAQ</a>
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
                        <a class="opzionetab" href="homepage-users.php" style="display: flex; margin: 0px;">Visualizza anagrafica</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Esami
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="inserisciAppello.php" style="display: flex; margin: 0px;">Inserisci appello</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaAppelli.php" style="display: flex; margin: 0px;">Visualizza appelli</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="gestionePrenotazioni.php" style="display: flex; margin: 0px;">Gestione prenotazioni</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-bacheca.php">Bacheca</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <div style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzione" href="homepage-faq.php">FAQ</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Moderazione utenze
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaStudentiAdmin.php" style="display: flex; margin: 0px;">Visualizza studenti</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaDocentiAdmin.php" style="display: flex; margin: 0px;">Visualizza docenti</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="visualizzaSegreteriaAdmin.php" style="display: flex; margin: 0px;">Visualizza segreteria</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
                <h5>
                    Altre funzionalità
                </h5>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="inserisciCorsoDiLaurea.php" style="display: flex; margin: 0px;">Inserisci corso di laurea</a>
                    </h5>
                </div>
                <div style="display: flex;">
                    <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                    <h5 style="display: flex; margin: 0px;">
                        <a class="opzionetab" href="inserisciCorso.php" style="display: flex; margin: 0px;">Inserisci corso</a>
                    </h5>
                </div>
                <hr style="width: 90%; margin-left: -2%;" />
            </div>
            ';
            break;
    }
}


function displayFullStudente($studente) {
    $corsoDiLaurea = getNomeCorsoDiLaureaByID($studente->idCorsoLaurea);
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Utenza: Studente</h2>
        </div>
        <div class="infoVoice">
            <h2>Nome: '.$studente->nome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Cognome: '.$studente->cognome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Matricola: '.$studente->matricola.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Corso di laurea: '.$corsoDiLaurea.'</h2>
        </div>
        <div class="infoVoice">
            <h2>Data di nascita: '.$studente->dataNascita.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$studente->password.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Reputazione totale: '.$studente->reputazioneTotale.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>CFU totali: '.$studente->cfuTotale.'</h2>
        </div>
        <div class="infoVoice">
            <h2>Media voti: '.$studente->media.'</h2>
        </div>
    </div>
</div>
    ';
}


function displayFullDocente($docente) {
    $corso = getNomeCorso($docente->idCorso);
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Utenza: Docente</h2>
        </div>
        <div class="infoVoice">
            <h2>Nome: '.$docente->nome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Cognome: '.$docente->cognome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Matricola: '.$docente->matricola.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Insegnamento: '.$corso.'</h2>
        </div> 
        <div class="infoVoice">
            <h2>Password: '.$docente->password.'</h2>
        </div>
    </div>
</div>
    ';
}


function displayFullSegretario($segretario) {
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Utenza: Segretario</h2>
        </div>
        <div class="infoVoice">
            <h2>Username: '.$segretario->username.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$segretario->password.'</h2>
        </div>  
    </div>
</div>
    ';
}


function displayAnagraficaStudente($studente) {
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Matricola: '.$studente->matricola.'</h2>
        </div>
        <div class="infoVoice">
            <h2>Nome: '.$studente->nome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Cognome: '.$studente->cognome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Data di nascita: '.$studente->dataNascita.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$studente->password.'</h2>
        </div>  
    </div>
</div>
    ';
}


function displayAnagraficaDocente($docente) {
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Matricola: '.$docente->matricola.'</h2>
        </div> 
        <div class="infoVoice">
            <h2>Nome: '.$docente->nome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Cognome: '.$docente->cognome.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$docente->password.'</h2>
        </div>
    </div>
</div>
    ';
}


function displayAnagraficaSegretario($segretario) {
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Username: '.$segretario->username.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$segretario->password.'</h2>
        </div>  
    </div>
</div>
    ';
}


function displayAnagraficaAmministratore($amministratore) {
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;">
        <div class="infoVoice">
            <h2>Username: '.$amministratore->username.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Password: '.$amministratore->password.'</h2>
        </div>  
    </div>
</div>
    ';
}


function displayCarrieraStudente($studente) {
    $corsoDiLaurea = getNomeCorsoDiLaureaByID($studente->idCorsoLaurea);
    echo '
<div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    <div style="margin-left: 2%;"> 
        <div class="infoVoice">
            <h2>Corso di laurea: '.$corsoDiLaurea.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>Reputazione totale: '.$studente->reputazioneTotale.'</h2>
        </div>  
        <div class="infoVoice">
            <h2>CFU totali: '.$studente->cfuTotale.'</h2>
        </div>
        <div class="infoVoice">
            <h2>Media voti: '.$studente->media.'</h2>
        </div>
    </div>
</div>
    ';
}


function displayAppelliPrenotabili($studente) {
    $appelli = [];
    $appelli = getAppelliPrenotabili($studente);

    if(!$appelli)
        echo '<h2>Nessun appello prenotabile trovato.</h2>';
    else {
        foreach($appelli as $appello) {
            $corso = getCorsoById($appello->idCorso);
            echo '
            <div class="blocco-esame" style="background-color:lightblue;">
                <div class="nome-esame">
                    '.$corso->nome."<br />".$appello->dataOra.'
                </div> 
                <div class="info-button">
                    PRENOTA
                    <form action="prenotaAppello-script.php" method="POST">
                        <input type="submit" name="prenota" value="" >
                        <input type="hidden" name="matricola" value="'.$_SESSION['matricola'].'">
                        <input type="hidden" name="idAppello" value="'.$appello->id.'">
                    </form>
                </div>  
            </div>
            ';
        }
    }
}


function displayFullAppelli() {
    $appelli = [];
    $appelli = getAppelli();

    if(!$appelli)
        echo '<h2>Nessun appello trovato.</h2>';
    else {
        foreach($appelli as $appello) {
            $corso = getCorsoById($appello->idCorso);
            
            if($_SESSION['src'] == "manage") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div class="info-button">
                        INFO
                        <form action="visualizzaPrenotazioni.php" method="POST">
                            <input type="submit" name="info" value="" >
                            <input type="hidden" name="idAppello" value="'.$appello->id.'">
                        </form>
                    </div>  
                </div>
                ';
            }

            elseif($_SESSION['src'] == "edit") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                        <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                            MODIFICA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="modifica" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                            </form>
                        </div>  
                        <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                            ELIMINA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="elimina" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                            </form>
                        </div> 
                    </div>
                </div>
                ';
            }
        }
    }
}


function displayAppelliFromCorso($idCorso) {
    $appelli = [];
    $appelli = getAppelliFromCorso($idCorso);

    if(!$appelli)
        echo '<h2>Nessun appello trovato.</h2>';
    else {
        foreach($appelli as $appello) {
            $corso = getCorsoById($appello->idCorso);
            
            if($_SESSION['src'] == "manage") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div class="info-button">
                        INFO
                        <form action="visualizzaPrenotazioni.php" method="POST">
                            <input type="submit" name="info" value="" >
                            <input type="hidden" name="idAppello" value="'.$appello->id.'">
                        </form>
                    </div>  
                </div>
                ';
            }

            elseif($_SESSION['src'] == "edit") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                        <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                            MODIFICA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="modifica" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                            </form>
                        </div>  
                        <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                            ELIMINA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="elimina" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                            </form>
                        </div> 
                    </div> 
                </div>
                ';
            }
        }
    }
}


function displayAppelliLike($nomeCorso) {
    $corsi = [];
    $corsi = getCorsiLike($nomeCorso);

    if(!$corsi)
        echo '<h2>Nessun appello corrispondente ai criteri di ricerca.</h2>';
    else {
        foreach($corsi as $corso) {
            $appelli = [];
            $appelli = getAppelliFromCorso($corso->id);
            if(!$appelli) {
                echo '<h2>Nessun appello corrispondente ai criteri di ricerca.</h2>';
                break;
            }
            else {
                foreach($appelli as $appello) {
                    if($_SESSION['src'] == "manage") {
                        echo '
                        <div class="blocco-esame" style="background-color:lightblue;">
                            <div class="nome-esame">
                                '.$corso->nome."<br />".$appello->dataOra.'
                            </div> 
                            <div class="info-button">
                                INFO
                                <form action="visualizzaPrenotazioni.php" method="POST">
                                    <input type="submit" name="info" value="" >
                                    <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                </form>
                            </div>  
                        </div>
                        ';
                    }
        
                    elseif($_SESSION['src'] == "edit") {
                        echo '
                        <div class="blocco-esame" style="background-color:lightblue;">
                            <div class="nome-esame">
                                '.$corso->nome."<br />".$appello->dataOra.'
                            </div> 
                            <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                                <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                                    MODIFICA
                                    <form action="fittizia.php" method="POST">
                                        <input type="submit" name="modifica" value="" >
                                        <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                        <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                        <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                                    </form>
                                </div>  
                                <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                    ELIMINA
                                    <form action="fittizia.php" method="POST">
                                        <input type="submit" name="elimina" value="" >
                                        <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                    </form>
                                </div> 
                            </div>
                        </div>
                        ';
                    }
                }
            }
        }
    }
}


function displayAppelliAfterDate($data) {
    if($_SESSION['loginType'] == "Docente") {
        $docente = getDocenteFromMatricola($_SESSION['matricola']);
        $appelli = getAppelliAfterDateFromCorso($data, $docente->idCorso);
    }
    else 
        $appelli = getAppelliAfterDate($data);

    if(!$appelli)
        echo '<h2>Nessun appello corrispondente ai criteri di ricerca.</h2>';
    else {
        foreach($appelli as $appello) {
            $corso = getCorsoById($appello->idCorso);
    
            if($_SESSION['src'] == "manage") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div class="info-button">
                        INFO
                        <form action="visualizzaPrenotazioni.php" method="POST">
                            <input type="submit" name="info" value="" >
                            <input type="hidden" name="idAppello" value="'.$appello->id.'">
                        </form>
                    </div>  
                </div>
                ';
            }
    
            elseif($_SESSION['src'] == "edit") {
                echo '
                <div class="blocco-esame" style="background-color:lightblue;">
                    <div class="nome-esame">
                        '.$corso->nome."<br />".$appello->dataOra.'
                    </div> 
                    <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                        <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                            MODIFICA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="modifica" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                            </form>
                        </div>  
                        <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                            ELIMINA
                            <form action="fittizia.php" method="POST">
                                <input type="submit" name="elimina" value="" >
                                <input type="hidden" name="idAppello" value="'.$appello->id.'">
                            </form>
                        </div> 
                    </div>
                </div>
                ';
            }
        }
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
        $corso = new corso("", "", "", "", "", "", "", "", "");
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
        $corso->idCorsoLaurea = $con->textContent;

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
       $corso = new corso("", "", "", "", "", "", "", "", "");
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
       $con = $con->nextSibling;
       $corso->idCorsoLaurea = $con->textContent;
       
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
        $corso = new corso("", "", "", "", "", "", "", "", "");
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
        $corso->idCorsoLaurea = $con->textContent;
        
        /*controllo sul nome*/
        if(preg_match("#^{$_nome}#i", $corso->nome)) $listaCorsi[] = $corso;
    }
    return $listaCorsi;
}


function getCorsiFromCorsoDiLaurea($idCorsoLaurea) {
    $listaCorsi = [];
    $corsi = getCorsi();

    foreach($corsi as $corso) {
        if($corso->idCorsoLaurea == $idCorsoLaurea) 
            $listaCorsi[] = $corso;
    }

    return $listaCorsi;
}


function getCorsiFromCorsoDiLaureaLike($idCorsoLaurea, $_nome) {
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
        $corso = new corso("", "", "", "", "", "", "", "", "");
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
        $corso->idCorsoLaurea = $con->textContent;
        
        /* Controllo sul nome e sul corso di laurea di appartenenza */
        if(preg_match("#^{$_nome}#i", $corso->nome) && $corso->idCorsoLaurea == $idCorsoLaurea) 
            $listaCorsi[] = $corso;
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

    $nomeCorso = "N/A";

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


function getCorsiDiLaurea() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaCorsiDiLaurea = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea("");
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
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaCorsiDiLaurea = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea("");
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
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    for ($i=0; $i<$records->length; $i++) {
        $corsoDiLaurea = new corsoDiLaurea("");
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
        $docente->idCorso = $con->textContent;
             
        $listaDocenti[] = $docente;
    }
    return $listaDocenti;
}


function getDocenteFromMatricola($matr) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
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
        $docente->idCorso = $con->textContent;
             
        if($docente->matricola == $matr) return $docente;
    }
    return NULL;
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
        $docente->idCorso = $con->textContent;
        
        /*controllo sul nome*/
        if(preg_match("#^{$_nome}#i", ($docente->cognome." ".$docente->nome)))
            $listaDocenti[] = $docente;
    }
    return $listaDocenti;  
}


function getDocentiDisponibili() {
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
        $docente->idCorso = $con->textContent;

        if($docente->idCorso == 0) 
            $listaDocenti[] = $docente;
    }
    return $listaDocenti;
}


function getStudenti() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/studenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaStudenti = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $studente = new studente("", "", "", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $studente->matricola = $con->textContent;
        $con = $con->nextSibling;
        $studente->nome = $con->textContent;
        $con = $con->nextSibling;
        $studente->cognome = $con->textContent;
        $con = $con->nextSibling;
        $studente->password = $con->textContent;
        $con = $con->nextSibling;
        $studente->dataNascita = $con->textContent;
        $con = $con->nextSibling;
        $studente->reputazioneTotale = $con->textContent;
        $con = $con->nextSibling;
        $studente->cfuTotale = $con->textContent;
        $con = $con->nextSibling;
        $studente->media = $con->textContent;
        $con = $con->nextSibling;
        $studente->idCorsoLaurea = $con->textContent;
             
        $listaStudenti[] = $studente;
    }
    return $listaStudenti;
}


function getStudenteFromMatricola($matr) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/studenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    for ($i=0; $i<$records->length; $i++) {
        $studente = new studente("", "", "", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $studente->matricola = $con->textContent;
        $con = $con->nextSibling;
        $studente->nome = $con->textContent;
        $con = $con->nextSibling;
        $studente->cognome = $con->textContent;
        $con = $con->nextSibling;
        $studente->password = $con->textContent;
        $con = $con->nextSibling;
        $studente->dataNascita = $con->textContent;
        $con = $con->nextSibling;
        $studente->reputazioneTotale = $con->textContent;
        $con = $con->nextSibling;
        $studente->cfuTotale = $con->textContent;
        $con = $con->nextSibling;
        $studente->media = $con->textContent;
        $con = $con->nextSibling;
        $studente->idCorsoLaurea = $con->textContent;
             
        if($studente->matricola == $matr) return $studente;
    }
    return NULL;
}


function getSegretari() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/segreteria.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaSegretari = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $segretario = new segretario("", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $segretario->username = $con->textContent;
        $con = $con->nextSibling;
        $segretario->password = $con->textContent;
             
        $listaSegretari[] = $segretario;
    }
    return $listaSegretari;
}


function getSegretariLike($uname) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/segreteria.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaSegretari = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $segretario = new segretario("", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $segretario->username = $con->textContent;
        $con = $con->nextSibling;
        $segretario->password = $con->textContent;
             
        if(preg_match("#^{$uname}#i", $segretario->username))
            $listaSegretari[] = $segretario;
    }
    return $listaSegretari;
}


function getSegretarioFromUsername($uname) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/segreteria.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

     
    for ($i=0; $i<$records->length; $i++) {
        $segretario = new segretario("", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $segretario->username = $con->textContent;
        $con = $con->nextSibling;
        $segretario->password = $con->textContent;
             
        if($segretario->username == $uname)
            return $segretario;
    }
    return NULL;
}


function getAdminFromUsername($uname) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/amministrazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;

     
    for ($i=0; $i<$records->length; $i++) {
        $admin = new amministratore("", "");  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $admin->username = $con->textContent;
        $con = $con->nextSibling;
        $admin->password = $con->textContent;
             
        if($admin->username == $uname)
            return $admin;
    }
    return NULL;
}


function getAppelli() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaAppelli = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;
             
        $listaAppelli[] = $appello;
    }
    return $listaAppelli;
}


function getAppelliFromCorsoDiLaurea($idCorsoLaurea) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaAppelli = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;

        $corso = getCorsoById($appello->idCorso);

        if($corso->idCorsoLaurea == $idCorsoLaurea)
            $listaAppelli[] = $appello;
    }
    return $listaAppelli;
}


function getAppelliFromCorso($idCorso) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    
    $listaAppelli = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;

        if($appello->idCorso == $idCorso)
            $listaAppelli[] = $appello;
    }
    return $listaAppelli;
}


function getAppelloFromId($idAppello) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
    
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;

        if($appello->id == $idAppello)
            return $appello;
    }
    return NULL;
}


function getEsamiSostenuti($studente) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaEsami = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $esame = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $esame->id = $con->textContent;
        $con = $con->nextSibling;
        $esame->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $esame->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $esame->esito = $con->textContent;

        $appello = getAppelloFromId($esame->idAppello);
        $corso = getCorsoById($appello->idCorso);

        if($esame->matricolaStudente == $studente->matricola && $corso->idCorsoLaurea == $studente->idCorsoLaurea) 
            if($esame->esito != "NULL")
                $listaEsami[] = $esame;
    }
    return $listaEsami;
}


function getEsamiSuperati($studente) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaEsamiSuperati = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $esame = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $esame->id = $con->textContent;
        $con = $con->nextSibling;
        $esame->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $esame->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $esame->esito = $con->textContent;

        $appello = getAppelloFromId($esame->idAppello);
        $corso = getCorsoById($appello->idCorso);

        if($esame->matricolaStudente == $studente->matricola && $corso->idCorsoLaurea == $studente->idCorsoLaurea) 
            if($esame->esito != "NULL" && $esame->esito != "R" && $esame->esito != "B")
                $listaEsamiSuperati[] = $corso->id;
    }
    return $listaEsamiSuperati;
}


function getAppelliPrenotati($studente) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaPrenotazioni = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $prenotazione = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $prenotazione->id = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->esito = $con->textContent;

        $appello = getAppelloFromId($prenotazione->idAppello);
        $corso = getCorsoById($appello->idCorso);

        if($prenotazione->matricolaStudente == $studente->matricola && $corso->idCorsoLaurea == $studente->idCorsoLaurea) 
            if($prenotazione->esito == "NULL")
                $listaPrenotazioni[] = $appello;
    }
    return $listaPrenotazioni;
}


function getAppelliPrenotabili($studente) {
    $appelli = [];
    $appelli = getAppelliFromCorsoDiLaurea($studente->idCorsoLaurea);
    if(!$appelli)
        return NULL;

    
    $appelliPrenotati = [];
    $appelliPrenotati = getAppelliPrenotati($studente);

    $esamiSuperati = [];
    $esamiSuperati = getEsamiSuperati($studente);

    $appelliPrenotabili = [];
    foreach($appelli as $appello) {
        $dataAppello = getDataFromDataora($appello->dataOra);
        $dataAppello = strtotime($dataAppello);
        $dataAppello = date('Y-m-d', $dataAppello);

        if($dataAppello > date('Y-m-d') && !in_array($appello, $appelliPrenotati) && !in_array($appello->idCorso, $esamiSuperati))
            $appelliPrenotabili[] = $appello;
    }

    return $appelliPrenotabili;


    // if(!$appelliPrenotati && !$esamiSuperati) {
    //     // Prendo tutti gli appelli successivi alla data odierna
    //     $lista = [];
    //     foreach($appelli as $appello) {
    //         $dataAppello = getDataFromDataora($appello->dataOra);
    //         $dataAppello = strtotime($dataAppello);
    //         $dataAppello = date('Y-m-d', $dataAppello);

    //         if($dataAppello > date('Y-m-d'))
    //             $lista[] = $appello;
    //     }
    //     return $lista;
    // }

    // elseif($appelliPrenotati && !$esamiSuperati) {
    //     // Prendo gli appelli non prenotati successivi alla data odierna
    //     $listaAppelliNonPrenotati = [];
    //     foreach($appelli as $appello) {
    //         $dataAppello = getDataFromDataora($appello->dataOra);
    //         $dataAppello = strtotime($dataAppello);
    //         $dataAppello = date('Y-m-d', $dataAppello);

    //         foreach($appelliPrenotati as $appelloPrenotato)
    //             if($appello->id != $appelloPrenotato->idAppello && $dataAppello > date('Y-m-d'))
    //                 $listaAppelliNonPrenotati[] = $appello;
    //     }
        
    //     return $listaAppelliNonPrenotati;
    // }

    // elseif(!$appelliPrenotati && $esamiSuperati) {
    //     // Prendo gli appelli degli esami non superati successivi alla data odierna
    //     $listaEsamiNonSuperati = [];
    //     foreach($appelli as $appello) {
    //         $dataAppello = getDataFromDataora($appello->dataOra);
    //         $dataAppello = strtotime($dataAppello);
    //         $dataAppello = date('Y-m-d', $dataAppello);

    //         foreach($esamiSuperati as $esameSuperato) {
    //             $appelloEsameSuperato = getAppelloFromId($esameSuperato->idAppello);
                
    //             if($appello->id != $esameSuperato->idAppello && $dataAppello > date('Y-m-d') && $appello->idCorso != $appelloEsameSuperato->idCorso)
    //                 $listaEsamiNonSuperati[] = $appello;
    //         }
    //     }
        
    //     return $listaEsamiNonSuperati;
    // }

    // elseif($appelliPrenotati && $esamiSuperati) {
    //     // Tra gli appelli non prenotati, prendo quelli di esami NON superati, successivi alla data odierna
    //     $listaAppelliNonPrenotati = [];
    //     foreach($appelli as $appello) {
    //         $dataAppello = getDataFromDataora($appello->dataOra);
    //         $dataAppello = strtotime($dataAppello);
    //         $dataAppello = date('Y-m-d', $dataAppello);

    //         foreach($appelliPrenotati as $appelloPrenotato)
    //             if($appello->id != $appelloPrenotato->idAppello && $dataAppello > date('Y-m-d'))
    //                 $listaAppelliNonPrenotati[] = $appello;
    //     }
        
    //     $listaAppelliPrenotabili = [];
    //     foreach($listaAppelliNonPrenotati as $appelloNonPrenotato) {
    //         foreach($esamiSuperati as $esameSuperato) {
    //             $appelloEsameSuperato = getAppelloFromId($esameSuperato->idAppello);

    //             if($appelloNonPrenotato->id != $esameSuperato->idAppello && $appelloNonPrenotato->idCorso != $appelloEsameSuperato->idCorso)
    //                 $listaAppelliPrenotabili[] = $appelloNonPrenotato;
    //         }

    //     }


    //     return $listaAppelliPrenotabili;
    // }

    // return NULL;    // Nel dubbio è vuota
}


function getAppelliAfterDate($data) {
    $dataRif = strtotime($data);
    $dataRif = date('Y-m-d', $dataRif);

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaAppelli = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;

        $dataAppello = getDataFromDataora($appello->dataOra);
        $dataAppello = strtotime($dataAppello);
        $dataAppello = date('Y-m-d', $dataAppello);

        if($dataAppello >= $dataRif)
            $listaAppelli[] = $appello;
    }
    return $listaAppelli;
}


function getAppelliAfterDateFromCorso($data, $idCorso) {
    $dataRif = strtotime($data);
    $dataRif = date('Y-m-d', $dataRif);

    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaAppelli = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $appello = new appello("", 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $appello->id = $con->textContent;
        $con = $con->nextSibling;
        $appello->idCorso = $con->textContent;
        $con = $con->nextSibling;
        $appello->dataOra = $con->textContent;

        $dataAppello = getDataFromDataora($appello->dataOra);
        $dataAppello = strtotime($dataAppello);
        $dataAppello = date('Y-m-d', $dataAppello);

        if($dataAppello >= $dataRif && $appello->idCorso == $idCorso)
            $listaAppelli[] = $appello;
    }
    return $listaAppelli;
}


function getDataFromDataora($dataora) {
    return substr($dataora, 0, 10);
}


function getPrenotazioniStudente($studente) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaPrenotazioni = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $prenotazione = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $prenotazione->id = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->esito = $con->textContent;

        $appello = getAppelloFromId($prenotazione->idAppello);
        $corso = getCorsoById($appello->idCorso);

        if($prenotazione->matricolaStudente == $studente->matricola && $corso->idCorsoLaurea == $studente->idCorsoLaurea) 
            if($prenotazione->esito == "NULL")
                $listaPrenotazioni[] = $prenotazione;
    }
    return $listaPrenotazioni;
}


function getPrenotazioniFromAppello($idAppello) {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaPrenotazioni = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $prenotazione = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $prenotazione->id = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->esito = $con->textContent;

        if($prenotazione->idAppello == $idAppello && $prenotazione->esito == "NULL")
            $listaPrenotazioni[] = $prenotazione;
    }
    return $listaPrenotazioni;
}


function getFullPrenotazioni() {
    /*accedo al file xml*/
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }
         
    // Creazione del documento
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->childNodes;
     
    $listaPrenotazioni = [];
     
    for ($i=0; $i<$records->length; $i++) {
        $prenotazione = new prenotazione(0, 0);  # Default constructor
        $record = $records->item($i);
             
        $con = $record->firstChild;
        $prenotazione->id = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->matricolaStudente = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->idAppello = $con->textContent;
        $con = $con->nextSibling;
        $prenotazione->esito = $con->textContent;

        $listaPrenotazioni[] = $prenotazione;
    }
    return $listaPrenotazioni;
}





/* ================================= 
======== Insert functions ==========
==================================== */

function inserisciCorso($nuovoCorso) {
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    if(verificaPresenzaCorso($nuovoCorso)) {
        setcookie('corso', "ERRORE: Il corso \"{$corso->nome}\" esiste già!");
        return FALSE;
    }

    $xml = simplexml_load_file('../Xml/corsi.xml');

    // Crea una tupla <corso> </corso>
    $newcorso = $xml->addChild('corso');
    $asd = $newcorso->addChild('id', $nuovoCorso->id);
    $asd = $newcorso->addChild('nome', $nuovoCorso->nome);
    $asd = $newcorso->addChild('descrizione', $nuovoCorso->descrizione);
    $asd = $newcorso->addChild('matricolaProf', $nuovoCorso->matricola_prof);
    $asd = $newcorso->addChild('colore', 'lightblue');
    $asd = $newcorso->addChild('anno', $nuovoCorso->anno);
    $asd = $newcorso->addChild('semestre', $nuovoCorso->semestre);
    $asd = $newcorso->addChild('curriculum', $nuovoCorso->curriculum);
    $asd = $newcorso->addChild('cfu', $nuovoCorso->cfu);
    $asd = $newcorso->addChild('ssd', $nuovoCorso->ssd);
    $asd = $newcorso->addChild('idCorsoLaurea', $nuovoCorso->idCorsoLaurea);

    //sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsi.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
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


function inserisciCorsoDiLaurea($corsoDiLaurea) {
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    if(verificaPresenzaCorsoDiLaurea($corsoDiLaurea->nome))  {
        setcookie('cdl', "ERRORE: Il corso di laurea \"{$corsoDiLaurea->nome}\" esiste già!");
        return FALSE;
    }

    $xml = simplexml_load_file('../Xml/corsiDiLaurea.xml');

    // Crea una tupla <corsoDiLaurea> </corsoDiLaurea>
    $newcorsoDiLaurea = $xml->addChild('corsoDiLaurea'); 
    $tmp = $newcorsoDiLaurea->addChild('id', $corsoDiLaurea->id);
    $tmp = $newcorsoDiLaurea->addChild('nome', $corsoDiLaurea->nome);
    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsiDiLaurea.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function inserisciAppello($appello) {
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }
    
    $corso = getCorsoById($appello->idCorso);
    $data = getDataFromDataora($appello->dataOra);

    if(verificaPresenzaAppello($appello))  {
        setcookie('appello', "ERRORE: Esiste già un appello di {$corso->nome} nel giorno {$data}!");
        return FALSE;
    }

    $xml = simplexml_load_file('../Xml/appelli.xml');

    // Crea una tupla <appello> </appello>
    $newAppello = $xml->addChild('appello'); 
    $tmp = $newAppello->addChild('id', $appello->id);
    $tmp = $newAppello->addChild('idCorso', $appello->idCorso);
    $tmp = $newAppello->addChild('dataOra', $appello->dataOra);
    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/appelli.xml', "w");
    $result = fwrite($f,  $xml->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
    else
        return TRUE;
}


function inserisciPrenotazioneAppello($matricolaStudente, $idAppello) {
    if($matricolaStudente == 0 || $idAppello == 0)
        return FALSE;
    
    $prenotazione = new prenotazione($matricolaStudente, $idAppello);
    
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $xml = simplexml_load_file('../Xml/prenotazione.xml');

    // Crea una tupla <prenotazione> </prenotazione>
    $newPrenotazione = $xml->addChild('prenotazione'); 
    $tmp = $newPrenotazione->addChild('id', $prenotazione->id);
    $tmp = $newPrenotazione->addChild('matricolaStudente', $prenotazione->matricolaStudente);
    $tmp = $newPrenotazione->addChild('idAppello', $prenotazione->idAppello);
    $tmp = $newPrenotazione->addChild('esito', $prenotazione->esito);
    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/prenotazione.xml', "w");
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


function eliminaPrenotazioneAppello($idPrenotazione) {
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $doc = new DOMDocument();
    $doc->loadXML($xmlString);
    $records = $doc->documentElement->getElementsByTagName("prenotazione");
    for ($i=0; $i<$records->length; $i++) {
        $record = $records->item($i);

        $con = $record->firstChild;
        $id = $con->textContent;

        if($id == $idPrenotazione){
            $record->parentNode->removeChild($record);
            break;
        }
            
    }

    echo $doc->save("../Xml/prenotazione.xml"); 
    return TRUE;
}





/* ================================= 
======== Modify functions ==========
==================================== */

function assegnaCorso($corso, $matricola_prof) {
    $xmlString = "";
    foreach ( file("../Xml/docenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $docenti = simplexml_load_file('../Xml/docenti.xml');

    foreach($docenti as $docente)
        if($docente->matricola == $matricola_prof)
            $docente->idCorso = $corso->id;

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/docenti.xml', "w");
    $result = fwrite($f,  $docenti->asXML());
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
    else
        return TRUE;
}
?>