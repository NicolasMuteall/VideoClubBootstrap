<?php include('VCITitre.php')?>
<div class="container text-center mt-5">
    <h1>Sélectionnez le type de films que vous recherchez :</h1>
</div>
<?php
    include('ConnectBDD.php');
    $reponse = $cnx->query('select * from typefilm');
    $donnees = $reponse->fetchall(PDO::FETCH_OBJ);
?>
<div class="container mt-5 ms-5 d-flex justify-content-center">
    <div class="container">    
        <form action="VCIResa2.php" method="post">    
            <div class="container d-flex justify-content-center mb-3">    
                <select name="choixtype" class="form-select w-50 text-center">
                    <?php foreach($donnees as $resultats){?>
                    <option value="<?=$resultats->CODE_TYPE_FILM?>"><?=$resultats->LIB_TYPE_FILM?></option>
                    <?php
                    }?>
                </select>  
            </div>
            <div class="container d-flex justify-content-center"><button type="submit" class="btn btn-primary">Valider</button></div>
        </form>
    </div>
</div>
<?php include('VCIFooter.php')?>