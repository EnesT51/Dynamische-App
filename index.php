<?php
    include("Database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <h1> 
    <?php
        $pdo = PDO();
        $data = $pdo->prepare("SELECT COUNT(*) FROM characters");
        $data->execute();
        foreach($data as $d){
            echo "Alle {$d["0"]} characters uit de database";
        }
    ?>
    </h1>
</header>
<div id=container>
        <?php
            $pdo = PDO();
            $data = $pdo->prepare("SELECT * FROM characters");
            $data->execute();
            foreach($data as $d){
                $name = urlencode($d["name"]);
                echo "<a class=item href=character.php?name={$name}>

                <div class=left>
                    <img class=avatar src=resources/images/{$d["avatar"]}>
                </div>

                <div class=right>
                    <h2>{$d["name"]}</h2>
                    <div class=stats>
                        <ul class=fa-ul>
                            <li><span class=fa-li><i class=fas fa-heart></i></span> {$d["health"]}</li>
                            <li><span class=fa-li><i class=fas fa-fist-raised></i></span> {$d["attack"]}</li>
                            <li><span class=fa-li><i class=fas fa-shield-alt></i></span> {$d["defense"]}</li>
                        </ul>
                    </div>
                </div>
                <div class=detailButton><i class=fas fa-search></i> bekijk</div>
                </a>";
            }
        ?>
</div>
<footer>&copy; [E.T51] 2023</footer>
</body>
</html>