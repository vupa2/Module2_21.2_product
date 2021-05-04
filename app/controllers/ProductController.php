<?php


namespace app\controllers;


use app\models\DBConnection;
use app\models\Product;
use app\models\ProductDB;

class ProductController
{
    public $productDB;
    
    public function __construct()
    {
        $connection = new DBConnection();
        $this->productDB = new ProductDB($connection->connect());
    }
    
    public function index()
    {
        $products = $this->productDB->getAll();
        ob_start();
        include_once __DIR__ . '/../views/index.php';
        return ob_get_clean();
    }
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product($_POST['name'], $_POST['price'], $_POST['quantity']);
            if ($this->productDB->add($product)) {
                $message = 'Product Added';
            } else {
                $message = 'Product Add Failed';
            }
        }
        
        ob_start();
        include_once __DIR__ . '/../views/add.php';
        return ob_get_clean();
    }
    
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $data = $this->productDB->getById($id);
            $product = new Product($data['name'], $data['price'], $data['quantity']);
        } else {
            $product = new Product($_POST['name'], $_POST['price'], $_POST['quantity']);
            $id = $_POST['id'];
            if ($this->productDB->update($id, $product)) {
                $message = 'Product Updated';
            } else {
                $message = 'Product Update Failed';
            }
        }
        
        ob_start();
        include_once __DIR__ . '/../views/edit.php';
        return ob_get_clean();
    }
    
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productDB->delete($_POST['id']);
        }
        header('Location: /');
        exit;
    }
}