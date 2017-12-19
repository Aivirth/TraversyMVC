<?php

class Posts extends Controller {

    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index(){
        if(isLogged()){
            redirect('posts');
        }


        //Get Posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add(){
        $data = [
            'title' => '',
            'body'  => ''
        ];
        $this->view('posts/add', $data);
    }
}