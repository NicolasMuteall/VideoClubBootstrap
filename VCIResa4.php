<?php 
    include('VCITitre.php');
    include('ConnectBDD.php');
    $film = $_GET['choixfilm'];
    $idfilm = $_GET['idfilm'];
    $nom = $_POST['nom'];
    $numadh = $_POST['numadh'];
    $today = date("Y-m-d"); 
    $finloc = date("Y-m-d", strtotime('+15 days'));

    $reponse = $cnx->query('select NUM_ADHERENT, PRENOM_ADHERENT from adherent where NUM_ADHERENT = "'.$numadh.'" and PRENOM_ADHERENT = "'.$nom.'"');
    $results = $reponse->fetch(PDO::FETCH_OBJ);

    $reponseloc = $cnx->query('select film.ID_FILM, TITRE_FILM from film INNER JOIN location ON location.ID_FILM = film.ID_FILM WHERE TITRE_FILM = "'.$film.'"');
    $resultsloc = $reponseloc->fetchall(PDO::FETCH_OBJ);
?>
<div class="container mt-3 text-center">
    <h1>Réservation de film</h1>
    <div class="mt-5">
        <?php
        if(!preg_match('/./', $numadh) || !preg_match('/./', $nom)){
            echo "<h2 style='color: blue; font-style: italic;'>Le numéro d'adhérent et le nom doivent être renseignés.</h2>";
        }elseif($results === false){
            echo "<h2 style='color: blue; font-style: italic;'>Attention: Les coordonnées saisies sont incorrectes.</h2>";
        }else { 
            if(empty($resultsloc)){ ?>
                <?php 
                    $sql = "insert into location (NUM_ADHERENT, ID_FILM, DEBUT_LOCATION, DATE_RETOUR)
                    VALUES ('$numadh', '$idfilm','$today', '$finloc')";
                    $cnx->exec($sql);
                    echo "Film réservé avec succès";
                ?>
                <h2 style='color: blue; font-style: italic;'><?php echo "Merci ".$nom." pour votre réservation.";?></h2>
                <p style='color: blue;'>Il ne vous plus qu'à passer en boutique pour récupérer votre exemplaire du film '<?php echo $film ?>'</p>
            <?php
            }else {
                echo "<h2 style='color: blue; font-style: italic;'>Attention: il y a déjà une réservation du film " ."'$film'"."</h2><br>";
            }       
        } 
        ?>
    </div>
    <div class="mt-5">
        <button type="button" onclick="history.go(-1);" class="btn btn-secondary">Retour</button>
    </div>
</div>
<?php include('VCIFooter.php')?>