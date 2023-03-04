<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function register($data)
        {

        $this->db->query('INSERT INTO users (user_name, user_email, user_password, user_phone,user_type,profile_picture,hasTicket, user_balance) 
        VALUES (:UserName, :Email, :UserPassword, :UserPhone, :UserType, :ProfilePicture,:hasTicket,:user_balance)');
        $this->db->bind(':UserName',$data['UserName']);
        $this->db->bind(':Email',$data['Email']);
        $this->db->bind(':UserPassword',$data['Password']);
        $this->db->bind(':UserPhone',$data['PhoneNumber']);
        $this->db->bind(':UserType',"User");
        $this->db->bind(':ProfilePicture',"sss");
        $this->db->bind(':hasTicket',0);
        $this->db->bind(':user_balance',0);
       
       

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
        
        }

  

        public function login($Email, $password) {
            $this->db->query("SELECT * FROM users WHERE user_email = :email");
    
            //Bind value
            $this->db->bind(':email', $Email);
    
            $row = $this->db->single();
    
            $hashedPassword = $row->user_password;
         
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }

        public function logout(){
            
            unset($_SESSION['Id']);
            session_destroy();

            header('location:' . URLROOT . '/users/index');
        }


        

    public function ShowOrders(){
           $this->db->query("SELECT orders.Id, users.First_Name AS Ordered_By,orders.base_product,orders.Fabric,orders.Colour,orders.Printing ,orders.Quantity,orders.additionalInfo,orders.deliveryTime,orders.Order_date,orders.Order_status FROM orders INNER JOIN users ON Orders.Ordered_By=users.Id");
            $result = $this->db->resultSet();
            return $result;
        }
    public function ViewUsers()
    {
    

        $this->db->query("SELECT * FROM users");
        $result = $this->db->resultSet();
        return $result;
      
    }

    public function ViewAdmins()
    {
    

        $this->db->query("SELECT * FROM users WHERE User_Type = 'Admin'");
        $result = $this->db->resultSet();
        return $result;
      
    }
    
    public function UpdateOrder($id,$action){
        $this->db->query('UPDATE orders SET Order_status= :action WHERE Id = :id');
        $this->db->bind(':id',$id);
        $this->db->bind(':action',$action);
        if($this->db->execute())
        return true;
        else
        return false;

    }
    public function DeleteAdmin($id)
    {
    
      // require_once  APPROOT . '/views/includes/admin_panel_admins.php';
     
        $this->db->query('DELETE FROM users WHERE Id = :id');
        $this->db->bind(':id' , $id);
        if($this->db->execute())
        return true;
        else
        return false;
        
      
    }

    public function AddAdmin($data)
    {
    
      // require_once  APPROOT . '/views/includes/admin_panel_admins.php';
     
      $this->db->query('INSERT INTO users (user_name, user_email, user_phone,user_password,User_Type) 
      VALUES (:UserName, :UserEmail, :UserPhone, :Upassword, :Utype)');
      $this->db->bind(':UserName',$data['Fname']);
      $this->db->bind(':UserEmail',$data['UserEmail']);
      $this->db->bind(':UserPhone',$data['UserPhone']);
      $this->db->bind(':Upassword',$data['Password']);
      $this->db->bind(':Utype','Admin');
     

      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
        
      
    }




    public function findUserById($id) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE Id = :id');

        //Email param will be binded with the email variable
        $this->db->bind(':id', $id);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } 

     

    // public function updateUser($data){

    //     $this->db->query('UPDATE users SET First_Name = :Fname , Last_Name = :Lname, Brand_Name = :Bname, User_Number = :usernum, User_Email = :Email  WHERE Id = :Id');
    //     $this->db->bind(':Fname' , $data['Fnamee']);
    //     $this->db->bind(':Lname' , $data['Lnamee']);
    //     $this->db->bind(':Bname' , $data['Bnamee']);
    //     $this->db->bind(':usernum' , $data['usernume']);
    //     $this->db->bind(':Email' , $data['Emaile']);
    //     $this->db->bind(':Id' , $data['Id']);

    //     $this->db->execute();
        
      
        

        
    // }
    // public function UpdatePasswordinDB($data)
    // {
    //   $this->db->query('UPDATE users SET User_Password =:Pass  WHERE Id=:Id');
    //   $this->db->bind(":Pass",$data['Password']);
    //   $this->db->bind(":Id",$data['Id']);
    //   $this->db->execute();



    // }
    

     


    //     public function findUserByEmail($email) {
    //         //Prepared statement
    //         $this->db->query('SELECT * FROM users WHERE User_Email = :email');
    
    //         //Email param will be binded with the email variable
    //         $this->db->bind(':email', $email);
    //        $this->db->single();
    //         //Check if email is already registered
    //         if($this->db->rowCount() > 0) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }    

    //     public function delete($id)
    //     {
           
    //         $this->db->query('DELETE FROM users WHERE Id = :id');
    //         $this->db->bind('id',$id);
    //         $this->db->execute();
            


    //     }

    // }





    /*****************************Cloud Provider Section Admin Panel ********************************/


    public function DeleteCSP($id)
    {
    
      // require_once  APPROOT . '/views/includes/admin_panel_admins.php';
     
        $this->db->query('DELETE FROM cloud_providers WHERE id = :id');
        $this->db->bind(':id' , $id);
        if($this->db->execute())
        return true;
        else
        return false;
        
      
    }

    public function AddCSP($data)
    {
    
      // require_once  APPROOT . '/views/includes/admin_panel_admins.php';
     
      $this->db->query('INSERT INTO cloud_providers (name, website,services) 
      VALUES (:UserName, :Userwebsite, :Userservices)');
      $this->db->bind(':UserName',$data['Name']);
      $this->db->bind(':Userwebsite',$data['Website']);
      $this->db->bind(':Userservices',$data['Services']);
      
     

      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
        
      
    }

    public function ViewCSP()
    {
    

        $this->db->query("SELECT * FROM cloud_providers ");
        $result = $this->db->resultSet();
        return $result;
      
    }


    }
