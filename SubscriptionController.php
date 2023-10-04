<?php
require_once 'SubscriptionModel.php';

$action = $_GET['action'] ?? '';

$model = new SubscriptionModel();

if ($action === 'subscribe' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['firstname'];
    $email = $_POST['email'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $breakingnews = isset($_POST['breakingnews']) ? 1 : 0;
    $unsubscribe = 0;
    $model->addSubscription($name, $email, $newsletter, $breakingnews, $unsubscribe);
    header('Location: index.php');
    exit();
} 

if ($action === 'unsubscribe' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $unsubscribe = isset($_POST['unsubscribe']) ? 1 : 0;
    $model->updateSubscription($unsubscribe,$email);
    header('Location: index.php');
    exit();
} 

if ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_GET['email'];
    $model->deleteSubscription($email);
    header("location: view_subscription.php");
    exit();
} 

if($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $model->authenticateUser($email, $password);    
}
?>