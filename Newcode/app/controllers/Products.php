<?php
class Products extends Controller 
{

    

    
public function __construct() {
    $this->productModel = $this->model('Product');
}

public function index() {
    $data = [
        'title' => 'Home page'
    ];

    $this->view('products/index', $data);
}




public function admin_panel_products(){
    
$data= $this->productModel->ViewProducts();
                                                                        
                                                                        
                                                                        
$this->view('products/admin_panel_products',$data);
                                                                        
                                                                        
                                                                    
}

public function admin_panel_products_addform(){
        

                  
            
    // Add product in database
  $data = [];
                  
  $this->view('products/admin_panel_products_addform',$data);
                  
                  }


public function admin_panel_products_add(){
        

    $data = [
            'Name' => $_POST['name'],
            'Type'=> $_POST['categories'],
            'Image'=> $_POST['Image']
      ];
            
       // Add product in database
        if($this->productModel->AddProduct($data)){
            header('Location: http://localhost/mvcframework/products/admin_panel_products');
                        }
        else{

            die("Manga");
        }
          
                                        
            $this->view('products/admin_panel_products',$data);
                                        
                                        }

 public function admin_panel_products_edit(){
        

                  $data = $this->productModel->getProduct($_GET['id']);
            
      // Add product in database
      $id = $_GET['id'];
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
                                 
          $data = [

              'productName' => $_POST['Product_Name'],
              'productImage' => $_POST['Image'],
              'productCategory' => $_POST['categories'],

              'Id' => $id
  
           ];
                          
                                        // Add product in database
       if($this->productModel->updateProduct($data)){
       header('Location: http://localhost/mvcframework/products/admin_panel_products');
      }
      
      }
      $this->view('products/admin_panel_products_edit',$data);
                                                          
                                                          }       
                                                          
                                                          public function admin_panel_products_delete(){
        
                                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                                                       
                                                             
                                                                                
                                                                                              // Add product in database
                                                             if($this->productModel->deleteProduct($_GET['id'])){
                                                             header('Location: http://localhost/mvcframework/products/admin_panel_products');
                                                            }
                                                            
                                                            }
                                                            $this->view('products/admin_panel_products');
                                                                                                            
                                                            }




}
