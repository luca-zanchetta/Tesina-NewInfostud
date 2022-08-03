<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']) || (isset($_SESSION['loginType']) && $_SESSION['loginType'] != "Studente"))
    header('Location: homepage.php');

if(isset($_SESSION['matricola']))
    $studenteLoggato = getStudenteFromMatricola($_SESSION['matricola']);

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileHomepage-users.css">
    <link rel="stylesheet" href="stileBacheca.css">
    <link rel="stylesheet" href="stilePost.css">
    <link rel="stylesheet" href="stileFaq.css">
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
        </div>
        <div class="nav-right">
        <h2>
            <form action="">
                <input type="button">
            </form>
                Logout
        </h2>
        <div class="vertical-bar"></div>
            <div class="nav-logo">
                <a href="homepage-users.php">
                    <img src="account.png" alt="logo" width="90px">
                </a>
            </div>
        </div>
        </div>
    </div>
    <div class="central-block">
        <?php creaSidebar($_SESSION['loginType']); ?>
        <div class="body">
            <div class="_body">
                <div class="infoTitle">
                    <div class="infoTitle-position">
                        <h2>Home > Bacheca > Basi di Dati</h2><!--Generato dallo script-->
                    </div>
                    <div class="infoTitle-user">
                        <h2>Nome, Cognome, Matricola</h2><!--Generato dallo script-->
                    </div>
                </div>    
                <hr />
                <!-- Container delle domande con risposta -->
                <div class="container">
                    <div class="title">
                        Domande e Risposte complete
                    </div>
                    <div class="researchBar">
                        <form action="">
                            <input type="text">
                        </form>
                    </div>
                    <div class="faqContainer">
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <div class="content">
                                        Il libro è un'aggiunta, potrà tranquillamente affrontare l'esame studiando sul materiale checkdate
                                        metterò a disposizione durante il corso
                                    </div>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <div class="content">
                                        Il libro è un'aggiunta, potrà tranquillamente affrontare l'esame studiando sul materiale checkdate
                                        metterò a disposizione durante il corso
                                    </div>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <form action="">
                                        <div class="content"> 
                                            <input id="inputId" type="text" value="Il libro è un'aggiunta, potrà tranquillamente affrontare l'esame studiando sul materiale."> 
                                            <div id="textId">Il libro è un'aggiunta, potrà tranquillamente affrontare l'esame studiando sul materiale.</div>
                                        </div>
                                        <div class="editButton">
                                            <input type="submit" value="" onclick="toggleInput('viene passato id della faq')">
                                            <img  src="edit.png" alt="err">
                                        </div>
                                    </form>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container delle domande senza risposta -->
                <div class="container">
                    <div class="title">
                        Domande e Risposte Incomplete
                    </div>
                    <div class="researchBar">
                        <form action="">
                            <input type="text">
                        </form>
                    </div>
                    <div class="faqContainer">
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <div class="content">
                                    </div>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <div class="content">
                                    </div>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                        <div class="faq">
                            <div class="upDown">
                                <form action="">
                                    <div>
                                        <img src="up.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value="">      
                                    </div>
                                </form>
                                <div>
                                    0 Voti
                                </div>
                                <form action="">
                                    <div>
                                        <img src="down.png" alt="dsa">
                                        <input type="hidden">
                                        <input type="button" value=""> 
                                    </div>
                                </form>
                            </div>
                            <div class="vBar"></div>
                            <div class="faqContent">
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Domanda
                                    </div>
                                    <div class="contentQuestion">
                                        Serve un libro di testo in particolare per affrontare l'esame
                                    </div>
                                </div>
                                <div class="contentRow">
                                    <div class="contentTitle">
                                        Risposta
                                    </div>
                                    <div class="content">
                                    </div>
                                </div>
                                <div class="faqAuthorData">
                                    Da david in data 5 dicembre 2020
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container della form di input -->
                <div class="formContainer">
                    <div class="formBorder">
                        <div class="formTitle">
                            Proponi una nuova domanda
                        </div>
                        <form action="">
                            <textarea name="" id="" placeholder="Domanda"></textarea>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function toggleInput(id) {
        event.preventDefault();
        if(document.getElementById("textId").style.display == "none"){
            
            document.getElementById("inputId").style.display = "none";
            document.getElementById("textId").style.display = "flex";

            _newText = $("#inputId").val()
            console.log(_newText);
            document.getElementById("textId").textContent = _newText;

            //Possiamo usare uno script esterno volendo
            jQuery.ajax({
                        url: 'homepage-users-visualizzaFaq.php',
                        type: 'POST',
                        data: jQuery.param({ newText: _newText, id:id}) ,
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            console.log("Success");
                        },
                        error: function () {
                            console.log("error");
                        }});

        }else{
            document.getElementById("textId").style.display = "none";
            document.getElementById("inputId").style.display = "flex";
        }
    }
</script>