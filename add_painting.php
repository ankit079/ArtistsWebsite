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

    <div class="container-fluid">
    <h3>Add a New Painting</h3>
    <form action="PaintingController.php?action=add" enctype="multipart/form-data" method="POST">
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="title" class="form-label">Title: </label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="finished" class="form-label">Finished: </label>
            </div>
            <div class="col-auto">
            <input type="text" class="form-control" name="finished" id="finished" placeholder="Enter Finished Date" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="media" class="form-label">Media: </label>
            </div>
            <div class="col-auto">
            <input type="text" name="media" class="form-control" id="media" placeholder="Enter media" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="artist" class="form-label">Artist: </label>
            </div>
            <div class="col-auto">
            <select class="form-select" name="artist" id="artist" required>
			<option value="" disabled selected>Select an Artist</option>
			<?php
			include_once 'db.php';
			$artists = $pdo->query("SELECT artist_name FROM artist")->fetchAll(PDO::FETCH_COLUMN);
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
            <input type="text" name="style" class="form-control" id="style" placeholder="Enter style" required>
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="image" class="form-label">Image: </label>
            </div>
            <div class="col-auto">
            <input type="file" name="image" class="form-control" id="image" required>
            </div>
        </div> 
        <div>
        <input type="submit" class="btn btn-primary" value="Add Painting" name="submit">
        </div>
    </form>
    </div>
</body>

</html>