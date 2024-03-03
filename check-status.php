<?php
include_once('admin/includes/config.php');

if(isset($_POST['submit'])){
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $numerotelephone = $_POST['phonenumber'];
    $datadereservation = $_POST['bookingdate'];
    $heuredereservation = $_POST['bookingtime'];
    $noadultes = $_POST['noadults'];
    $noenfants = $_POST['nochildrens'];
    $numerodereservation = mt_rand(100000000,9999999999);
    
    // Code pour l'insertion
    $query = mysqli_query($con, "insert into tblbookings(bookingNo,fullName,emailId,phoneNumber,bookingDate,bookingTime,noAdults,noChildrens) values('$numerodereservation','$nom','$email','$numerotelephone','$datadereservation','$heuredereservation','$noadultes','$noenfants')");
    
    if($query){
        echo '<script>alert("Votre commande a été envoyée avec succès. Numéro de réservation : "+"'.$numerodereservation.'")</script>';
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Quelque chose s'est mal passé. Veuillez réessayer.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Système de Réservation de Tables de Restaurant</title>
    <!-- Balises meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Stylesheets -->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <!-- // Fin de la feuille de style -->
    <!-- Calendrier -->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <!-- // Calendrier -->
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <!-- CSS pour le script de temps -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body>
    <h1 class="header-w3ls">RTBS | Vérifier le Statut</h1>
    <div class="appointment-w3">
        <form action="search-result.php" method="post">
            <div class="personal">
                <div class="main">
                    <div class="form-left-w3l">
                        <input type="text" class="top-up" name="searchdata" placeholder="Rechercher par numéro de réservation ou numéro de contact" required="">
                    </div>
                </div>
                <div class="btnn">
                    <input type="submit" value="Rechercher" name="submit">
                </div>
                <div class="copy">
                    <p>Vérifiez votre réservation <a href="check-status.php" target="_blank">ici</a></p>
                </div>
                <div class="copy">
                    <p>Panel d'administration <a href="admin/" target="_blank">Connectez-vous ici</a></p>
                </div>
            </div>
        </form>
    </div>

    <!-- js -->
    <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
    <!-- //js -->
    <!-- Calendrier -->
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
        });
    </script>
    <!-- // Calendrier -->
    <!-- Temps -->
    <script type="text/javascript" src="js/wickedpicker.js"></script>
    <script type="text/javascript">
        $('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
    </script>
    <!-- // Temps -->
</body>

</html>
