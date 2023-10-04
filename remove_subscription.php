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
    <?php include 'nav_bar.php'; ?>

    <main class="form-signin w-50 m-auto">
        <form action="SubscriptionController.php?action=unsubscribe" method="POST">
            <h1 class="h3 mb-3 fw-normal">Unsubscribe Service</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your Name">
                <label for="firstname">Name</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>  
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="Remove" id="unsubscribe" name="unsubscribe" required>
                <label class="form-check-label" for="unsubscribe">
                    Remove Subscription
                </label>
            </div>
            <button class="btn btn-primary w-20 py-2" type="submit">Unsubscribe</button>
        </form>
    </main>
</body>
</html>