    <?php

    include 'nav_bar.php';
    include_once 'db.php';

    // Retrieve id value from querystring parameter
    $id = $_GET['id'];

    try {
        // Prepare and execute the SQL query to fetch items
        $query = "SELECT * FROM painting WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($item);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    try {
        $artists = $pdo->query("SELECT artist_name FROM artist")->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $pdo = null;
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title> Edit Painting </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="styles.css" media="screen" type="text/css" rel="stylesheet">
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <div class="container-fluid">
            <h3>Edit painting</h3>
            <form action="PaintingController.php?action=edit" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="id" class="form-label" aria-readonly="true">Id: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="id" id="id" readonly value=<?php echo $item['id']; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="title" class="form-label">Title: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="title" id="title" value=<?php echo $item['title']; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="finished" class="form-label">Finished: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="finished" id="finished" value=<?php echo $item['finished']; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="media" class="form-label">Media: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="media" id="media" value=<?php echo $item['media']; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="artist" class="form-label">Artist: </label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="artist" value="<?php echo $item['artist']; ?>" id="artist" required>
                            <?php
                            foreach ($artists as $artist) {
                                echo "<option value=\"$artist\">$artist</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="style" class="form-label">Style: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="style" id="style" value=<?php echo htmlspecialchars($item['style']); ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="image" class="form-label">Image: </label>
                    </div>
                    <div class="col-auto">
                        <input type="file" class="form-control" name="image" id="image" required>
                        <div>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['image']); ?>" width="100" height="100"/>
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" class="form-control" name="submit" value="Update Painting">
                    </div>
            </form>
        </div>
    </body>

    </html>