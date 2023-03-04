<?php
class Order
{
 private $db;

 public function __construct()
 {
     $this ->db=new Database;
 }

 public function InsOrder($data,$id)
 {
     $this->db->query('INSERT INTO orders (Ordered_By,base_product,Fabric,Colour, Printing, Quantity,additionalInfo,deliveryTime,Order_status) VALUES (:ob, :bp,:fabric, :colour, :printing, :quantity, :info,:dtime,:stat)');
    $this->db->bind(':ob',$id);
    $this->db->bind(':bp',$data['Base']);
     $this->db->bind(':fabric',$data['Fabric']);
     $this->db->bind(':colour',$data['Colour']);
     $this->db->bind(':printing',$data['Printing']);
     $this->db->bind(':quantity',$data['Quantity']);
     $this->db->bind(':info',$data['Info']);
     $this->db->bind(':dtime',$data['Time']);
     $this->db->bind(':stat',$data['Status']);

     $this->db->execute();
 } 

 public function SelectPrint()
 {
     $this->db->query("SELECT Type FROM printing");
    $row = $this->db->resultset();
   return $row;
 } 


public function SelectMenProducts()
{
    $this->db->query("SELECT * FROM products WHERE Type = 'Men' ");
    $row=$this->db->resultset();
    return $row;
}


public function SelectWomenProducts()
{
    $this->db->query("SELECT * FROM products WHERE Type='Women'");
    $row=$this->db->resultset();
    return $row;
}


public function SelectuniSexProducts()
{
    $this->db->query("SELECT * FROM products WHERE Type='uniSex'");
    $row=$this->db->resultset();
    return $row;
}

 public function getInfo($Id)
 {
     $this->db->query("SELECT * FROM products where Id=:id");
     $this->db->bind(':id',$Id);
     $row = $this->db->resultset();
     return $row;
 }

/* public function GetId($SS)
 {
     $this->db->query("SELECT DISTINCT products.Id FROM orders INNER JOIN products ON orders.base_product = products.Id WHERE products.Name=:bp");
     $this->db->bind(":bp",$SS);
     $row=$this->db->resultset();
     return $row;
 }
*/

public function get_Cart($Id)
{
    $this->db->query('SELECT orders.Id,orders.Ordered_By,  products.Image,orders.base_product,orders.Fabric,orders.Colour,orders.Printing,orders.Quantity,orders.additionalInfo,orders.deliveryTime,orders.Order_date,orders.Order_status from orders  INNER JOIN products ON orders.base_product=products.Name WHERE Ordered_By=:id');
    $this->db->bind(":id",$Id);
   $result= $this->db->resultset();
   return $result;
}
 
}
