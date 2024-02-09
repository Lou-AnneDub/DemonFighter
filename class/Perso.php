<?php 

    class Perso {
        protected $id_perso;
        protected $nom_perso;
        protected $type_perso;
        protected $pv_perso;
        protected $atk_perso;
        protected $bonus_perso;
        protected $img_perso;

    // Setters 
        public function setId_perso($id){
            $this->id_perso = $id;
        }

        public function setNom_perso ($nom){
            $this->nom_perso = $nom;
        }

        public function setType_perso ($type){
            $this->type_perso = $type;
        }

        public function setPv_perso ($pv){
            $this->pv_perso = $pv;
        }

        public function setAtk_perso ($atk){
            $this->atk_perso = $atk;
        }

        public function setBonus_perso ($bonus){
            $this->bonus_perso = $bonus;
        }

        public function setImg_perso ($img){
            $this->img_perso = $img;
        }

    // Getters
        public function getId_perso(){
            return $this->id_perso;
        }

        public function getNom_perso (){
            return $this->nom_perso;
        }

        public function getType_perso (){
            return $this->type_perso;
        }

        public function getPv_perso (){
            return $this->pv_perso;
        }

        public function getAtk_perso (){
            return $this->atk_perso;
        }

        public function getBonus_perso (){
            return $this->bonus_perso;
        }

        public function getImg_perso (){
            return $this->img_perso;
        }

    // Hydratation
        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

    // Constructeur 
        public function __construct(array $donnees) {
            return $this->hydrate($donnees);
        }

    // Méthodes
        public function attaquer(Personnage $perso){
            $perso->setPV($perso->pv_perso -= $this->atk_perso); 
        }

    }