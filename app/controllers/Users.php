<?php

class Users extends Controller {

    public function __construct(){

    }

    public function register(){
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form

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