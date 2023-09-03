<?php
include_once 'db.php';

try {
  // Prepare and execute the SQL query to fetch items
  $stmt = $pdo->query("SELECT * FROM painting");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
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
<title>All Paintings</title>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include 'nav_bar.php'; ?>
  <div class="container">
    <div class="row">
      <h1>Items List</h1>
      <div class="col-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Finished</th>
              <th scope="col">Media</th>
              <th scope="col">Artist</th>
              <th scope="col">Style</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) : ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['finished']; ?></td>
                <td><?php echo $item['media']; ?></td>
                <td><?php echo $item['artist']; ?></td>
                <td><?php echo $item['style']; ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($item['image']); ?>" width="100" height="100"></td>
                <td>
                  <form action="edit_painting.php?id=<?php echo $item['id']; ?>" method="POST">
                    <input type="submit" name="Edit" class="button" value="Edit" />
                  </form>
                  <form onsubmit="return confirm('Please confirm you want to delete <?php echo $item['title']; ?>?')" action="PaintingController.php?action=delete&id=<?php echo $item['id']; ?>" method="POST">
                    <input type="submit" name="Delete" class="button" id="delete" value="Delete" />
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