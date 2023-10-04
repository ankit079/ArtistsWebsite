<?php
require_once 'ArtistModel.php';

$action = $_GET['action'] ?? '';

$model = new ArtistModel();

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $artist_name = $_POST['artist_name'];
    $lifespan = $_POST['lifespan'];
    $nationality = $_POST['nationality'];
	$portrait = file_get_contents($_FILES["portrait"]["tmp_name"], 'r');
    $model->addArtist($artist_name, $lifespan, $nationality, $portrait);
    header('Location: view_artists.php');
    exit();
} 

if ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id= $_POST['id'];
    $artist_name = $_POST['artist_name'];
    $lifespan = $_POST['lifespan'];
    $nationality = $_POST['nationality'];
	$portrait = file_get_contents($_FILES["portrait"]["tmp_name"], 'r');
    $model->updateArtist($id, $artist_name, $lifespan, $nationality, $portrait);
    header('Location: view_artists.php');
    exit();
} 

if ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id= $_GET['id'];
    $model->deleteArtist($id);
    header('Location: view_artists.php');
    exit();
} 
?>
