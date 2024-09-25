<html>
<?php
require_once '../persistance/DialogueBD.php';

try {
    $undlg= new DialogueBD();
    $mesgenre = $undlg->getTousLesgenres();
    $messcenariste = $undlg->getTousLesScenariste();
} catch (Exception $e) {
    $erreur=$e->getMessage();
}

echo"test";




if (isset($_POST['id_genre'])   )
{
    try {


        $id_genre = $_POST['id_genre'];

        $nbmanga = $undlg->GenreUtiliser($id_genre);

        if ($nbmanga==0)
        {
            $undlg->supprGenre($id_genre);
        }



        #    header("location: listerMangas.php");

    } catch (Exception $e) {
        $erreur = $e->getMessage();
        echo $erreur;
    }
}


?>

<?php
if (isset($_POST['id_scenariste'])  )
{
    try {


        $id_scenariste = $_POST['id_scenariste'];

        $nbmanga1 = $undlg->scenaristeUtiliser($id_scenariste);

        if ($nbmanga==0)
        {
            $undlg->supprScenariste($id_scenariste);
        }


    } catch (Exception $e) {
        $erreur = $e->getMessage();
        echo $erreur;
    }
}


?>







<head>
    <?php require_once 'header.php';?>
    <title>Modifier un manga</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php require_once("menu.html");?>
<h1 style="text-align: center">supprimer un genre </h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="SupprGenre.php"
          method="POST">

        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <div class="col-md-3">
                <select type = "text" name="id_genre" size="1" class="form-control"  >
                    <?php foreach ($mesgenre as $ligne){
                        $id_genre = $ligne["id_genre"];
                        $lib_genre = $ligne["lib_genre"];
                        echo "<option value=$id_genre> $lib_genre     </option>";

                    }
                    ?>
                </select>            </div>
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
          name="mangaForm" action="SupprGenre.php"
          method="POST">

        <div class="form-group">
            <label class="col-md-3 control-label">scenariste : </label>
            <div class="col-md-3">
                <select type = "text" name="id_scenariste" size="1" class="form-control"  >
                    <?php foreach ($messcenariste as $ligne){
                        $id_scenariste = $ligne["id_genre"];
                        $nom_scenariste = $ligne["nom_scenariste"];
                        $prenom_scenariste = $ligne["prenom_scenariste"];
                        echo "<option value=$id_scenariste> $nom_scenariste $prenom_scenariste    </option>";

                    }
                    ?>
                </select>            </div>
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

