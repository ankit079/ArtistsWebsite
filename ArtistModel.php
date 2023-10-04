<?php
  require_once 'db.php';

class ArtistModel {
    public function getAllArtists() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM artist');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function addArtist($artist_name, $lifespan, $nationality, $portrait) {
		global $pdo;
		$sql = "INSERT INTO artist(artist_name, lifespan, nationality, portrait) VALUES (?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam('portrait', $portrait, PDO::PARAM_LOB);
		$stmt->execute([$artist_name, $lifespan, $nationality, $portrait]);       
    }

    public function updateArtist($id, $artist_name, $lifespan, $nationality, $portrait) {
        global $pdo;
            $sql = "UPDATE artist SET artist_name=?, lifespan=?, nationality=?, portrait=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('portrait', $portrait, PDO::PARAM_LOB);
            $stmt->execute([$artist_name, $lifespan, $nationality, $portrait, $id]);    

    }

    public function deleteArtist($id) {
        global $pdo;
        $sql = "DELETE FROM artist WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);    
    }
	
	public function getArtistById($id){
        global $pdo;
        try {
            // Prepare and execute the SQL query to fetch items
            $query = "SELECT * FROM artist WHERE id=:id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>