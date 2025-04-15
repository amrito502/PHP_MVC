<?php


require 'functions.php';
require 'router.php';



try {
    $dsn = "mysql:host=localhost;port=3306;dbname=my_app;charset=utf8mb4";
    $pdo = new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post) {
        echo "<li>". $post['desc'] ."</li>";
    }

//    echo '<pre>';
//    print_r($posts);
//    echo '</pre>';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
