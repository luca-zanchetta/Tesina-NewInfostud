<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']) || (isset($_SESSION['loginType']) && $_SESSION['loginType'] == "Docente"))
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
            <div class="infoTitle">
                <div class="infoTitle-position">
                <h2 style="margin-left: 3%;" class="hForm"> 
                    <form action="">
                        <input type="button">
                    </form>
                    Home>
                </h2>
                <h2 class="hForm">
                    <form action="">
                        <input type="button">
                    </form>
                    Bacheca>
                </h2>
                <h2 class="hForm">
                    <form action="">
                        <input type="button">
                    </form>
                    Basi di Dati
                </h2><!--Generato dallo script-->
                </div>
                <div class="infoTitle-user">
                    <h2>Nome, Cognome, Matricola</h2><!--Generato dallo script-->
                </div>
            </div>    
            <hr class="redBar" />
            <div class="pageNav">
                <div class="prev">
                    Prev  
                </div>
                <div class="pageList">
                    <div class="pageNumber">
                        1
                    </div>
                    <div class="pageNumber">
                        2
                    </div>
                    <div class="pageNumber">
                        3
                    </div>
                </div>
                <div class="next">
                    Next
                </div>
            </div>
            <div class="postList">
                <div class="postListHeader">
                    <h3>Filters</h3>
                </div>
                <div class="postContainer">
                    <form action="homepage-users-visualizzaPost.php">
                        <div class="postItem">
                            <input type="submit" value="" class="bottoneForm"> <!--Struttura di ogni bottone -->
                            <input type="hidden">

                            <div class="postData">
                                <div class="postName">
                                    <h3>Cerco appunti basi di dati</h3>
                                </div>
                                <div class="postAuthor">
                                    <h4>Marco, Rossi, 1928342</h4>
                                </div>
                            </div>
                            <div class="repliesOrUtility">
                                <h3>Replies</h3>
                                <h3>12</h3>
                            </div>
                            <div class="repliesOrUtility">
                                <h3>Utility</h3>
                                <h3>9</h3>
                            </div>
                            <div class="postDate">
                                <h3>Jul 31,2022</h3>
                            </div>
                        </div>
                    </form>
                    <div class="postItemAlt">
                        <div class="postData">
                            <div class="postName">
                                <h3>Aiuto BD</h3>
                            </div>
                            <div class="postAuthor">
                                <h4>Francesco, Totti 1293492</h4>
                            </div>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Replies</h3>
                            <h3>3</h3>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Utility</h3>
                            <h3>2</h3>
                        </div>
                        <div class="postDate">
                            <h3>Jul 1,2022</h3>
                        </div>
                    </div>
                    <hr style="
                        background-color: #aefffe94;
                        height: 8px;
                        margin: 0%;
                        border:0;
                        display: flex;"
                    >
                    <div class="postItem">
                        <div class="postData">
                            <div class="postName">
                                <h3>Cerco appunti basi di dati</h3>
                            </div>
                            <div class="postAuthor">
                                <h4>Marco, Rossi, 1928342</h4>
                            </div>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Replies</h3>
                            <h3>12</h3>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Utility</h3>
                            <h3>9</h3>
                        </div>
                        <div class="postDate">
                            <h3>Jul 31,2022</h3>
                        </div>
                    </div>
                    <div class="postItemAlt">
                        <div class="postData">
                            <div class="postName">
                                <h3>Aiuto BD</h3>
                            </div>
                            <div class="postAuthor">
                                <h4>Francesco, Totti 1293492</h4>
                            </div>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Replies</h3>
                            <h3>3</h3>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Utility</h3>
                            <h3>2</h3>
                        </div>
                        <div class="postDate">
                            <h3>Jul 1,2022</h3>
                        </div>
                    </div>
                    <div class="postItem">
                        <div class="postData">
                            <div class="postName">
                                <h3>Esame troppo difficile!!!</h3>
                            </div>
                            <div class="postAuthor">
                                <h4>Roberto, Fuori, 1928394</h4>
                            </div>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Replies</h3>
                            <h3>6</h3>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Utility</h3>
                            <h3>-6</h3>
                        </div>
                        <div class="postDate">
                            <h3>May 17,2022</h3>
                        </div>
                    </div>
                    <div class="postItemAlt">
                        <div class="postData">
                            <div class="postName">
                                <h3>Aiuto diagramma ER</h3>
                            </div>
                            <div class="postAuthor">
                                <h4>Clara, Sium, 2039489</h4>
                            </div>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Replies</h3>
                            <h3>20</h3>
                        </div>
                        <div class="repliesOrUtility">
                            <h3>Utility</h3>
                            <h3>3</h3>
                        </div>
                        <div class="postDate">
                            <h3>Apr 03,2022</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>