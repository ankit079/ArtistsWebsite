<!DOCTYPE html>
<html>

<head>
    <title> Home Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles.css" type="text/css" media="screen" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include 'nav_bar.php';
    $action = $_GET['action'] ?? '';
    if($action === 'subscribe')
    {
        echo ("Subscription added successfully.");
    }
    if($action === 'unsubscribe')
    {
        echo ("Subscription removed. Administrator will be notified."); 
    }
    if($action === 'login')
    {
        echo ("Login failed. Only Administrator can access the subscription list.");
    }
    ?>
    <form action="index.php">
        <button class="btn btn-primary w-20 py-2" type="submit">OK</button>
    </form>
</body>
</html>