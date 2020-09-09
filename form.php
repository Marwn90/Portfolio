<p><a href="index.php">- Retour vers l'acceuil</a></p>
<link rel="stylesheet" type="text/css" href="portfolio.css">
<?php include("connectbdd.php") ?>
<?php include("register.php") ?>




<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espaces-member', 'root', '');

if(!empty($_POST))
{
    $prenom = htmlspecialchars($_POST['nom']);
    $nom = htmlspecialchars($_POST['prenom']);
    $entreprise = htmlspecialchars($_POST['entreprise']);
    $Poste = htmlspecialchars($_POST['poste']);
    //$telephone = cha1($_POST['telephone']);

    $prenomlength = strlen($prenom);
    if($prenomlength <= 255)
    {
        
        /* if($mail == $mail2)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL));
        }
        else
        {
            $erreur = "Vos addresses mail ne correspondent pas !";
        } */
    }
    else
    {
        $erreur = "Votre prenom ne doit pas depasser 255 caracteres !";
    }
}
else
{
    $erreur = "Tous les champs doivent etre completés";
}
?>


</body>
</html>