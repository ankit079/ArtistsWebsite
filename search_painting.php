<?php
include_once 'db.php';
$searchText = trim($_POST["search_text"]);
$query = "SELECT * FROM painting WHERE title LIKE :keyword OR artist LIKE :keyword";
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
    <?php include 'nav_bar.php'; ?>
    <div class="container">
        <div class="row">
            <h1>Items List</h1>
            <div class="col-12">
                <?php foreach ($items as $item) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <img src="data:image/jpeg;base64,<?= base64_encode($item['image']); ?>">
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>ID</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['id']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Title</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['title']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Finished</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['finished']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Media</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['media']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Artist</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['artist']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Style</h4>
                                    </div>
                                    <div class="col-sm">
                                        <h4><?php echo $item['style']; ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                        <form action="view_paintings.php" method="POST">
                                            <input type="submit" class="btn btn-primary" name="return" value="Return to Paintings" />
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