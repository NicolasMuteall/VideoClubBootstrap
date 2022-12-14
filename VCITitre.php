<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: #f8f9fa;">
    <?PHP
        date_default_timezone_set("Europe/Paris");
        $dateDuJour = getdate();

        $mois = "";
        $jours = "";

        if ($dateDuJour["mon"] = 9){
            $mois = "Septembre";
        } else{
            $mois = $dateDuJour["mon"];
        }
        if ($dateDuJour["mday"] < 10){
            $jours = "0".$dateDuJour["mday"];
        } else{
            $jours = $dateDuJour["mday"];
        }
    ?>
    <nav class="navbar navbar-expand-lg" style="background-color: #dfe7fd;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="pictures/DesignVideoClub/VCLogo.gif" alt="logo" width="50" height="44"></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="VCIAccueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VCIResa.php">Réserver un film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VCIConstr.php">Les boutiques VC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VCIConstr.php">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VCIConstr.php">Nous contacter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Admin</a>
                    </li>
                </ul>
                <form action="VCIResa3.php" method='GET' class="d-flex">
                    <input class="form-control me-2" name="film" type="text" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="float-start">
            <img class='rounded img-fluid' src="pictures/DesignVideoClub/Popcorn.png" alt="popcorn">
        </div>
        <div class="float-end">
            <?PHP
                echo $jours." ".$mois." ".$dateDuJour["year"]."<br>";
            ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto" id="staticBackdropLabel">Connexion Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="VCIAdmin.php" method="POST" class="">
                        <div class="modal-body">                    
                            <div class="d-flex justify-content-center">
                                <table class="table table-borderless align-middle text-center">
                                    <tr>
                                        <td>Login :</td>
                                        <td><input class="form-control" name="login" type="text" placeholder="Saisissez votre login"></td>
                                    </tr>
                                    <tr>
                                        <td>Mot de passe :</td>
                                        <td><input type="password" name="mdp" class="form-control" placeholder="Saisissez votre mot de passe"></td>
                                    </tr>
                                </table>    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Effacer</button>
                            <button type="submit" class="btn btn-primary">GO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="admin.js"></script>-->



    

    