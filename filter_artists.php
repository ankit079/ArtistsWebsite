<?php
include_once 'db.php';

// Get the selected nationality from the form
if (isset($_POST['nationality'])) {
    $selectedNationality = $_POST['nationality'];  
    try {
        // Prepare and execute the SQL query to fetch items
        $query = "SELECT * FROM artist WHERE nationality = :nationality";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nationality', $selectedNationality); 
        $stmt->execute();
      //    $stmt = $pdo->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }  
}

// Get the selected lifespan from the form
if (isset($_POST['lifespan'])) {
    $selectedLifespan = $_POST['lifespan'];  
    try {
		
		$period = substr($selectedLifespan, 0, 2);
		$query = "SELECT * FROM artist WHERE SUBSTRING(lifespan, 1, 2) = :period";		
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':period', $period, PDO::PARAM_INT);
        $stmt->execute();
      //    $stmt = $pdo->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
		// debugging
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }  
}

// Close the connection
 $pdo = null;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="styles.css" media="screen" type="text/css" rel="stylesheet">
</head>
<title>All Artists</title>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php 
  include 'nav_bar.php';
  include 'artists_common.php'
  ?>
  <div class="container">
    <div class="row">
    <h1>Artists</h1>
      <div class="col-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Artist</th>
              <th scope="col">LifeSpan</th>
              <th scope="col">Nationality</th>
              <th scope="col">Portrait</th>
			  <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) : ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['artist_name']; ?></td>
                <td><?php echo $item['lifespan']; ?></td>
                <td><?php echo $item['nationality']; ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($item['portrait']); ?>" width="100" height="100"></td>
                <td>
                  <form action="edit_painting.php?id=<?php echo $item['id']; ?>" method="POST">
                    <input type="submit" name="Edit" class="btn btn-info" class="button" value="Edit" />
                  </form>
                  <form action="PaintingController.php?action=delete&id=<?php echo $item['id']; ?>" method="POST">
                    <input type="submit" name="Delete" class="btn btn-danger" class="button" value="Delete"/>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>