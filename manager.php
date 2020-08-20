<?php

$sql = "INSERT INTO posts
                (title, content, picture, author_id, date_created) 
                VALUES 
                (:title, :content, :picture, :author_id, NOW())";
        
        $pdo = DbConnection::getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":content" => $content,
            ":picture" => $filename,
            ":author_id" => $_SESSION['user']['id'],
        ]);
?>