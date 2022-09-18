<?php 
    include('VCITitreAdmin.php');
    include('ConnectBDD.php');

    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
                
    $reponse = $cnx->query('select LOGIN_ADMIN, PASS_ADMIN from admin where LOGIN_ADMIN = "'.$login.'" and PASS_ADMIN = "'.$mdp.'"');
    $results = $reponse->fetch(PDO::FETCH_OBJ);

    if($results === false){
        header('Location: VCIAccueil.php');
    }
?>
<div class='container border mt-5 text-center'>
    <h1>Bienvenue sur le site Administration du Vidéo-club</h1>
</div>
<?php 
    include('VCIFooter.php')
?>
