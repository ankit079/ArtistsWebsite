<?php
include_once 'db.php';
$searchText = trim($_POST["search_text"]);
$query = "SELECT * FROM artist WHERE artist_name LIKE :keyword";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':keyword', '%' . $searchText . '%', PDO::PARAM_STR);
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
</body>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles.css" media="screen" type="text/css" rel="stylesheet">
</head>
<title>Search Results</title>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php 
    include 'nav_bar.php'; 
    include 'artists_common.php';
    ?>
    <div class="container">
        <div class="row">
            <h1>Artist</h1>
            <div class="col-12">
                <?php foreach ($items as $item) : ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <img width="500" height="500" src="data:image/jpeg;base64,<?= base64_encode($item['portrait']); ?>">        
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 id="ID">ID</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['id']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Artist</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><a href="search_painting.php?searchkey=<?php echo urlencode($item['artist_name']); ?>"><?php echo $item['artist_name']; ?></a></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Life Span</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['lifespan']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Nationality</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['nationality']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <form action="view_artists.php" method="POST">
                                        <input type="submit" class="btn btn-primary" name="return" value="Return to Artists" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>