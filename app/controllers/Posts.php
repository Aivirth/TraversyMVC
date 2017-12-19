<?php

class Posts extends Controller {

    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'         => trim($_POST['title']),
                'body'          => trim($_POST['body']),
                'user_id'       => $_SESSION['user_id'],
                'title_err'     => '',
                'body_err'      => ''
            ];

            //validate title
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }

            //validate body
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter body';
            }

            //check if errors are present
            if(empty($data['title_err']) && empty($data['body_err'])){

                //validated
                if($this->postModel->addPost($data)){
                    flash('post_message', 'Post Added');
                    redirect('posts');
                }else{
                    die('Something went wrong');
                }
               
            }else{
                //load view with errors
                $this->view('posts/add', $data);
            }

        }else{
            $data = [
                'title' => '',
                'body'  => ''
            ];
            $this->view('posts/add', $data);
        }
        
    }

    public function show($id){
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/show', $data);

    }
}