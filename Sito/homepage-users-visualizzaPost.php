<?php
session_start();
require_once('phpFunctions.php');

if(!isset($_SESSION['loginType']) || (isset($_SESSION['loginType']) && $_SESSION['loginType'] == "Docente"))
    header('Location: homepage.php');

if(isset($_SESSION['matricola']))
    $studenteLoggato = getStudenteFromMatricola($_SESSION['matricola']);

switch ($_SESSION['loginType']) {
    case 'Studente':
        # code...
        $utenzaLoggata = getStudenteFromMatricola($_SESSION['matricola']);
        break;
    case 'Segretario':
        # code...
        $utenzaLoggata = getSegretarioFromUsername($_SESSION['username']);
        break;
    case 'Amministratore':
        # code...
        $utenzaLoggata = getAdminFromUsername($_SESSION['username']);
        break;    
    default:
        # code...
        break;
}

$post = getPostFromId($_GET['idPost']);
$listaCommenti = getPostComments($_GET['idPost']);
$pageNum = $_GET['pageNum'];
$autore = ($post->matricolaStudente>0 ? getStudenteFromMatricola($post->matricolaStudente) : 'tsk');
$maxPageNum = ((int)(count($listaCommenti)/5)) + (count($listaCommenti)%5 > 0 ? 1 : 0);
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
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
            <form action="logout.php">
                <input type="submit" value="">
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
                            <input type="button" value="prova" name="dsa">
                        </form>
                        <?php echo getCorsoById($_GET['idCorso'])->nome;?>
                    </h2>
                </div>
                <div class="infoTitle-user">
                    <h2>
                        <?php 
                            if($_SESSION['loginType'] == 'Studente')
                                echo "{$utenzaLoggata->nome}, {$utenzaLoggata->cognome}, {$utenzaLoggata->matricola}";
                            else
                                echo "{$_SESSION['loginType']}: {$utenzaLoggata->username}";
                        ?>
                    </h2><!--Generato dallo script-->
                </div>
            </div>    
            <hr class="redBar" />
            <div class="postHeader">
                <div class="upDown">
                    <form action="">
                        <div>
                            <img src="up.png" alt="dsa">
                            <input type="hidden">
                            <input type="button" value="">      
                        </div>
                    </form>
                    <div>
                        <?php echo $post->utilitaTotale;?>
                    </div>
                    <form action="">
                        <div>
                            <img src="down.png" alt="dsa">
                            <input type="hidden">
                            <input type="button" value=""> 
                        </div>
                    </form>
                </div>
                <div class="postInfo">
                    <div class="postTitle">
                        <div class="titleContainer"><?php echo $post->titolo;?></div>
                        <?php if($_SESSION['loginType'] == 'Amministratore' || $_SESSION['loginType'] == 'Segretario') { ?>
                            <div class="adminTools">
                                <form action="deletePost.php" method="POST">
                                    <img src="bin.png" alt="err">
                                    <input type="submit" name="deletePost" value="">
                                    <input type="hidden" value="<?php echo $_GET["pageNum"];?>" name="pageNum"> 
                                    <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                                    <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                                </form>
                                <form action="" name="editPostForm">
                                    <img src="edit.png" alt="err">
                                    <input type="submit" value="" onclick="editPost(<?php echo $post->id?>)">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="postData">
                        <div class="postAuthor">
                            <?php echo $autore == 'tsk'? 'Da Moderatore' : "{$autore->nome}, {$autore->cognome}, {$autore->matricola}" ;?>
                        </div>
                        <div class="postDate">
                            <?php echo $post->data;?>
                        </div>
                    </div>
                    <div class="postData">
                        <div id="postText"><?php echo $post->corpo;?></div>
                        <form action="">
                            <textarea id="postInput" form="editPostForm" style="display:none;" required><?php echo $post->corpo;?></textarea>
                        </form>   
                    </div>
                </div>
            </div>
            <div class="pageNav">
                <form action="homepage-users-visualizzaBacheca.php">
                    <div class="prev">
                        Prev  
                        <?php 
                            if($pageNum == 1){ ?>
                                <input type="button" onclick="window.alert('Non esistono pagine precedenti!')" class="bottoneForm"> <?php
                            }else{ ?>
                                <input type="submit" value="" class="bottoneForm"> <?php
                            }
                        ?>
                        <input type="hidden" value="<?php echo $pageNum-1; ?>" name="pageNum">
                        <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                        <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                    </div>
                </form>
                <div class="pageList">
                    <?php 
                        for ($i=0; $i < $maxPageNum; $i++) { 
                            ?>
                            <form action="">
                                <div class="pageNumber" <?php if(($i+1) == $pageNum) echo "style=\"color:red;\"" ?>>
                                    <?php echo $i+1; ?>
                                    <input type="submit" value="" class="bottoneForm"> <!--Struttura di ogni bottone -->
                                    <input type="hidden" value="<?php echo $i+1; ?>" name="pageNum">
                                    <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                                    <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                                </div>
                            </form>
                            <?php
                        }
                    ?>
                </div>
                <form action="homepage-users-visualizzaBacheca.php">
                    <div class="next">
                        Next  
                        <?php 
                            if($pageNum == $maxPageNum){ ?>
                                <input type="button" onclick="window.alert('Non esistono pagine successive!')" class="bottoneForm"> <?php
                            }else{ ?>
                                <input type="submit" value="" class="bottoneForm"> <?php
                            }?>
                        <input type="hidden" value="<?php echo $pageNum+1; ?>" name="pageNum">
                        <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                        <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                    </div>
                </form>
            </div>
            <!--Lista dei commenti-->
            <div class="commentContainer">
                <?php 
                
                for($i=($pageNum-1)*5; $i < min($pageNum*5,count($listaCommenti)); $i++){  
                    $autore = null;
                    $comment = $listaCommenti[$i];
                    if($comment->matricolaStudente > 0){
                        $autore = getStudenteFromMatricola($comment->matricolaStudente);
                        if(isset($_SESSION['matricola']))
                            $voto = getVotoCommento($comment->id,$_SESSION['matricola']);
                    }
                    ?>
                    <div class="comment">
                        <div class="commentAuthorData">
                            <div class="authorDataElement">
                                <?php echo isset($autore) ? 'Nome: '.$autore->nome : 'da Moderatore'?>
                            </div>
                            <div class="authorDataElement">
                                <?php echo isset($autore) ? 'Matricola: '.$autore->matricola : 'N/A'?>
                            </div>
                            <div class="authorDataElement">
                                <?php echo isset($autore) ? 'Reputazione: '.$autore->reputazioneTotale : 'N/A'?>
                            </div>
                            <div class="authorDataElement">
                                <?php echo isset($autore) ? 'Corso di Laurea: '.getNomeCorsoDiLaureaByID($autore->idCorsoLaurea) : 'N/A'?>
                            </div>
                        </div>
                        <div class="commentContent">
                            <div class="commentTopBar">
                                <div class="commentTime">
                                    <?php echo  isset($autore) ? "{$comment->data} · Voto Totale : {$comment->accordoMedio}" : $comment->data ?> 
                                </div>
                                <?php if ($_SESSION['loginType'] == 'Studente' && isset($autore) && $autore->matricola != $_SESSION['matricola']) { ?>
                                    <div class="commentTime" style="justify-content: flex-end;">
                                        Il tuo voto:  
                                    </div> 
                                    <div id="vote<?php echo $comment->id?>" class="commentVoteContainer" onclick="modifyVote('',<?php echo $comment->id?>,<?php echo $autore->matricola?>)">
                                        <?php echo isset($voto) ?$voto->accordo : 0;?>
                                    </div>
                                    <div id="stars<?php echo $comment->id?>" class="commentVoteContainer" style="display:none;">
                                        <div class="stars">
                                            <form action="">
                                                <input class="star star-5" id="star-5" type="radio" name="star" onclick="modifyVote('5',<?php echo $comment->id?>,<?php echo $autore->matricola?>)"/>
                                                <label class="star star-5" for="star-5"></label>
                                                <input class="star star-4" id="star-4" type="radio" name="star" onclick="modifyVote('4',<?php echo $comment->id?>,<?php echo $autore->matricola?>)"/>
                                                <label class="star star-4" for="star-4"></label>
                                                <input class="star star-3" id="star-3" type="radio" name="star" onclick="modifyVote('3',<?php echo $comment->id?>,<?php echo $autore->matricola?>)"/>
                                                <label class="star star-3" for="star-3"></label>
                                                <input class="star star-2" id="star-2" type="radio" name="star" onclick="modifyVote('2',<?php echo $comment->id?>,<?php echo $autore->matricola?>)"/>
                                                <label class="star star-2" for="star-2"></label>
                                                <input class="star star-1" id="star-1" type="radio" name="star" onclick="modifyVote('1',<?php echo $comment->id?>,<?php echo $autore->matricola?>)"/>
                                                <label class="star star-1" for="star-1"></label>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="commentText" id="commentText<?php echo $comment->id?>">
                                <?php echo $comment->corpo;?>
                            </div>
                            <div class="commentText" id="editTextForm">
                                <textarea id="commentInput<?php echo $comment->id?>" form="editTextForm<?php echo $comment->id?>" style="display:none;" required><?php echo $comment->corpo;?></textarea>
                            </div>
                            <?php if($_SESSION['loginType'] == 'Amministratore' || $_SESSION['loginType'] == 'Segretario') { ?>
                                <div class="adminTools">
                                    <form action="deleteComment.php" method="POST">
                                        <img src="bin.png" alt="err">
                                        <input type="submit" name="deleteComment" value="">
                                        <input type="hidden" value="<?php echo $_GET["pageNum"];?>" name="pageNum"> 
                                        <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                                        <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                                        <input type="hidden" value="<?php echo $comment->id?>" name="idComment"> 
                                    </form>
                                    <form action="" name="editTextForm<?php echo $comment->id?>">
                                        <img src="edit.png" alt="err">
                                        <input type="submit" value="" onclick="editComment(<?php echo $comment->id?>)">
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="formContainer">
                <div class="formBorder">
                    <div class="formTitle">
                        Contribuisci al post
                    </div>
                    <form action="insertComment.php" method="POST" id='inserisciComm'>
                        <textarea name="corpo" id="corpo" placeholder="Testo" form='inserisciComm' required></textarea>
                        <input type="submit" name="insertComment">
                        <input type="hidden" value="<?php echo $_GET["pageNum"];?>" name="pageNum"> 
                        <input type="hidden" value="<?php echo $_GET["idCorso"]; ?>" name="idCorso">
                        <input type="hidden" value="<?php echo $_GET["idPost"]; ?>" name="idPost">
                    </form>
                </div>
            </div>   
        </div>
    </div>
</div>
</body>
</html>
<script>
    async function modifyVote(voto,id,idAutore) {
        if(document.getElementById("vote"+id).style.display == "none"){
            await delay(0.7);
            document.getElementById("stars"+id).style.display = "none";
            document.getElementById("vote"+id).style.display = "flex";

            document.getElementById("vote"+id).textContent = voto;

            //In questo id contiene il voto da sovrascrivere (ATTENZIONE, Bisogna modificare anche il voto medio!!!)
            console.log(voto +" "+id);
            //Possiamo usare uno script esterno volendo
            jQuery.ajax({
                        url: 'ajaxHandler.php',
                        type: 'POST',
                        data: jQuery.param({newVote: voto, id:id, autore:idAutore,richiesta: "modificaVotoPost"}), 
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            console.log(response);
                        },
                        error: function () {
                            console.log("error");
                        }});

        }else{     
            document.getElementById("stars"+id).style.display = "flex";
            document.getElementById("vote"+id).style.display = "none";
        }
    }
    function delay(n){
    return new Promise(function(resolve){
        setTimeout(resolve,n*1000);
    });
    }
    function editComment(id) {
        
        if(document.getElementById("commentText" +id ).style.display == "none"){
            document.getElementById("commentText"+id).style.display = "flex";
            document.getElementById("commentInput"+id).style.display = "none";

            //Dobbiamo lanciarea la jquery
            _newText = $("#commentInput"+id).val();
            document.getElementById("commentText"+id).textContent = _newText;

            //Possiamo usare uno script esterno volendo
            jQuery.ajax({
                        url: 'ajaxHandler.php',
                        type: 'POST',
                        data: jQuery.param({newText: _newText, id:id, richiesta: "modificaContenutoPost"}), 
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            console.log("Success");
                        },
                        error: function () {
                            console.log("error");
                        }});

        }else{
            document.getElementById("commentText"+id).style.display = "none";
            document.getElementById("commentInput"+id).style.display = "flex";
        }
        event.preventDefault();
    }
    function editPost(id){
        event.preventDefault();
        if(document.getElementById("postText").style.display != "none"){
            document.getElementById("postText").style.display = "none";
            document.getElementById("postInput").style.display = "flex";
        }else{
            document.getElementById("postText").style.display = "flex";
            document.getElementById("postInput").style.display = "none";

            //Eseguiamo la modifica

            _newText = $("#postInput").val();
            document.getElementById("postText").textContent = _newText;

            //Possiamo usare uno script esterno volendo
            jQuery.ajax({
                        url: 'ajaxHandler.php',
                        type: 'POST',
                        data: jQuery.param({newText: _newText, id:id, richiesta: "modificaPost"}), 
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        success: function (response) {
                            console.log("Success");
                        },
                        error: function () {
                            console.log("error");
                        }});
        }
    }
</script>