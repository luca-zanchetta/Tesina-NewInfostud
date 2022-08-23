<?php
require_once('phpFunctions.php');

/* ================================= 
=========== PHP CLASSES ============
==================================== */

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
    public $idCorsoLaurea;

    public function __construct($nome, $descrizione, $matricola_prof, $anno, $semestre, $curriculum, $cfu, $ssd, $idCorsoLaurea) {
        $this->id = calcolaIdCorso();
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->matricola_prof = $matricola_prof;
        $this->anno = $anno;
        $this->semestre = $semestre;
        $this->curriculum = $curriculum;
        $this->cfu = $cfu;
        $this->ssd = $ssd;
        $this->idCorsoLaurea = $idCorsoLaurea;
        $this->colore = 'lightblue';
    }
}


class studente {
    public $matricola;
    public $nome;
    public $cognome;
    public $password;
    public $dataNascita;
    public $reputazioneTotale;
    public $cfuTotale;
    public $media;
    public $idCorsoLaurea;

    public function __construct($nome, $cognome, $password, $dataNascita) {
        $this->matricola = generaMatricola("Studente");
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->password = $password;
        $this->dataNascita = $dataNascita;         
        $this->reputazioneTotale = 0;
        $this->cfuTotale = 0;
        $this->media = 0;
        $this->idCorsoLaurea = 0;   /* stato intermedio? */  
    }
}


class docente {
    public $matricola;
    public $nome;
    public $cognome;
    public $password;
    public $idCorso;

    public function __construct($nome, $cognome, $password, $idCorso) {
        $this->matricola = generaMatricola("Docente");
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->password = $password;
        $this->idCorso = $idCorso;
    }
}


class segretario {
    public $username;
    public $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
}


class amministratore {
    public $username;
    public $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
}


class appello {
    public $id;
    public $dataOra;
    public $idCorso;

    public function __construct($dataOra, $idCorso) {
        $this->id = calcolaIdAppello();
        $this->dataOra = $dataOra;
        $this->idCorso = $idCorso;
    }
}


class corsoDiLaurea {
    public $id;
    public $nome;

    public function __construct($nome) {
        $this->id = calcolaIdCorsoDiLaurea();
        $this->nome = $nome;
    }
}


class prenotazione {
    public $id;
    public $matricolaStudente;
    public $idAppello;
    public $esito;

    public function __construct($matricolaStudente, $idAppello) {
        $this->id = calcolaIdPrenotazione();
        $this->matricolaStudente = $matricolaStudente;
        $this->idAppello = $idAppello;
        $this->esito = "NULL";
    }
}
?>