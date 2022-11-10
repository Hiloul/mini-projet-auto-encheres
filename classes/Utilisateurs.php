<?php
class Utilisateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;

    public function __construct($nom, $prenom, $email, $password, $id=0)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
    }

    public function save($pdo) {
        $query = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)");
        $query->bindValue(':nom', $this->nom,PDO::PARAM_STR);
        $query->bindValue(':prenom', $this->prenom,PDO::PARAM_STR);
        $query->bindValue(':email', $this->email,PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($this->password, PASSWORD_DEFAULT),PDO::PARAM_STR);
        return $query->execute();
    }

    public function delete() {
        
    }
}