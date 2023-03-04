<?php
class Users extends Controller {

    
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            
            'UserName' => '',
            'PhoneNumber' => '',
            'Email' => '',
            'Password' => '',
            'ConfirmPassword' => ''
           
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'UserName' => trim($_POST['UserName']),
                'PhoneNumber' => trim($_POST['PhoneNumber']),
                'Email' => trim($_POST['Email']),
                'Password' => trim($_POST['Password']),
                'ConfirmPassword' => trim($_POST['ConfirmPassword'])
                
            ];

         

            // Make sure that errors are empty
            

                // Hash password
                $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

                //Register user from model function
                $this->userModel->register($data);
                    //Redirect to the login page
                header('location: ' . URLROOT . '/users/login');
              
               
        }
        $this->view('users/register', $data);
    }
    

/******************************************************* */
public function login() {
    $data = [
        'title' => 'Login page',
        'Email' => '',
        'Password' => '',
        
    ];

    //Check for post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Sanitize post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

        $data = [
            'Email' => trim($_POST['email']),
            'Password' => trim($_POST['Pass']),
            'User_Type' => $_SESSION['user_type']
        ];
        //Validate username
        if (empty($data['Email'])) {
            $data['emailError'] = 'Please Enter Your Em.';
        }

        //Validate password
       

        //Check if all errors are empty
         
             
            $loggedInUser = $this->userModel->login($data['Email'], $data['Password']);

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
               
                
            } else {
                $data['passwordError'] = 'Password or Email is incorrect. Please try again.';

                $this->view('users/login', $data);
            }
        

    } else {
        $data = [
            'Email' => '',
            'Password' => ''
            
        ];
    }
    
    
    $this->view('users/login', $data);
    
}

public function createUserSession($user) {
    $_SESSION['Id'] = $user->id;
    $_SESSION['UserName'] = $user->user_name;
    $_SESSION['UserEmail'] = $user->user_email;
    $_SESSION['User_Password'] = $user->user_password;
    $_SESSION['User_Number'] = $user->user_phone;
    $_SESSION['User_Type'] = $user->user_type;
    

    
    if($_SESSION['User_Type'] == 'Admin'){
    header('location:' . URLROOT . '/users/admin_panel_landing');
    }
    else{

        header('location:' . URLROOT );
    }
}

public function logout() {
    
    session_destroy();
   
   
    header('location:' . URLROOT . '/users/login');

}


public function admin_panel_users(){
    
    $data=$this->userModel->ViewUsers();


    $this->view('users/admin_panel_users',$data);

}

public function admin_panel_landing(){
    
    
        $data = [ 'Title' => 'Admin Dashboard'];
    
        $this->view('users/admin_panel_landing',$data);
    
    }
public function admin_panel_admins(){
    
    
        $data=$this->userModel->ViewAdmins();
        
        
        $this->view('users/admin_panel_admins',$data);
        
        }  
          
public function  Admin_OrdersAction(){
    $data=$this->userModel->ShowOrders();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
     

        
        
        if($this->userModel->UpdateOrder($_GET['id'],$_GET['action']))
        {

            header("Location: " . URLROOT. "/users/Admin_OrdersAction");

        }
        else{
        die("Manga");
        }
          
    }
    
    $this->view('users/Admin_OrdersAction',$data);

}

public function admin_panel_delete_admins()
{
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
     

        
        
        if($this->userModel->DeleteAdmin($_GET['id']))
        {

            header("Location: " . URLROOT. "/users/admin_panel_admins");

        }
        else{
        die("Manga");
        }
          
    }
    
    $this->view('users/admin_panel_admins');
}
/*public function ViewOrders(){
    $data=$this->userModel->ShowOrders();
    $this->view('users/Admin_OrdersAction',$data);
}*/
public function admin_panel_add_adminform(){

    $data = [
            
        'Fname' => '',
        
        'Email' => '',
        'Password' => '',
        'Number' => '',
        'FnameError' => '',
        
        'emailError' => '',
        'numberError' => '',
        'passwordError' => '',
    ];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $data = [
            
        'Fname' => $_POST['UserName'],
        'UserEmail' => $_POST['UserEmail'],
        'UserPhone' => $_POST['UserPhone'],
        'Password' => $_POST['Password'],
        'Number' => '',
        'FnameError' => '',
        'LnameError' => '',
        'emailError' => '',
        'numberError' => '',
        'passwordError' => '',
    ];


    $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

    if($this->userModel->AddAdmin($data)){
        header("Location: " . URLROOT. "/users/admin_panel_admins");

    }else{
        die("Manga");

        }
    }
    $this->view('users/admin_panel_add_adminform');
}










