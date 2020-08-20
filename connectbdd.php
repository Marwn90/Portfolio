<?php include("db.php")

?>
<?php

// requete pour afficher les recommandations

$sql = "SELECT * 
FROM contacts";
$stmt =  $pdo->prepare($sql);
$stmt->execute();

$content = $stmt->fetchAll();

?>