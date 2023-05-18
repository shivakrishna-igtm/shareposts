<?php
class Users extends Controller{
    public function __construct(){
        
        $this->userModel=$this->model('User');
        

    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'name'=>trim($_POST['name']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'name_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];
            //validate email
            if(empty($data['email'])){
                $data['email_err']='Please enter your email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err']='email is already taken';
                }
            }
            if(empty($data['name'])){
                $data['name_err']='Please enter your name';
            }
            if(empty($data['password'])){
                $data['password_err']='Please enter your password';
            }elseif(strlen($data['password'])<6){
                $data['password_err']='password must be atleast 6 characters';
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_err']='please confirm your password';
            }else{
                if($data['password'] !=$data['confirm_password']){
                $data['confirm_password_err']='passwords do not match';
                }
            }
            //make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //hash the password
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
        
            //register user
            if($this->userModel->register($data)){
                flash('register_success','you are registered with us and can login now');
                redirect('users/login');

            }else{
                die('something went wrong');
            }

            }else{
                //load view with errors
                $this->view('users/register',$data);
            }
        
        }else {
            //process form
            $data=[
                'name'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'name_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];
            $this->view('users/register',$data);
        }

    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data=[
                
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'email_err'=>'',
                    'password_err'=>''
                ];
                //validate email
                if(empty($data['email'])){
                    $data['email_err']='Please enter your email';
                }
                if(empty($data['password'])){
                    $data['password_err']='Please enter your password';
                    
                }
                //check users email if exists
                if($this->userModel->findUserByEmail($data['email'])){
                    //userfound
                }
                else{
                    $data['email_err']='no user found';
                }
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //check and set logged in user
                    $logged=$this->userModel->login($data['email'],$data['password']);
                if($logged){
                    //create session variables
                  $this->createUserSession($logged);
            
                }else{
                    $data['password_err']='password incorrect';
                    $this->view('users/login',$data);
                }
                }
                else{
                    $this->view('users/login',$data);
                }

                //c
        }
        else {
            //process form
            $data=[
            
                'email'=>'',
                'password'=>'',
                'email_err'=>'',
                'password_err'=>'',
                
            ];
            $this->view('users/login',$data);
        }

    }
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        redirect('posts');
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    } 

           
}