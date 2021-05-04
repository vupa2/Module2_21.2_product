<?php


namespace app\models;


use PDO;

class ProductDB
{
    public $connection;
    
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    public function getAll()
    {
        $sql = "SELECT * FROM my_mvc.phones";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id)
    {
        $sql = "SELECT * FROM my_mvc.phones WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
    public function add(Product $product)
    {
        $sql = "INSERT INTO my_mvc.phones(name, price, quantity) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $product->name);
        $statement->bindValue(2, $product->price);
        $statement->bindValue(3, $product->quantity);
        return $statement->execute();
    }
    
    public function update($id, Product $product)
    {
        $sql = "UPDATE my_mvc.phones SET name = ?, price = ?, quantity = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->quantity);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM my_mvc.phones WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}