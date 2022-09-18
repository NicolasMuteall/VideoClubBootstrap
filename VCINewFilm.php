<?php 
    include('VCITitreAdmin.php');
    include('ConnectBDD.php');
    
    $reponse = $cnx->query('select * from typefilm');
    $donnees = $reponse->fetchall(PDO::FETCH_OBJ);

    $reponsereal = $cnx->query("select * from star");
    $resultsreal = $reponsereal->fetchall(PDO::FETCH_OBJ);
?>
<div class='container border mt-5 text-center'>
    <h1>Saisie d'un nouveau film :</h1>
    <div class="border shadow-sm rounded w-50 mx-auto pb-3 px-2 mt-3">
            <form action="" method="post">
                <table class="mx-auto table table-borderless align-middle"> 
                    <tr>
                        <td>Titre :</td>
                        <td><input name="titre" class="form-control" type="text" placeholder="Saisissez le titre du film" aria-label="default input example"></td>
                    </tr>
                    <tr>
                        <td>Type de film :</td>
                        <td>
                            <select name="choixtype" class="form-select text-center">
                                <?php foreach($donnees as $resultats){?>
                                    <option value="<?=$resultats->CODE_TYPE_FILM?>"><?=$resultats->LIB_TYPE_FILM?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Réalisateur :</td>
                        <td>
                            <select name="choixreal" class="form-select text-center">
                                <?php foreach($resultsreal as $resultatsreal){?>
                                    <option value="<?=$resultatsreal->ID_STAR?>"><?=$resultatsreal->PRENOM_STAR." ".$resultatsreal->NOM_STAR?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Année de sortie :</td>
                        <td><input name="" class="form-control" type="text" placeholder="Saisissez l'année de sortie du film" aria-label="default input example"></td>
                    </tr>
                    <tr>
                        <td>Affiche :</td>
                        <td><input name="titre" class="form-control" type="text" placeholder="" aria-label="default input example"></td>
                    </tr>
                    <tr>
                        <td>Résumé :</td>
                        <td><div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-secondary">Recommencer</button>
            </form>
        </div>
</div>
<?php 
    include('VCIFooter.php');
?>