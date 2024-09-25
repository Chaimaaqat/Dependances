<?php
require_once 'Connexion.php' ;
class DialogueBD
{
    public function getTousLesMangas()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from manga m join genre g on m.id_genre=g.id_genre order by id_manga";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listManga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listManga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function addUnManga(   $id_dessinateur ,$id_scenariste ,$prix, $titre, $dateparution, $couverture, $id_genre )
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO manga(  id_dessinateur ,id_scenariste ,prix, titre, dateparution, couverture, id_genre) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array(  $id_dessinateur ,$id_scenariste ,$prix, $titre, $dateparution, $couverture, $id_genre));


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }



    public function getTousLesgenres()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from genre";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getTousLesDessinateur()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from dessinateur";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

    }


    public function getTousLesScenariste()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from scenariste";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

    }

    public function getMangaParGenre($id_genre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM manga join genre on genre.id_genre = manga.id_genre join dessinateur on manga.id_dessinateur = dessinateur.id_dessinateur join scenariste on manga.id_scenariste = scenariste.id_scenariste WHERE genre.id_genre=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id_genre));
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getGenre($genre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct lib_genre from genre where id_genre = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($genre));
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

    }





    public function getMangaParId($id_manga)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM mangas WHERE id_manga = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id_manga));
            $manga = $sth->fetch(PDO::FETCH_ASSOC);
            return $manga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function ModifierUnManga($titre, $id_genre, $id_scenariste ,$id_dessinateur,  $prix, $id_manga)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE manga SET titre = ?, id_genre = ?, id_scenariste = ? ,id_dessinateur = ?, prix = ? WHERE id_manga = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($titre, $id_genre, $id_scenariste, $id_dessinateur,  $prix, $id_manga));
            return true;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            return false;
        }
    }

    public function addUnGenre( $id , $lib_genre )
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO genre( id_genre , lib_genre) VALUES (?, ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id , $lib_genre));


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }


    public function addUnScenariste( $id_scenariste ,  $nom_scenariste , $prenom_scenariste )
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO scenariste( id_scenariste, nom_scenariste , prenom_scenariste ) VALUES (?, ? , ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_scenariste ,  $nom_scenariste , $prenom_scenariste ));


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }


    public function supprManga( $id_manga )
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM manga WHERE id_manga = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_manga));


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }



    public function GenreUtiliser( $id_genre )
    {
        try {

            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga  WHERE id_genre = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_genre));
            $manga = $sth->fetch(PDO::FETCH_ASSOC);
            return $manga;


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }



    public function supprGenre( $id_genre )
    {
        try {

            $conn = Connexion::getConnexion();
            $sql = "DELETE * FROM manga WHERE id_genre = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_genre));



        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }


    public function scenaristeUtiliser( $id_scenariste )
    {
        try {

            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga WHERE id_scenariste = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_scenariste));
            $manga = $sth->fetch(PDO::FETCH_ASSOC);
            return $manga;


        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }


    public function supprScenariste( $id_scenariste )
    {
        try {

            $conn = Connexion::getConnexion();
            $sql = "DELETE * FROM manga WHERE id_scenariste = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array( $id_scenariste));



        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }
    }




}




            
   
   
