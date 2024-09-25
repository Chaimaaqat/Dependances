<html>
<?php


require_once '../persistance/DialogueBD.php';
$undlg = new DialogueBD();
$mesgenre = $undlg->getTousLesgenres();
$mesdessinateur = $undlg->getTousLesDessinateur();
$messcenariste = $undlg->getTousLesScenariste();

if (isset($_POST['lib_genre']) && isset($_POST['id_genre']) )
{ try {
    $undlg = new DialogueBD();
    $id= $_POST['id_genre'];
    $genre = $_POST['lib_genre'] ;




    $ajoutOK = $undlg->addUnGenre($id, $genre);
    header("location: listerMangas.php");

} catch (Exception $e) {
    $erreur = $e->getMessage();
    echo $erreur;
}
}


if (isset($_POST['id_scenariste']) && isset($_POST['nom_scenariste']) && isset($_POST['prenom_scenariste']) )
{ try {
    $id_scenariste= $_POST['id_scenariste'];
    $prenom_scenariste = $_POST['prenom_scenariste'];
    $nom_scenariste = $_POST['nom_scenariste'];




    $ajoutOK = $undlg->addUnScenariste( $id_scenariste ,  $nom_scenariste , $prenom_scenariste );
    header("location: listerMangas.php");

} catch (Exception $e) {
    $erreur = $e->getMessage();
    echo $erreur;
}
}

?>
<head>
    <?php require_once 'header.php';?>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php require_once("menu.html");?>
<h1 style="text-align: center">Ajouter un Genre</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addGenre.php"
          method="POST">


        <?php foreach ($mesgenre as $ligne){
            $id_genre = $ligne["id_genre"];
            $id_genre = $id_genre + 1;
            $lib_genre = $ligne["lib_genre"];


        }
        echo "pour insérer un genre veuillez selectionner $id_genre ";
        ?>

        <div class="form-group">
            <label class="col-md-3 control-label">id_genre : </label>
            <div class="col-md-3">
                <input type="text" name="id_genre" class="form-control" >
            </div>
        </div>




        <div class="form-group">
            <label class="col-md-3 control-label">lib_genre : </label>
            <div class="col-md-3">
                <input type="text" name="lib_genre" class="form-control" >
            </div>
        </div>



        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btnprimary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                <button type="button" class="btn btn-default btn-primary" onclick="javascript:window.location='../index.php';">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </form>



    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addGenre.php"
          method="POST">


        <?php foreach ($messcenariste as $ligne){
            $id_scenariste = $ligne["id_scenariste"];
            $id_scenariste = $id_scenariste + 1 ;
            $nom_scenariste = $ligne["nom_scenariste"];
            $prenom_scenariste = $ligne["prenom_scenariste"];


        }
        echo "pour insérer un scenariste veuillez selectionner $id_scenariste  ";
        ?>

        <div class="form-group">
            <label class="col-md-3 control-label">id du scénariste : </label>
            <div class="col-md-3">
                <input type="text" name="id_scenariste" class="form-control" >
            </div>
        </div>




        <div class="form-group">
            <label class="col-md-3 control-label"> nom du scénriste </label>
            <div class="col-md-3">
                <input type="text" name="nom_scenariste" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> prenom du scénriste </label>
            <div class="col-md-3">
                <input type="text" name="prenom_scenariste" class="form-control" >
            </div>
        </div>




        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btnprimary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                <button type="button" class="btn btn-default btn-primary" onclick="javascript:window.location='../index.php';">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </form>




</div>



</body>

