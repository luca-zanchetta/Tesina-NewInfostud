<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="stile-base.css">
    <link rel="stylesheet" href="stileHomepage-users.css">
    <link rel="stylesheet" href="stileBacheca.css">
    <link rel="stylesheet" href="stilePost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Homepage</title>
    <style>
        .checked {
        color: orange;
        }
    </style>
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
        </div>
    </div>
    <div class="central-block">
        <div class="sidebar">
            <h5>
                Informazioni
            </h5>
            <div style="display:flex;">
                <img src="arrow.png" alt="err" width="20px" height="20px" style="display:flex;align-content:center">
                <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-users-Anagrafica.php" style="display: flex;margin:0px;">Visualizza anagrafica</a>
                </h5>
            </div>
            <div style="display:flex;">
                <img src="arrow.png" alt="err" width="20px" height="20px" style="display:flex;align-content:center">
                <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-users-Carriera.php" style="display: flex;margin:0px;">Visualizza carriera</a>
                </h5>
            </div>
            <h5>
                Esami
            </h5>
            <div style="display:flex;">
                <img src="arrow.png" alt="err" width="20px" height="20px" style="display:flex;align-content:center">
                <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-users-appelliPrenotati.php" style="display: flex;margin:0px;">Appelli prenotati</a>
                </h5>
            </div>
            <div style="display:flex;">
                <img src="arrow.png" alt="err" width="20px" height="20px" style="display:flex;align-content:center">
                <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-users-prenotaAppello.php" style="display: flex;margin:0px;">Prenota Appello</a>
                </h5>
            </div>
            <div style="display:flex;">
                <img src="arrow.png" alt="err" width="20px" height="20px" style="display:flex;align-content:center">
                <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-users-esamiSostenuti.php" style="display: flex;margin:0px;">Esami Sostenuti</a>
                </h5>
            </div>
            <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-bacheca.php" style="display: flex;margin:0px;">Bacheca</a>
            </h5>
            <h5 style="display: flex;margin:0px;">
                    <a class="opzionetab" href="homepage-faq.php" style="display: flex;margin:0px;">FAQ</a>
            </h5>
            
        </div>
        <div class="body">
            <div class="infoTitle">
                <div class="infoTitle-position">
                    <h2>Home > Bacheca > Basi di Dati</h2><!--Generato dallo script-->
                </div>
                <div class="infoTitle-user">
                    <h2>Nome,Cognome, Matricola</h2><!--Generato dallo script-->
                </div>
            </div>    
            <hr />
            <div class="postInfo">
                <div class="postTitle">
                    Cerco appunti!
                </div>
                <div class="postData">
                    <div class="postAuthor">
                        Francesco, Totti, 1923483
                    </div>
                    <div class="postDate">
                       19/02/2020
                    </div>
                </div>
            </div>
            <div class="pageNav">
                <form action="">
                <div class="prev">
                    Prev  
                    <input type="submit" value=""> <!--Struttura di ogni bottone -->
                    <input type="hidden">
                </div>
                </form>
                <div class="pageList">
                    <div class="pageNumber">
                        1
                    </div>
                    <form action="">
                    <div class="pageNumber">
                        2
                        <input type="submit" value=""> <!--Struttura di ogni bottone -->
                        <input type="hidden">
                    </div>
                    </form>
                    <div class="pageNumber">
                        3
                    </div>
                </div>
                <form action="">
                <div class="next">
                    Next
                    <input type="submit" value=""> <!--Struttura di ogni bottone -->
                        <input type="hidden">
                </div>
                </form>
                <div class="utilitiesContainer">
                    <img src="plus.png" alt="plus" width="30px">
                    <img src="minus-sign.png" alt="plus" width="30px">
                </div>
            </div>
            
            <div class="commentContainer">
                <div class="comment">
                    <div class="commentAuthorData">
                        <div class="authorDataElement">
                            Nome: Fdada
                        </div>
                        <div class="authorDataElement">
                            Matricola: 177843
                        </div>
                        <div class="authorDataElement">
                            Punteggio: dsadsa
                        </div>
                        <div class="authorDataElement">
                            Corso Di Laurea: Ing-Info
                        </div>
                    </div>
                    <div class="commentContent">
                        <div class="commentTopBar">
                            <div class="commentTime">
                                Mar 31,2022 · Voto Totale : 3,4
                            </div>
                            <div class="commentTime" style="justify-content: flex-end;">
                                Il tuo voto: 
                            </div> 
                            <div class="commentVoteContainer">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="commentText">
                            CIasdhjaskdhkaj dsajkhdsa jkhd sjk kdsaajkhd sakj dsakjh dsaakj dasskj dsakj daskj fj fdsjh fdkj fdsjak dsajk dsa kjfh
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="commentAuthorData">
                        <div class="authorDataElement">
                            Nome: Fdada
                        </div>
                        <div class="authorDataElement">
                            Matricola: 177843
                        </div>
                        <div class="authorDataElement">
                            Punteggio: dsadsa
                        </div>
                        <div class="authorDataElement">
                            Corso Di Laurea: Ing-Info
                        </div>
                    </div>
                    <div class="commentContent">
                        <div class="commentTopBar">
                            <div class="commentTime">
                                Mar 31,2022
                            </div>
                            <div class="commentVoteContainer">

                            </div>
                        </div>
                        <div class="commentText">
                            CIasdhjaskdhkaj dsajkhdsa jkhd sjk kdsaajkhd sakj dsakjh dsaakj dasskj dsakj daskj fj fdsjh fdkj fdsjak dsajk dsa kjfh
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="commentAuthorData">
                        <div class="authorDataElement">
                            Nome: Fdada
                        </div>
                        <div class="authorDataElement">
                            Matricola: 177843
                        </div>
                        <div class="authorDataElement">
                            Punteggio: dsadsa
                        </div>
                        <div class="authorDataElement">
                            Corso Di Laurea: Ing-Info
                        </div>
                    </div>
                    <div class="commentContent">
                        <div class="commentTopBar">
                            <div class="commentTime">
                                Mar 31,2022
                            </div>
                            <div class="commentVoteContainer">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="commentText">
                            CIasdhjaskdhkaj dsajkhdsa jkhd sjk kdsaajkhd sakj dsakjh dsaakj dasskj dsakj daskj fj fdsjh fdkj fdsjak dsajk dsa kjfh
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>