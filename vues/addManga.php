<html>
<?php


require_once '../persistance/DialogueBD.php';
$undlg = new DialogueBD();
$mesgenre = $undlg->getTousLesgenres();
$mesdessinateur = $undlg->getTousLesDessinateur();
$messcenariste = $undlg->getTousLesScenariste();

if (isset($_POST['titre']) && isset($_POST['id_genre']) && isset($_POST['prix']) )
{ try {
    $undlg = new DialogueBD();
    $titre = $_POST['titre'] ;
    $id_genre = $_POST['id_genre'] ;
    $prix = $_POST['prix'] ;
    $id_dessinateur = $_POST['id_dessinateur'] ;
    $id_scenariste = $_POST['id_scenariste'] ;
    $dateparution = $_POST['dateParution'] ;
    $couverture = $_POST ['couverture'] ;



    $ajoutOK = $undlg->addUnManga($id_dessinateur ,$id_scenariste ,$prix, $titre, $dateparution, $couverture, $id_genre);
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
<h1 style="text-align: center">Ajouter un Manga</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addmanga.php"
          method="POST">
        <div class="form-group">
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre" class="form-control" required autofocus>
            </div>
        </div>
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
            <label class="col-md-3 control-label">Prix :</label>
            <div class="col-md-3">
                <input name="prix" type="text" class="form-control" required
                       autofocus/>


            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3 control-label">Dessinateur : </label>
            <div class="col-md-3">
            <select name="id_dessinateur" size="1" class="form-control">
                <?php foreach ($mesdessinateur as $ligne){
                    $id_dessinateur = $ligne["id_dessinateur"];
                    $lib_dessinateur = $ligne["nom_dessinateur"];
                    $prenom = $ligne["prenom_dessinateur"];
                    echo "<option value=$id_dessinateur> $lib_dessinateur $prenom       </option>";

                }
                ?>
            </select>   </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Id_scénariste</label>
            <div class="col-md-3">
                <select name="id_scenariste" size="1" class="form-control">
                    <?php foreach ($messcenariste as $ligne){
                        $id_scenariste = $ligne["id_scenariste"];
                        $nom_scenariste = $ligne["nom_scenariste"];
                        $prenom_scenariste = $ligne["prenom_scenariste"];
                        echo "<option value=$id_scenariste> $nom_scenariste $prenom_scenariste   </option>";

                    }
                    ?>
                </select>   </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Dateparution</label>
            <div class="col-md-3">
            <input name="dateParution" type="date" class="form-control"
               autofocus/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Courverture.jpg : </label>
            <div class="col-md-3">
            <input name="couverture" type="text" class="form-control"
               autofocus/>

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                <button type="button" class="btn btn-default btn-primary" onclick="javascript:window.location='../index.php';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
                 </div>
        </div>
    </form>
</div>



</body>
