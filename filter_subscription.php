<?php
include_once 'db.php';

// Get the selected subscription from the form
if (isset($_POST['subscription'])) {
    $selectedOption = $_POST['subscription'];  
    try {
        // Prepare and execute the SQL query to fetch items
            $query = "SELECT * FROM subscriber WHERE  $selectedOption = 1";
            $stmt = $pdo->prepare($query);
            // $stmt->bindParam(':artist', $selectedArtist); 
            $stmt->execute();
          //    $stmt = $pdo->query($sql);
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
       catch (PDOException $e) {
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
<title>All Paintings</title>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php 
  include 'nav_bar.php'; 
  include 'subscription_common.php'
  ?>
  <div class="container">
    <div class="row">
    <h1>Filtered Subscriptions</h1>
      <div class="col-12">
        <table class="table table-striped">
          <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Monthly Newsletter</th>
              <th scope="col">Breaking News</th>
              <th scope="col">Unsubscribe</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($items as $item) : ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['monthly_newsletter']; ?></td>
                <td><?php echo $item['breaking_news']; ?></td>
                <td><?php echo $item['unsubscribe']; ?></td>          
                <td>
                  <form action="SubscriptionController.php?action=delete&email=<?php echo $item['email']; ?>" method="POST">
                    <input type="submit" name="delete" class="btn btn-danger" class="button" id="delete" value="Delete" <?php if ($item['unsubscribe'] == '0'){ ?> disabled <?php   } ?>  />
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