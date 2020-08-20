<?php 
    //me connecte à la base de donnée 
    //crée notre variable $pdo 
    include("db.php");
    


    //crée notre propre fonction style var_dump()
    //reçoit la variable à afficher en argument
    function debug($var){
        //la balise <pre> permet de conserver l'indentation
        echo '<pre style="background-color: #000; color: lightgreen; padding: 10px;">';
        print_r($var);
        echo '</pre>';
    }

    //appelle notre fonction de debug pour afficher les données 
    //soumises par le formulaire
    debug($_POST);

    //tout en haut du fichier, on traite le formulaire 
    //seulement s'il est soumis

    //on récupère les données du formulaire dans nos variables
    //à nous

    //si on a des données dans $_POST, 
    //c'est que le form a été soumis
    if(!empty($_POST)){
        //par défaut, on dit que le formulaire est entièrement valide
        //si on trouve ne serait-ce qu'une seule erreur, on 
        //passera cette variable à false
        $formIsValid = true;

        $lastname = strip_tags($_POST['nom']);
        $firstname = strip_tags($_POST['prenom']);
        $company = strip_tags($_POST['entreprise']);
        $post = strip_tags($_POST['poste']);
        $email = strip_tags($_POST['mail']);
        $message = strip_tags($_POST['message']);

        //tableau qui stocke nos éventuels messages d'erreur
        $errors = [];

        //si le lastname est vide...
        if(empty($lastname) ){
            //on note qu'on a trouvé une erreur ! 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre nom de famille !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($lastname) <= 1){
            $formIsValid = false;
            $errors[] = "Votre nom de famille est court, très court. Veuillez le rallonger !";
        }
        elseif(mb_strlen($lastname) > 30){
            $formIsValid = false;
            $errors[] = "Votre nom de famille est trop long !";
        }

        //exactement pareil pour le prénom
        //si le firstname est vide...
        if(empty($firstname) ){
            //on note qu'on a trouvé une erreur ! 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre prénom !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($firstname) <= 1){
            $formIsValid = false;
            $errors[] = "Votre prénom est court, très court. Veuillez le rallonger !";
        }
        elseif(mb_strlen($firstname) > 30){
            $formIsValid = false;
            $errors[] = "Votre prénom est trop long !";
        }
              //exactement pareil pour entreprise
        //si le entreprise est vide...
        if(empty($company) ){
            //on note qu'on a trouvé une erreur ! 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre entreprise !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($company) <= 1){
            $formIsValid = false;
            $errors[] = "Votre entreprise est court, très court. Veuillez le rallonger !";
        }
        elseif(mb_strlen($company) > 30){
            $formIsValid = false;
            $errors[] = "Votre entreprise est trop long !";
        }
              //exactement pareil pour le poste
        //si le poste est vide...
        if(empty($post) ){
            //on note qu'on a trouvé une erreur ! 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre poste !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($post) <= 1){
            $formIsValid = false;
            $errors[] = "Votre poste est court, très court. Veuillez le rallonger !";
        }
        elseif(mb_strlen($post) > 30){
            $formIsValid = false;
            $errors[] = "Votre poste est trop long !";
        }  
            //exactement pareil pour le  message
        //si le message est vide...
        if(empty($message) ){
            //on note qu'on a trouvé une erreur ! 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre message !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($message) <= 1){
            $formIsValid = false;
            $errors[] = "Votre message est court, très court. Veuillez le rallonger !";
        
        }

        //validation de l'email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $formIsValid = false;
            $errors[] = "Votre email n'est pas valide !";
        }

//si le formulaire est toujours valide... 
if ($formIsValid == true){
    //on écrit tout d'abord notre requête SQL, dans une variable
    $sql = "INSERT INTO contacts
            (prenom, nom, entreprise, poste, email, message)
            VALUES 
            (:firstname, :lastname,:entreprise,:poste, :message,:email)";

    /*
    injection SQL dans le champs de mot de passe : 
    pass', '44', NOW()); DROP DATABASE kinoa; --
    */

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":firstname" => $firstname,
        ":lastname" => $lastname,
        ":entreprise" => $company, 
        ":poste" => $post,  
        ":email" => $email,
        ":message" => $message,  
    ]);
}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> FORM PHP</title>
</head>
<body>
    <div align="center">
        <h2>CONTACTS</h2>
        <br /><br /><br />
        <form method="POST" action="
        ">
        <table>
        <tr>
            <td align="right">
        <label for="Prenom">
        NOM:
        </label>
        </td>
        <td align="right">
          <input type="text"
          placeholder="Votre
          nom" id="nom" name
          ="nom" />
        </td>
        </tr>
        <tr>
            <td align="right">
        <label for="nom">
        PRENOM :
        </label>
        </td>
        <td align="right">
          <input type="text"
          placeholder="Votre
           prenom" id="prenom" name
          ="prenom" />
        </td>
        </tr>
        <tr>
            <td align="right">
        <label for="entreprise">
        Entreprise :
        </label>
        </td>
        <td align="right">
          <input type="text"
          placeholder="Votre
          entreprise" id="entreprise" name
          ="entreprise" />
        </td>
        </tr>
        <tr>
            <td align="right">
        <label for="poste">
        Poste:
        </label>
        </td>
        <td align="right">
          <input type="text"
          placeholder="Votre
          poste" id="poste" name
          ="poste" />
        </td>
        </tr>
        <tr>
            <td align="right">
        <label for="telephone">
        EMail :
        </label>
        </td>
        <td align="right">
          <input type="text"
          placeholder="Votre mail" id="mail" name
          ="mail" />
        </td>
        </tr>
        <tr>
            <td align="right">
        <label for="mail">
        
        
        <tr>
        <td>
    Message :
        </label>
        </td>
        <td align="right">
          <textarea type="textarea" cols="21" rows="6" placeholder="Votre message" id="message" name="message">

          </textarea>
         </tr>
        </td>
        <tr>
            <td align="right">
            <td align="center">
                <br />
                <input type="submit" name="forminscription"  value="Envoyez" />
            </td>
        </tr>
    </table>
    <br/>
</form>
</div>
<?php

?>
</body>
</html>


