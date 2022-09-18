<?php 
    include('VCITitre.php');
    include('ConnectBDD.php');

?>
<?php
    $titrefilm = $_GET['film'];
    $erreur = "";

    $reponse1 = $cnx->query('select * from film join typefilm ON film.CODE_TYPE_FILM = typefilm.CODE_TYPE_FILM where TITRE_FILM = "'.$titrefilm.'"');
    $results1 = $reponse1->fetch(PDO::FETCH_OBJ);

    if($results1 === false){
        $titrefilm = 'Die Hard 1';
        $erreur = "<h4 class='text-primary'>Nous n'avons pas trouvé votre film, nous vous en avons choisi un autre.</h4>";
    }

    $reponse = $cnx->query('select * from film join typefilm ON film.CODE_TYPE_FILM = typefilm.CODE_TYPE_FILM where TITRE_FILM = "'.$titrefilm.'"');
    $results = $reponse->fetch(PDO::FETCH_OBJ);
    $idfilm = $results->ID_FILM;

    $reponsereal = $cnx->query('select distinct * from star INNER JOIN film  ON ID_REALIS = ID_STAR where TITRE_FILM = "'.$titrefilm.'"');
    $resultsreal = $reponsereal->fetch(PDO::FETCH_OBJ);
?>
<div class="container text-center mt-5">
    <h1 class="mb-3">Voici le film que vous avez sélectionné :</h1>
    <?=$erreur?>
    <div class="container d-flex justify-content-center">
        <div class="rounded border shadow-sm d-flex align-items-center">    
            <div>
                <img width="80" height="120" src="pictures/FilmMiniatures/<?=$results->LIB_TYPE_FILM.'/'.$results->REF_IMAGE?>" alt="affiche">
            </div>
            <div class="px-2">
            <table class="align-middle">
                <tr>
                    <td>Titre :</td>
                    <td><?php echo $titrefilm?></td>
                </tr>
                <tr>
                    <td>Année de sortie : </td>
                    <td><?php echo $results->ANNEE_FILM;?></td>
                </tr>
                <tr>
                    <td>Réalisateur :</td>
                    <td><?php echo $resultsreal->PRENOM_STAR . " " . $resultsreal->NOM_STAR ?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Veuillez saisir vos coordonnées :</h2>
        <div class="border shadow-sm rounded w-50 mx-auto pb-3 px-2">
            <form action="VCIResa4.php?choixfilm=<?=$_GET['film']?>&amp;idfilm=<?=$idfilm?>" method="post">
                <table class="mx-auto table table-borderless align-middle"> 
                    <tr>
                        <td>Nom d'adhérent :</td>
                        <td><input name="nom" class="form-control" type="text" placeholder="Saisissez votre nom" aria-label="default input example"></td>
                    </tr>
                    <tr>
                        <td>Numéro d'adhérent :</td>
                        <td><input name="numadh" class="form-control" type="text" placeholder="Saisissez votre numéro d'adhérent" aria-label="default input example"></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Réserver</button>
                <button type="button" onclick="history.go(-1);" class="btn btn-secondary">Annuler</button>
            </form>
        </div>
    </div>
</div>
<?php include('VCIFooter.php')?>