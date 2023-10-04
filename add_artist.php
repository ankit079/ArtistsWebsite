<!DOCTYPE html>
<html>

<head>
    <title> Add Artist </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles.css" media="screen" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include_once 'nav_bar.php'; ?>
    <div class="container-fluid">
    <h3>Add a New Artist</h3>
    <form action="ArtistController.php?action=add" enctype="multipart/form-data" method="POST">
    <div class="row mb-3">
            <div class="col-md-2">
            <label for="artist_name" class="form-label">Artist Name: </label>
            </div>
            <div class="col-auto">
            <input type="text" class="form-control" name="artist_name" id="artist_name" placeholder="Enter Name" required>
            </div>
        </div>       
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="lifespan" class="form-label">Life Span: </label>
            </div>
            <div class="col-auto">
            <input type="text" class="form-control" name="lifespan" id="lifespan" placeholder="Enter Lifespan" required>
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="nationality" class="form-label">Nationality: </label>
            </div>
            <div class="col-auto">
            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter Nationality" required>
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col-md-2">
            <label for="portrait" class="form-label">Portrait: </label>
            </div>
            <div class="col-auto">
            <input type="file" class="form-control" name="portrait" id="portrait" required>
            </div>
        </div>   
        <div>  
        <input type="submit" class="btn btn-primary" class="form-control" value="Add Artist" name="submit">
        </div>
    </form>
    </div>
</body>
</html>