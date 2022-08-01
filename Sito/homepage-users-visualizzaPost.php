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

        <link rel="stylesheet" href="stile-base.css">
        <link rel="stylesheet" href="stileHomepage-users.css">
        <link rel="stylesheet" href="stileBacheca.css">
        <link rel="stylesheet" href="stilePost.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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
                <form action="homepage-users-visualizzaBacheca.php">
                <div class="prev">
                    Prev  
                    <input type="submit" value="" class="bottoneForm"> <!--Struttura di ogni bottone -->
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
                        <input type="submit" value="" class="bottoneForm"> <!--Struttura di ogni bottone -->
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
                    <input type="submit" value="" class="bottoneForm"> <!--Struttura di ogni bottone -->
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
                                <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="star-1"></label>
                                    </form>
                                </div>
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