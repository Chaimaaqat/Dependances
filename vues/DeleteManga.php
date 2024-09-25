<html>
<?php
require_once '../persistance/DialogueBD.php';

try {
    $undlg= new DialogueBD();
    $mesgenre = $undlg->getTousLesgenres();
    $mesdessinateur = $undlg->getTousLesDessinateur();
    $messcenariste = $undlg->getTousLesScenariste();
} catch (Exception $e) {
    $erreur=$e->getMessage();
}

echo"test";




if (isset($_GET['id'])  )
{
    try {
    $id_manga = $_GET['id'];





    $undlg->supprManga($id_manga);

    echo "ok";

    #    header("location: listerMangas.php");

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
<?php require_once("menu.html");

echo "$id_manga"?>





</body>
