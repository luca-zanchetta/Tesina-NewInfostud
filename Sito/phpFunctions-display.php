<?php
    require_once('phpClasses.php');
    require_once('phpFunctions-misc.php');
    require_once('phpFunctions-get.php');
    require_once('phpFunctions-insert.php');

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
                            <a class="opzione" href="homepage-users-visualizzaFaq.php">FAQ</a>
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


            case "Amministratore":
                echo '
                <div class="sidebar" style="">
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
                    <div style="display: flex;">
                        <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                        <h5 style="display: flex; margin: 0px;">
                            <a class="opzionetab" href="gestisciCorsiDiLaurea.php" style="display: flex; margin: 0px;">Gestisci corsi di laurea</a>
                        </h5>
                    </div>
                    <div style="display: flex;">
                        <img src="arrow.png" alt="freccia" width="20px" style="display: flex;">
                        <h5 style="display: flex; margin: 0px;">
                            <a class="opzionetab" href="gestisciCorsi.php" style="display: flex; margin: 0px;">Gestisci corsi</a>
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
        //$corso = getNomeCorso($docente->idCorso);
        $listaCorsi = getCorsoFormDocente($docente->id);
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
            ';
            if(count($listaCorsi) != 0) {
                for ($i=0; $i < count($listaCorsi); $i++) { 
                    echo '<div class="infoVoice">
                            <h2>Insegamento: '.$listaCorsi[$i]->nome.'</h2>
                        </div>';
                }
            }
        echo '
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
                                <form action="modificaAppello.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                    <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                    <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaAppello-script.php" method="POST">
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
        $appelli = getAppelliAfterDateFromCorso(date('Y-m-d'), $idCorso);

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
                                <form action="modificaAppello.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                    <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                    <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaAppello-script.php" method="POST">
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
                                        <form action="modificaAppello.php" method="POST">
                                            <input type="submit" name="modifica" value="" >
                                            <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                            <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                            <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                                        </form>
                                    </div>  
                                    <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                        ELIMINA
                                        <form action="eliminaAppello-script.php" method="POST">
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
                                <form action="modificaAppello.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idAppello" value="'.$appello->id.'">
                                    <input type="hidden" name="idCorso" value="'.$appello->idCorso.'">
                                    <input type="hidden" name="dataOra" value="'.$appello->dataOra.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaAppello-script.php" method="POST">
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


    function displayCorsiDiLaurea() {
        $corsiDiLaurea = [];
        $corsiDiLaurea = getCorsiDiLaurea();

        if(!$corsiDiLaurea)
            echo '<h2>Nessun corso di laurea trovato.</h2>';
        else {
            foreach($corsiDiLaurea as $corsoDiLaurea) {
                if($_SESSION['src'] == "edit") {
                    echo '
                    <div class="blocco-esame" style="background-color:lightblue;">
                        <div class="nome-esame">
                            '.$corsoDiLaurea->nome.'
                        </div> 
                        <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                            <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                                MODIFICA
                                <form action="modificaCorsoDiLaurea.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idCorsoDiLaurea" value="'.$corsoDiLaurea->id.'">
                                    <input type="hidden" name="nomeCorsoDiLaurea" value="'.$corsoDiLaurea->nome.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaCorsoDiLaurea-script.php" method="POST">
                                    <input type="submit" name="elimina" value="" >
                                    <input type="hidden" name="idCorsoDiLaurea" value="'.$corsoDiLaurea->id.'">
                                </form>
                            </div> 
                        </div>
                    </div>
                    ';
                }
            }
        }
    }


    function displayCorsiDiLaureaLike($nome) {
        $corsiDiLaurea = [];
        $corsiDiLaurea = getCorsiDiLaureaLike($nome);

        if(!$corsiDiLaurea)
            echo '<h2>Nessun corso di laurea trovato.</h2>';
        else {
            foreach($corsiDiLaurea as $corsoDiLaurea) {
                if($_SESSION['src'] == "edit") {
                    echo '
                    <div class="blocco-esame" style="background-color:lightblue;">
                        <div class="nome-esame">
                            '.$corsoDiLaurea->nome.'
                        </div> 
                        <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                            <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                                MODIFICA
                                <form action="modificaCorsoDiLaurea.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idCorsoDiLaurea" value="'.$corsoDiLaurea->id.'">
                                    <input type="hidden" name="nomeCorsoDiLaurea" value="'.$corsoDiLaurea->nome.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaCorsoDiLaurea-script.php" method="POST">
                                    <input type="submit" name="elimina" value="" >
                                    <input type="hidden" name="idCorsoDiLaurea" value="'.$corsoDiLaurea->id.'">
                                </form>
                            </div> 
                        </div>
                    </div>
                    ';
                }
            }
        }
    }


    function displayCorsi() {
        $corsi = [];
        $corsi = getCorsi();

        if(!$corsi)
            echo '<h2>Nessun corso trovato.</h2>';
        else {
            foreach($corsi as $corso) {
                if($_SESSION['src'] == "edit") {
                    echo '
                    <div class="blocco-esame" style="background-color:lightblue;">
                        <div class="nome-esame">
                            '.$corso->nome.'
                        </div> 
                        <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                            <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                                MODIFICA
                                <form action="modificaCorso.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idCorso" value="'.$corso->id.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaCorso-script.php" method="POST">
                                    <input type="submit" name="elimina" value="" >
                                    <input type="hidden" name="idCorso" value="'.$corso->id.'">
                                </form>
                            </div> 
                        </div>
                    </div>
                    ';
                }
            }
        }
    }


    function displayCorsiLike($nome) {
        $corsi = [];
        $corsi = getCorsiLike($nome);

        if(!$corsi)
            echo '<h2>Nessun corso trovato.</h2>';
        else {
            foreach($corsi as $corso) {
                if($_SESSION['src'] == "edit") {
                    echo '
                    <div class="blocco-esame" style="background-color:lightblue;">
                        <div class="nome-esame">
                            '.$corso->nome.'
                        </div> 
                        <div style="display: flex; flex-direction: row; padding-top: 10%; margin-left: -10%;">
                            <div class="info-button" style="padding-left: 15%; padding-right: 15%;">
                                MODIFICA
                                <form action="modificaCorso.php" method="POST">
                                    <input type="submit" name="modifica" value="" >
                                    <input type="hidden" name="idCorso" value="'.$corso->id.'">
                                </form>
                            </div>  
                            <div class="info-button" style="margin-left: 10%; padding-left: 15%; padding-right: 15%;">
                                ELIMINA
                                <form action="eliminaCorso-script.php" method="POST">
                                    <input type="submit" name="elimina" value="" >
                                    <input type="hidden" name="idCorso" value="'.$corso->id.'">
                                </form>
                            </div> 
                        </div>
                    </div>
                    ';
                }
            }
        }
    }

?>


