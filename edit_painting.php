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
        <h1>Edit painting</h1>
        <form action="PaintingController.php?action=edit" method="POST" enctype="multipart/form-data">
            <label for="id" aria-readonly="true">Id: </label>
            <input type="text" name="id" id="id" readonly value=<?php echo $item['id']; ?>><br>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value=<?php echo $item['title']; ?>><br>
            <label for="finished">Finished: </label>
            <input type="text" name="finished" id="finished" value=<?php echo $item['finished']; ?>><br>
            <label for="media">Media: </label>
            <input type="text" name="media" id="media" value=<?php echo $item['media']; ?>><br>
            <label for="artist">Artist: </label>
            <input type="text" name="artist" id="artist" value=<?php echo $item['artist']; ?>><br>
            <label for="style">Style: </label>
            <input type="text" name="style" id="style" value=<?php echo $item['style']; ?>><br>
            <label for="image">Image: </label>
            <input type="file" name="image" id="image"><br>
            <input type="submit" name="submit" value="Update Painting">
        </form>
    </body>
    </html>