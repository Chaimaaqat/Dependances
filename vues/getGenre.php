<html>
<?php


require_once '../persistance/DialogueBD.php';
$undlg = new DialogueBD();
$mesgenre = $undlg->getTousLesgenres();

?>
<head>
    <?php require_once 'header.php';?>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php require_once("menu.html");?>
<h1 style="text-align: center">liste manga par genre </h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="getGenrepost.php"
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
            </div>
        </div>
    </form>
</div>



</body>