public function profile(){

   

     $data = [

        
        'Id' => '',
        'Fnamee' => '',
        'Lnamee' => '',
        'Bnamee' => '',
        'Emaile' => '',
        
        'usernume' => '',
        
        
        'FnameError' => '',
        'LnameError' => '',
        'BnameError' => '',
        'emailError' => '',
        'numberError' => ''
        
        
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
       

        $data = [

        
            'Id' => $_SESSION['Id'],
            'Fnamee' => $_POST['Fname'],
            'Lnamee' => $_POST['Lname'],
            'Bnamee' => $_POST['Bname'],
            'Emaile' => $_POST['Email'],
            
            'usernume' => $_POST['Number'],
            
            
            'FnameError' => '',
            'LnameError' => '',
            'BnameError' => '',
            'emailError' => '',
            'numberError' => '',
            
            
        ];

       
        
        $this->userModel->updateUser($data);
        $_SESSION['First_Name'] = $_POST['Fname'];
        $_SESSION['Last_Name'] = $_POST['Lname'];
        $_SESSION['Brand_Name'] = $_POST['Bname'];
        $_SESSION['User_Number'] = $_POST['Number'];
        $_SESSION['User_Email'] = $_POST['Email'];

        
      
    }


$this->view('users/profile',$data);


}

public function UpdatePassword(){

$data =[
 'title' =>'changepassword' ,
 'Id' => '',
 'Password'=> '',
 'Confirmpass' => '',
 'passwordError' => '',
 'confirmPasswordError' => ''


];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
    $data =[
        'title' =>'changepassword' ,
        'Id' => $_SESSION['Id'],
        'Password'=> $_POST['Password'],
        'Confirmpass' =>$_POST['Confirmpass'],
        'passwordError' => '',
        'confirmPasswordError' => ''


       ];

       

       if (empty($data['Password'])) {
        $data['passwordError'] = 'Please Enter Your Password.';
    }

    if (empty($data['Confirmpass'])) {
        $data['confirmPasswordError'] = 'Please Enter Your confirm Password.';
    }
    if (($data['Confirmpass'])!=($data['Password']) ) {
        $data['confirmPasswordError'] = 'Unmatched Passwords.';
    }


    if (empty($data['passwordError']) && empty($data['confirmPasswordError']))
    {    
        $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);
        $this->userModel->UpdatePasswordinDB($data);
        echo '<script>alert("Your password has changed successfully")</script>';
        sleep(2);
        header('location: ' . URLROOT . '/users/logout');
       
    }
    
    
}
else{
    $data = [
        
        'Id' => '',
        'Password'=> '',
        'Confirmpass' => '',
        'passwordError' => '',
        'confirmPasswordError' => ''
    ];
}

$this->view('users/UpdatePassword', $data);

}








    



public function delete()
{
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $this->userModel->delete($_SESSION['Id']);
 

    session_destroy();
   
   
    header('location:' . URLROOT . '/users/register');
      
    


}
$this->view('users/profile',$data);
}


/*******************************Cloud CSP*************************** */

public function admin_panel_view_csp(){
    
    
    $data=$this->userModel->ViewCSP();
    
    
    $this->view('users/admin_panel_view_csp',$data);
    
    }    


    
public function admin_panel_delete_CSP()
{
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
     

        
        
        if($this->userModel->DeleteCSP($_GET['id']))
        {

            header("Location: " . URLROOT. "/users/admin_panel_view_csp");

        }
        else{
        die("Manga");
        }
          
    }
    
    $this->view('users/admin_panel_view_csp');
}


public function admin_panel_add_CSPform(){

    $data = [
            
        'Name' => '',
        'Website' => '',
        'Email' => ''
     
    ];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $data = [
            
        'Name' => $_POST['Name'],
        'Website' => $_POST['Website'],
        'Services' => $_POST['Services']
    ];


    $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

    if($this->userModel->AddCSP($data)){
        header("Location: " . URLROOT. "/users/admin_panel_view_csp");

    }else{
        die("Manga");

        }
    }
    $this->view('users/admin_panel_add_CSPform');
}


}
