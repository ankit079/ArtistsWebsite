<!DOCTYPE html>
<html>

<head>
    <title> Add Painting </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles.css" media="screen" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include_once 'nav_bar.php'; ?>
    <h1>Add a New Painting</h1>
    <form action="PaintingController.php?action=add" enctype="multipart/form-data" method="POST">
        <label for="title">Title: </label>
        <input type="text" name="title" id="title" placeholder="Enter Title"><br>
        <label for="finished">Finished: </label>
        <input type="text" name="finished" id="finished" placeholder="Enter Finished Date"><br>
        <label for="media">Media: </label>
        <input type="text" name="media" id="media" placeholder="Enter media"><br>
        <label for="artist">Artist: </label>
        <input type="text" name="artist" id="artist" placeholder="Enter artist"><br>
        <label for="style">Style: </label>
        <input type="text" name="style" id="style" placeholder="Enter style"><br>
        <label for="image">Image: </label>
        <input type="file" name="image" id="image"><br>
        <input type="submit" value="Add Painting" name="submit">
    </form>
</body>

</html>