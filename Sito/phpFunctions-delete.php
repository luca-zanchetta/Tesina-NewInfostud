<?php
require_once('phpFunctions-modify.php');


/* ================================= 
======== Delete functions ==========
==================================== */

function eliminaAppello($idAppello) {
    if($idAppello == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $appelli = simplexml_load_file('../Xml/appelli.xml');
    $eliminato = FALSE;

    foreach($appelli as $appello) {
        if($appello->id == $idAppello) {
            $appello->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/appelli.xml', "w");
    $result = fwrite($f,  $appelli->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $eliminato)
        return TRUE;
}


function eliminaAppelliCorso($id_corso) {
    if($id_corso == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/appelli.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $appelli = simplexml_load_file('../Xml/appelli.xml');

    foreach($appelli as $appello)
        if($appello->idCorso == $id_corso)
            $appello->stato = 0;

    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/appelli.xml', "w");
    $result = fwrite($f,  $appelli->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result)
        return TRUE;
}


function eliminaCorso($_id) {
    if($_id == 0)
        return FALSE;
    
    if(!eliminaAppelliCorso($_id))
        return FALSE;

    $xmlString = "";
    foreach ( file("../Xml/corsi.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $corsi = simplexml_load_file('../Xml/corsi.xml');
    $eliminato = FALSE;

    foreach($corsi as $corso) {
        if($corso->id == $_id) {
            $corso->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsi.xml', "w");
    $result = fwrite($f,  $corsi->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $eliminato)
        return TRUE;
}


function eliminaPrenotazioneAppello($idPrenotazione) {
    if($idPrenotazione == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/prenotazione.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $prenotazioni = simplexml_load_file('../Xml/prenotazione.xml');
    $eliminato = FALSE;

    foreach($prenotazioni as $prenotazione) {
        if($prenotazione->id == $idPrenotazione) {
            $prenotazione->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/prenotazione.xml', "w");
    $result = fwrite($f,  $prenotazioni->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $eliminato)
        return TRUE;
}


function deleteFaq($idFaq) {
    if($idFaq == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/faqs.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $faqs = simplexml_load_file('../Xml/faqs.xml');
    $eliminato = FALSE;

    foreach($faqs as $faq) {
        if($faq->id == $idFaq) {
            $faq->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/faqs.xml', "w");
    $result = fwrite($f,  $faqs->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $eliminato) {
        # Rimuoviamo tutti i voti associati alla FAQ
        
        $xmlString = "";
        foreach ( file("../Xml/votoFAQ.xml") as $node ) {
            $xmlString .= trim($node);
        }

        $votiFAQ = simplexml_load_file('../Xml/votoFAQ.xml');

        foreach($votiFAQ as $voto)
            if($voto->idFAQ == $idFaq)
                $voto->stato = 0;
        
        // Sovrascrive il vecchio file con i nuovi dati
        $f = fopen('../Xml/votoFAQ.xml', "w");
        $result = fwrite($f,  $votiFAQ->asXML());
        fclose($f);

        if(!$result) 
            return FALSE;
    }

    return TRUE;
}


function deletePost($idPost) {
    if($idPost == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/posts.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $posts = simplexml_load_file('../Xml/posts.xml');
    $eliminato = FALSE;

    foreach($posts as $post) {
        if($post->id == $idPost) {
            $post->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/posts.xml', "w");
    $result = fwrite($f,  $posts->asXML());
    fclose($f);


    if(!$result) 
        return FALSE;
    elseif($result && $eliminato) {
        # Rimuoviamo tutti i commenti associati al post
        
        $xmlString = "";
        foreach ( file("../Xml/commenti.xml") as $node ) {
            $xmlString .= trim($node);
        }

        $commenti = simplexml_load_file('../Xml/commenti.xml');

        foreach($commenti as $commento)
            if($commento->idPost == $idPost)
                $commento->stato = 0;
        
        // Sovrascrive il vecchio file con i nuovi dati
        $f = fopen('../Xml/commenti.xml', "w");
        $result = fwrite($f,  $commenti->asXML());
        fclose($f);

        if(!$result) 
            return FALSE;
    }

    return TRUE;
}


function deleteFaqVote($matricola, $idFaq) {
    if($matricola == 0 || $idFaq == 0)
        return FALSE;

    $xmlString = "";
    foreach ( file("../Xml/votoFAQ.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $votiFAQ = simplexml_load_file('../Xml/votoFAQ.xml');
    $eliminato = FALSE;

    foreach($votiFAQ as $voto) {
        if($voto->idFAQ == $idFaq && $voto->matricola = $matricola) {
            $voto->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }

    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/votoFAQ.xml', "w");
    $result = fwrite($f,  $votiFAQ->asXML());
    fclose($f);

    $updateUtility = updateFaqUtility($idFaq);

    if(!$result) 
        return FALSE;
    elseif($result && $eliminato && $updateUtility)
        return TRUE;
}


function deleteCommentVote($idCommento, $matricola) {
    if($idCommento == 0 || $matricola == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/votoCommento.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $votiCommento = simplexml_load_file('../Xml/votoCommento.xml');
    $eliminato = FALSE;

    foreach($votiCommento as $voto) {
        if($voto->matricolaStudente == $matricola && $voto->idCommento == $idCommento) {
            $voto->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }


    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/votoCommento.xml', "w");
    $result = fwrite($f,  $votiCommento->asXML());
    fclose($f);

    $updateAccordo = updateCommentAccordo($idCommento);

    if(!$result) 
        return FALSE;
    elseif($result && $eliminato && $updateAccordo)
        return TRUE;
}

function deleteComment($idCommento) {
    if($idCommento == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/commenti.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $commenti = simplexml_load_file('../Xml/commenti.xml');
    $eliminato = FALSE;

    foreach($commenti as $commento) {
        if($commento->id == $idCommento) {
            $commento->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }
    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/commenti.xml', "w");
    $result = fwrite($f,  $commenti->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
    elseif($result && $eliminato)
        return TRUE;
}


function eliminaCorsoDiLaurea($idCorsoDiLaurea) {
    if($idCorsoDiLaurea == 0)
        return FALSE;
    
    $xmlString = "";
    foreach ( file("../Xml/corsiDiLaurea.xml") as $node ) {
        $xmlString .= trim($node);
    }

    $corsiDiLaurea = simplexml_load_file('../Xml/corsiDiLaurea.xml');
    $eliminato = FALSE;

    foreach($corsiDiLaurea as $corsoDiLaurea) {
        if($corsoDiLaurea->id == $idCorsoDiLaurea) {
            $corsoDiLaurea->stato = 0;
            $eliminato = TRUE;
            break;
        }
    }
    
    // Sovrascrive il vecchio file con i nuovi dati
    $f = fopen('../Xml/corsiDiLaurea.xml', "w");
    $result = fwrite($f,  $corsiDiLaurea->asXML());
    fclose($f);

    if(!$result) 
        return FALSE;
    elseif($result && $eliminato)
        return TRUE;
}
?>