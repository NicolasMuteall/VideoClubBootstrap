<?php 
    include('VCITitreAdmin.php');
    include('ConnectBDD.php');
?>

<div class='container border mt-5 text-center'>
    <h1>Saisie d'un nouveau film :</h1>
    <?php
            var_dump($_POST);
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
                echo "<h2>Le titre doit être renseigné.</h2><br>";
                $error = true;
            }
            if(!preg_match('/^[0-9]{4}$/', $annee) || !preg_match('/./', $annee)){
                //Si c'est pas des chiffres ou s'il y a plus de 4 chiffres ou si c'est vide :
                echo "<h2>L'année doit être renseignée et le format doit être correct.</h2><br>";
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
                var_dump($nameFile);
        
                $extensions = ['png', 'jpg', 'jpeg'];
                $type = ['image/png', 'image/jpg', 'image/jpeg'];
        
                $extension = explode('.', $nameFile);
        
                $max_size = 100000;

                if(in_array($typeFile, $type)) {
                    if(move_uploaded_file($tmpFile, 'C:\wamp64\www\EX_PHP\VideoBootstrap\pictures\AddFilms\ ' .uniqid() . '.' . strtolower(end($extension) ) ) ){ 
                        echo "This is uploaded!";
                    }else{ 
                        echo "failed";
                    }
                }else{
                    echo "Type non autorisé.";
                }
            }
            if(!$error){ 
                $sql = "INSERT into film (TITRE_FILM, ANNEE_FILM, ID_REALIS, CODE_TYPE_FILM)
                VALUES ('$titre', '$annee', '$real', '$type')";
                $cnx->exec($sql);
                /*Si suppression d'un film, il faut faire la requête "ALTER TABLE 'nom de la table' AUTO_INCREMENT=0;" pour
                reinitialiser l'auto-increment*/
                echo "<h2>Film ajouté avec succès !</h2><br>";
            }
        ?>
</div>    
<?php 
    include('VCIFooter.php');
?>