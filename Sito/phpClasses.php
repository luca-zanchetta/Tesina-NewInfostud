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
}


class corsoDiLaurea {
    public $id;
    public $nome;
}


class prenotazione {
    public $id;
    public $matricolaStudente;
    public $idAppello;
    public $esito;
}

class faq {
    public $id;
    public $domanda;
    public $risposta;
    public $utilitaTotale;
    public $idCorso;
    public $idAutore;
}

class faqVote {
    public $id;
    public $matricolaStudente;
    public $idFAQ;
    public $utilita;
    public function __construct($matricola, $idFAQ, $utilita) {
        $this->matricolaStudente = $matricola;
        $this->idFAQ = $idFAQ;
        $this->utilita = $utilita;
        $this->id = nextFaqVoteId();
    }
}

class post {
    public $id;
    public $titolo;
    public $corpo;
    public $matricolaStudente;
    public $utilitaTotale;
    public $idCorso;
    public $data;
    public $replies;
}

class comment {
    public $id;
    public $corpo;
    public $matricolaStudente;
    public $accordoMedio;
    public $idPost;
    public $data;
}

class commentVote {
    public $id;
    public $matricolaStudente;
    public $idCommento;
    public $accordo;
    public $idAutoreCommento;
}
?>