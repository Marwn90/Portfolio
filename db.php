<?php
/*  //paramètres de connexion en constantes
    //soit localhost, soit l'IP du serveur
    define("DBHOST", "localhost");
    //utilisateur de la base (différent de PHPmyAdmin)  
    define("DBUSER", "root");
    //mot de passe
    define("DBPASS", "");           
    //nom de la base de données
    define("DBNAME", "portfoliobissiriou");  */

    $DbHost = "localhost";
    $DbUser = "root";
    $DbPass = "";
    $DbName = "portfoliobissiriou";
    
    try {
        //connexion à la base avec la classe PDO et le dsn
        $pdo = new PDO('mysql:host='.$DbHost.';dbname='.$DbName.';charset=UTF8', $DbUser, $DbPass, array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
        ));
    } catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
        echo 'Erreur de connexion : ' . $e->getMessage();
    }