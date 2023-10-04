<?php
require_once 'PaintingModel.php';

$action = $_GET['action'] ?? '';

$model = new PaintingModel();

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $finished = $_POST['finished'];
    $media = $_POST['media'];
    $artist = $_POST['artist'];
    $style = $_POST['style'];
    $image = file_get_contents($_FILES["image"]["tmp_name"], 'r');
    $model->addPainting($title, $finished, $media, $artist, $style, $image);
    header('Location: view_paintings.php');
    exit();
} 

if ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id= $_POST['id'];
    $title = $_POST['title'];
    $finished = $_POST['finished'];
    $media = $_POST['media'];
    $artist = $_POST['artist'];
    $style = $_POST['style'];
    $image = file_get_contents($_FILES["image"]["tmp_name"], 'r');
    $model->updatePainting($id, $title, $finished, $media, $artist, $style, $image);
    header('Location: view_paintings.php');
    exit();
} 

if ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id= $_GET['id'];
    $model->deletePainting($id);
    header('Location: view_paintings.php');
    exit();
} 

?>