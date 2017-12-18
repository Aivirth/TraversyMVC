<?php

class Users extends Controller {

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form

            //Sanitize POST  DATA
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //init data
            $data = [
                'name'                  => trim($_POST['name']),
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'confirm_password'      => trim($_POST['confirm_password']),
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];


            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            //Validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter your name';
            }

            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            } elseif(strlen($data['password']) < 6 ){
                $data['password_err'] = 'Password must be longer than 6 characters';
            }

            //confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated
                die('success');
            } else {
                //Load View with errors
                $this->view('users/register', $data);
            }


        } else {
            //init data
            $data = [
                'name'                  => '',
                'email'                 => '',
                'password'              => '',
                'confirm_password'      => '',
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];

            //load view
            $this->view('users/register', $data);
        }
    }

    public function login(){
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form

            //Sanitize POST  DATA
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                //init data
                $data = [
                    'email'                 => trim($_POST['email']),
                    'password'              => trim($_POST['password']),
                    'email_err'             => '',
                    'password_err'          => '',
                ];

                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                //Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                } elseif(strlen($data['password']) < 6 ){
                    $data['password_err'] = 'Password must be longer than 6 characters';
                }

                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    // Validated
                    die('success');
                } else {
                    //Load View with errors
                    $this->view('users/login', $data);
                }

        } else {
            //init data
            $data = [
                'email'             => '',
                'password'          => '',
                'email_err'         => '',
                'password_err'      => ''
            ];

            //load view
            $this->view('users/login', $data);
        }
    }

}