<?php 
    include('VCITitreAdmin.php');
    include('ConnectBDD.php');
?>

<div class='container border mt-5 text-center'>
    <h1 class='mb-3'>Saisie d'un nouveau film :</h1>
    <?php
            $titre = $_POST['titre'];
            $type = $_POST['choixtype'];
            $real = $_POST['choixreal'];
            $annee = $_POST['annee'];
            $affiche = $_FILES['affiche'];
            $resume = $_POST['resume'];
            $error = false;

            $reponse = $cnx->query("select AUTO_INCREMENT from information_schema.TABLES where TABLE_NAME = 'film'");
            //Affiche l'ID du prochain film ajouté
            $results = $reponse->fetch(PDO::FETCH_OBJ);
            //var_dump($results);

            if(!preg_match('/./', $titre)){
                echo "<h5>Le titre doit être renseigné.</h5><br>";
                $error = true;
            }
            if(!preg_match('/^[0-9]{4}$/', $annee) || !preg_match('/./', $annee)){
                //Si c'est pas des chiffres ou s'il y a plus de 4 chiffres ou si c'est vide :
                echo "<h5>L'année doit être renseignée et le format doit être correct.</h5><br>";
                $error = true;
            }else{
                $error = false;
            }
            if(!empty($_FILES['affiche'])) {
                $nameFile = $_FILES['affiche']['name'];
                $typeFile = $_FILES['affiche']['type'];
                $sizeFile = $_FILES['affiche']['size'];
                $tmpFile = $_FILES['affiche']['tmp_name'];
                $errFile = $_FILES['affiche']['error'];
        
                $extensions = ['png', 'jpg', 'jpeg'];
                $typeimg = ['image/png', 'image/jpg', 'image/jpeg'];
        
                $extension = explode('.', $nameFile);
        
                $max_size = 100000;

                if(!in_array($typeFile, $typeimg)) {
                    echo "<h5>Type de ficher non autorisé.</h5><br>";
                    $error = true;
                }
            }
            if($_FILES['affiche']['size'] === 0){
                echo "<h5>Une image doit-être ajoutée.</h5><br>";
                $error = true;
            }
            if(!$error){ 
                move_uploaded_file($tmpFile, 'C:\wamp64\www\EX_PHP\VideoBootstrap\pictures\AddFilms\ ' .uniqid() . '.' . strtolower(end($extension) ) );

                $sql = "INSERT into film (TITRE_FILM, ANNEE_FILM, ID_REALIS, CODE_TYPE_FILM, RESUME, REF_IMAGE)
                VALUES ('$titre', '$annee', '$real', '$type', '$resume', '$nameFile')";
                $cnx->exec($sql);
                /*Si suppression d'un film, il faut faire la requête "ALTER TABLE 'nom de la table' AUTO_INCREMENT=0;" pour
                reinitialiser l'auto-increment*/
                echo "<h2>Film ajouté avec succès !</h2><br>";
            }
    ?>
    <div class="mt-2 mb-2">
        <button type="button" onclick="history.go(-1);" class="btn btn-secondary">Retour</button>
    </div>
</div>    
<?php 
    include('VCIFooter.php');
?>