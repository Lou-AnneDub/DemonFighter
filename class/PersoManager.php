<?php 
    class PersoManager {
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function addPerso(Perso $perso) :bool {
            $query = "INSERT INTO Perso (nom_perso, type_perso, pv_perso, atk_perso, img_perso) VALUES (:nom_perso, :type_perso, :pv_perso, :atk_perso, :img_perso)";
            $result = $this->db->prepare($query);
            $result->bindValue(':nom_perso', $perso->getNom_perso(), PDO::PARAM_STR);
            $result->bindValue(':type_perso', $perso->getType_perso(), PDO::PARAM_STR);
            $result->bindValue(':pv_perso', $perso->getPV_perso(), PDO::PARAM_INT);
            $result->bindValue(':atk_perso', $perso->getATK_perso(), PDO::PARAM_INT);
            $result->bindValue(':img_perso', $perso->getImg_perso(), PDO::PARAM_STR);
        
            return $result->execute();
        }

        public function deletePerso($id) : bool {
            $query = "DELETE FROM Perso WHERE id_perso = :id_perso";
            $result = $this->db->prepare($query);
            $result->bindValue(':id_perso', $id, PDO::PARAM_INT);
        
            if ($result->execute()) {
                return true; // Succès
            } else {
                // Afficher des messages d'erreur pour le débogage
                echo "Erreur lors de la suppression du personnage. ";
                print_r($result->errorInfo());
                return false; // Échec
            }
        }

        public function modifyPerso(Perso $newPerso) : bool {
            $query = "UPDATE Perso SET nom_perso = :nom_perso, type_perso = :type_perso, pv_perso = :pv_perso, atk_perso = :atk_perso WHERE id_perso = :id_perso";
            $result = $this->db->prepare($query);
    
            $result->bindValue(':nom_perso', $newPerso->getNom_perso(), PDO::PARAM_STR);
            $result->bindValue(':type_perso', $newPerso->getType_perso(), PDO::PARAM_STR);
            $result->bindValue(':pv_perso', $newPerso->getPV_perso(), PDO::PARAM_INT);
            $result->bindValue(':atk_perso', $newPerso->getATK_perso(), PDO::PARAM_INT);
            $result->bindValue(':id_perso', $newPerso->getId_perso(), PDO::PARAM_INT);
    
            return $result->execute();
        }

        public function getAllPerso() :array {
            $query = "SELECT * FROM Perso";
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOnePerso($id) :Perso {
            $query = "SELECT * FROM Perso WHERE id_perso = :id_perso";
            $result = $this->db->prepare($query);
            $result->bindValue(':id_perso', $id, PDO::PARAM_INT);
            $result->execute();

            $donnees = $result->fetch(PDO::FETCH_ASSOC);

            if ($donnees) {
                // Utiliser un tableau de données pour construire l'objet Personnage
                return new Perso($donnees);
            } else {
                // Gérer le cas où le personnage n'est pas trouvé
                throw new Exception("Personnage non trouvé avec l'ID : $id");
            }
        }
    }

?>