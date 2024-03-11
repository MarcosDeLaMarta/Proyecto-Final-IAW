<?php
include('db/db.php');

class ComicsDAO {

    private $db_con;

    public function __construct(){
        $this->db_con = Database::connect();
    }

    public function getAllComics(){
        $stmt = $this->db_con->prepare("SELECT * FROM comics");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $comics = array();

        return $stmt->fetchAll();
    }

    public function getComicById($id){
        $stmt = $this->db_con->prepare("SELECT * FROM comics WHERE id_comic = $id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertComic($titulo, $autor, $precio, $imagen, $genero, $descripcion) {
        $stmt = $this->db_con->prepare("INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion) 
                                        VALUES (:titulo, :autor, :precio, :imagen, :genero, :descripcion)");
    
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':descripcion', $descripcion);
    
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;  
        }
    }
    
    
}



?>
    