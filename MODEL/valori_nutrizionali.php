<?php
class Valori_Nutrizionali
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArchiveNutritionalValue()
    {
        $sql=sprintf("SELECT * FROM valore_nutrizionale WHERE 1=1");
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNutritionalValue($id)
    {
        $sql=sprintf("SELECT * FROM valore_nutrizionale WHERE id=:id");
        $stmt=$this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function setNutritionalValue($nome)
    {
        $sql = sprintf("INSERT INTO valore_nutrizionale (nome)
        VALUES (:nome)");
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        if ($stmt->execute())
        {
         return $stmt->rowCount();
        }
     else return "problemi";
    }
}
?>