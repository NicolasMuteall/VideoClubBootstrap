<?php include('VCITitre.php')?>
<div class="container border text-center mt-5">
    <h1 class="mb-3">Sélectionnez le film que vous désirez réserver :</h1>
    <?php include('ConnectBDD.php')?>
    <?php
        $idCatFilm="";

        if (isset ($_POST["choixtype"]) || ($_POST["choixtype"] != ""))
        {
            $idCatFilm = $_POST["choixtype"];
        }
        else{
            header('Location: VCIAccueil.php');
        }

        $sqlRequest = 'SELECT * FROM film join star on star.ID_Star=film.ID_REALIS join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM where typefilm.CODE_TYPE_FILM =\''.$idCatFilm.'\'';
        // Préparation et execution de la requete
        $sqlResponse = $cnx->prepare($sqlRequest);
        $sqlResponse->execute();
        // recupération des informations au format objet
        $results = $sqlResponse->fetchAll(5);
    ?>
    <table class="table table-striped align-middle">
        <tr>
            <td>Titre du film</td>
            <td>Année de sortie</td>
            <td>Réalisateur</td>
            <td>Affiche</td>
        </tr>
        <?php
            foreach($results as $resultat) {?>
                <tr>
                    <td><a href="VCIResa3.php?film=<?=$resultat->TITRE_FILM?>"><?php echo $resultat->TITRE_FILM?></a></td>
                    <td><?php echo $resultat->ANNEE_FILM?></td>
                    <td><?php echo $resultat->PRENOM_STAR . " " . $resultat->NOM_STAR ?></td>
                    <td><img src="pictures/FilmMiniatures/<?=$resultat->LIB_TYPE_FILM.'/'.$resultat->REF_IMAGE?>" alt="affiche"></td>
                </tr>
            <?php 
            }
            ?>
    </table>
</div>
<?php include('VCIFooter.php')?>