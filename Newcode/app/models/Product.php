<?php
class Product
{
 private $db;

 public function __construct()
 {
     $this ->db=new Database;
 }



    public function getProduct($id)
    {
        $this->db->query("SELECT * FROM products WHERE Id = :id");
        $this->db->bind(':id' , $id);
        $result = $this->db->resultSet();
        
        return $result;
    }

    public function ViewProducts()
    {
        $this->db->query("SELECT * FROM products");
        $result = $this->db->resultSet();
        return $result;
    }

    public function AddProduct($data)
    {
    
        $this->db->query('INSERT INTO products (Name, Image, Type) 
        VALUES (:Fname, :img, :cat )');
        $this->db->bind(':Fname',$data['Name']);
        $this->db->bind(':img',$data['Image']);
        $this->db->bind(':cat',$data['Type']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct($data){

        $this->db->query('UPDATE products SET Name = :pname , Image = :img, Type = :prtype  WHERE Id = :Id');
        $this->db->bind(':pname' , $data['productName']);
        $this->db->bind(':img' , $data['productImage']);
        $this->db->bind(':prtype' , $data['productCategory']);
        
        
        $this->db->bind(':Id' , $data['Id']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }

    public function deleteProduct($id)
        {
            $this->db->query('DELETE FROM products WHERE Id = :id');
            $this->db->bind(':id',$id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    

 
}