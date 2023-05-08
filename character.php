<?php
    include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - Bowser</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <h1>
        <?php
            $pdo = PDO();
            $c = $_GET["name"];
            $data = $pdo->prepare("SELECT * FROM characters WHERE name= '$c'");
            $data->execute();
            foreach($data as $d){
                    echo "<h1>{$d["name"]} </h1>";
            }
        ?> 
    </h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
    <?php
        $pdo = PDO();
        $name = $_GET["name"];
        $data = $pdo->prepare("SELECT * FROM characters WHERE name = '$name'");
        $data->execute();
        foreach($data as $d){
            echo "<div id=container>
            <div class=detail>
                <div class=left>
                    <img class=avatar src=resources/images/{$d["avatar"]}>
                    <div class=stats style=background-color:{$d["color"]}>
                        <ul class=fa-ul>
                            <li><span class=fa-li><i class=fas fa-heart></i></span> {$d["health"]}</li>
                            <li><span class=fa-li><i class=fas fa-fist-raised></i></span> {$d["attack"]}</li>
                            <li><span class=fa-li><i class=fas fa-shield-alt></i></span> {$d["defense"]}</li>
                        </ul>
                        <ul class=gear>
                            <li><b>Weapon</b>: {$d["weapon"]}</li>
                            <li><b>Armor</b>: {$d["armor"]}</li>
                        </ul>
                    </div>
                </div>";

            echo "<div class=right>
                    <p> {$d["bio"]}</p>
                </div>";
        }
    ?>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; [E.T51] 2023</footer>
</body>
</html>