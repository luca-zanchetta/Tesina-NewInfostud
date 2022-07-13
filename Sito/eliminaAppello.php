<?php
require_once('phpFunctions.php');
session_start();
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <title>Homepage</title>
</head>
<body>
    <div class="header">
        <div class="nav-left">
            <div class="nav-logo">
                <a href="homepage.php">
                    <img src="https://store-images.s-microsoft.com/image/apps.51215.9007199266623456.05e3a154-d5ac-49d8-af6e-ab2f789dc26d.f443b25b-1668-48aa-8137-f8e5609aee45?mode=scale&q=90&h=300&w=300" alt="logo" width="90px">
                </a>
            </div>
            <div class="vertical-bar"></div>
                <h2>
                    <form action="">
                        <input type="button">
                    </form>
                    Infostud
                </h2>
            <div class="vertical-bar"></div>
            <?php
                if(isset($_SESSION['login'])){
                    ?>
                    <h2>
                        <a class="logout" href="amministrazione.php">
                            Amministrazione
                        </a>
                    </h2>
                    <div class="vertical-bar"></div>
                    <h2>
                        <a class="logout" href="logout.php">
                            Logout
                        </a>
                    </h2>
                <?php
                }
                else{
                    ?>
                    <h2>
                        <a class="logout" href="login.php">
                            Login
                        </a>
                    </h2>
                <?php
                }
            ?>
        </div>
        <div class="nav-central">
            <form action="visualizzaAppelli.php" method="POST">
                <div class="nav-logo">
                    <input type="submit" name="ricerca" value="">
                    <img src="search.png" alt="err" width="20px" style="display: inline-flex;">
                </div>    
                    <input type="text" name="filtro">              
            </form>
        </div>
        <div class="nav-right">
            <img src="account.png" alt="dasdas" width="90px">
        </div>
    </div>
    <div class="central-block">
        <div class="sidebar">
            <h5>
                <a class="opzione" href="homepage.php">Visualizza corsi</a>
            </h5>
            <h5>
                <a class="opzione" href="visualizzaAppelli.php">Visualizza appelli</a>
            </h5>
        </div>
        <div class="body">
            <h1 style="text-align: center; color: green;">APPELLI DISPONIBILI:</h1>
            <div class="container-esami">
                <?php
                // Stringa con il contenuto del file XML, privo di spazi o cose simili
                $xmlString = "";
                foreach ( file("appelli.xml") as $node ) {
                    $xmlString .= trim($node);
                }
                
                // Creazione del documento
                $doc = new DOMDocument();
                // Caricamento del contenuto informativo del file XML
                $doc->loadXML($xmlString);
                // Lista degli elementi del file XML caricato
                $records = $doc->documentElement->childNodes;

                if($records->length > 0) { /* C'è almeno un appello */
                    $listaCorsi = [];
                    if(isset($_POST['filtro']) && $_POST['filtro'] != "") {
                        $listaCorsi = getCorsiLike($_POST['filtro']);
                        foreach($listaCorsi as $corso){
                            $idCorso = $corso->id;
                            if($idCorso != 0) {
                                for ($i=0; $i<$records->length; $i++) {
                                    $record = $records->item($i); // i-esimo appello
                
                                    $codiceElement = $record->firstChild;   // Codice
                                    $codice = $codiceElement->textContent;
                                    $dataAppelloElement = $codiceElement->nextSibling;  // Data appello
                                    $dataAppello = $dataAppelloElement->textContent;
                                    $dataScandenzaElement = $dataAppelloElement->nextSibling; // Data scadenza (è veramente necessaria?)
                                    $dataScandenza = $dataScandenzaElement->textContent;
                                    $idElement = $dataScandenzaElement->nextSibling;
                                    $id = $idElement->textContent;
    
                                    $nomeCorso = $corso->nome;
                                    $colore = $corso->id_colore;
    
                                    if($idCorso == $id) {
                                    ?>
                                        <div class="blocco-esame" style="background-color:<?php echo $colore?>">
                                            <div class="nome-esame" >
                                                <?php echo $nomeCorso?><br />
                                                <?php echo $dataAppello?>
                                            </div>  
                                        </div>                                     
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                    elseif(isset($_POST['filtro']) && $_POST['filtro'] == "") {
                    ?>
                        <form action="homepage.php" method="post">
                            <div class="zero-esami_central">
                                <h2>ERRORE: Il campo di ricerca non pu&ograve; essere vuoto!</h2>
                                <input class="bottoneHome" type="submit" name="home" value="TORNA ALLA HOME">
                            </div>
                        </form>
                    <?php
                    }
                    else {
                        $listaCorsi = getCorsi();
                        foreach($listaCorsi as $corso){
                            for ($i=0; $i<$records->length; $i++) {
                                $record = $records->item($i); // i-esimo appello
            
                                $codiceElement = $record->firstChild;   // Codice
                                $codice = $codiceElement->textContent;
                                $dataAppelloElement = $codiceElement->nextSibling;  // Data appello
                                $dataAppello = $dataAppelloElement->textContent;
                                $dataScandenzaElement = $dataAppelloElement->nextSibling; // Data scadenza (è veramente necessaria?) 
                                $dataScandenza = $dataScandenzaElement->textContent;
                                $idElement = $dataScandenzaElement->nextSibling;
                                $id = $idElement->textContent;
                                
                                $idCorso = $corso->id;
    
                                $nomeCorso = $corso->nome;
                                $colore = $corso->id_colore;
        
                                if($idCorso == $id) {
                                ?>
                                    <div class="blocco-esame" style="background-color:<?php echo $colore?>">
                                        <div class="nome-esame" >
                                            <?php echo $nomeCorso?><br />
                                            <?php echo $dataAppello?>
                                        </div> 
                                        <div class="info-button">
                                        Elimina
                                        <form action="eliminaAppelloScript.php" method="GET">
                                            <input type="submit" name="iscriviti" value="" >
                                            <input type="hidden" name="appello" value="<?php echo $codice?>">
                                        </form>
                                    </div>   
                                    </div>                                     
                                <?php
                                }
                            }
                        }
                    }
                }
                else { /* Non ci sono appelli */
                    ?>
                        <form action="homepage.php" method="post">
                            <div class="zero-esami_central">
                                <h2>Nessun appello disponibile!</h2>
                                <input class="bottoneHome" type="submit" name="home" value="TORNA ALLA HOME">
                            </div>
                        </form>
                    <?php
                }?>
            </div>           
        </div>
    </div>
</div>
</body>
</html>