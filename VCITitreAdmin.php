<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
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
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="pictures/DesignVideoClub/VCLogo.gif" alt="logo" width="50" height="44"></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="VCINewFilm.php">Nouveau film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VCIAccueil.php">Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Autre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="float-start">
            <img src="pictures/DesignVideoClub/Popcorn-Picks.jpg" alt="popcorn">
        </div>
        <div class="float-end">
            <?PHP
                echo $jours." ".$mois." ".$dateDuJour["year"]."<br>";
            ?>
        </div>
    </div>
    <script src="admin.js"></script>