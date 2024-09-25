
<?php
// PARTIE DONNES -----------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/dialogueBD.php';
$undlg = new DialogueBD();

try {
// on crée un objet référençant la classe DialogueBD

    $genre = $_POST['id_genre'];
    $mesmangas = $undlg-> getMangaParGenre($genre);
    $mesgenres = $undlg-> getGenre($genre);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE -->
<!DOCTYPE html>
<html>
<head>
    <?php require_once 'header.php';?>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> affichage manga</title>
</head>
<body>
<?php require_once("menu.html");?>.

<div class="container">
    <h1>Liste de mes Mangas</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>dessinateur</th>
            <th>scenariste</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $lignes="";
        foreach ($mesmangas as $manga)
        { // On parcourt la collection
            $lignes .= "<tr>\n"; // On construit une ligne <tr>
            $lignes .= "<td> $manga[id_manga]</td>\n"; // On construit un <td>
            $lignes .= "<td> $manga[titre]</td>\n";
            $lignes .= "<td> $manga[lib_genre]</td>\n";
            $lignes .= "<td> $manga[nom_dessinateur]</td>\n";
            $lignes .= "<td> $manga[nom_scenariste]</td>\n";
            $lignes .= "<td> $manga[prix] </td>\n";
            $lignes .= "</tr>\n";
        }
        echo utf8_encode($lignes); // On affiche tous les <tr>
        ?>
        </tbody>
    </table>
</div>

</body>
</html>