<?php
require_once 'db.php';

class SubscriptionModel
{
    public function getAllSubscriptions()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM subscriber');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSubscription($name, $email, $newsletter, $breakingnews, $unsubscribe)
    {        
        global $pdo;
        $emailExists = false;
        $stmt = $pdo->query('SELECT * FROM subscriber');
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item)
        {
            if($item['email'] == $email)
            {
                $emailExists = true;     
            }
        }
        if($emailExists == false)
        {
            $sql = "INSERT INTO subscriber(name, email, monthly_newsletter, breaking_news, unsubscribe) VALUES (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $newsletter, $breakingnews, $unsubscribe]);
        }
        else {
            $sql = "UPDATE subscriber SET name=?, monthly_newsletter=?,breaking_news=? WHERE email=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $newsletter, $breakingnews, $email]);
        }
    }

    public function updateSubscription($unsubscribe, $email)
    {
        global $pdo;
        $sql = "UPDATE subscriber SET unsubscribe=? WHERE email=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$unsubscribe, $email]);
    }

    public function deleteSubscription($email)
    {
        global $pdo;
        $sql = "DELETE FROM subscriber WHERE email=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
    }

    public function getAllUnsubscribers()
    {
        global $pdo;
        try {
            // Prepare and execute the SQL query to fetch items
            $query = "SELECT * FROM subscriber WHERE unsubscribe=:unsubscribe";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', 1);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function authenticateUser($email, $password)
    {
        global $pdo;
        try {
            // Prepare and execute the SQL query to fetch items
            $query = "SELECT * FROM user WHERE email=:email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verify the password
            // if ($user && password_verify($password, $user["password"])) {
                if ($user && ($password === $user["password"])) {
                // Login successful
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["email"] = $user["email"];

                if ($user["role"] === "admin") {
                    $_SESSION["is_admin"] = true; // Set admin flag in the session
                }

                header("location: view_subscription.php"); // Redirect to a view subscriptions page or dashboard
            } else {
                // Login failed
                $error = "Invalid email or password.";
                header("location: login.php"); // Redirect to login page
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
