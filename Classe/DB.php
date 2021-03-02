<?php

class DB {
    private string $host = "localhost";
    private string $db = "live_bdd_objet";
    private string $user = "root";
    private string $password = "";

    private static ?PDO $dbInstance = null;

    /**
     * DBstatic constructor.
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // permet de recuperer les données dans un tableau associatif

        }
        catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Retourne une instance de l'objet PDO
     */
    public static function getInstance(): ?PDO {
        if (null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * On empêche de laisser d'autres dev de cloner l'objet
     * pour s'assurer qu'on a bel et bien qu'une seule instance de la connexion db.
     */
    public function __clone() {

    }
}