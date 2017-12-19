<?php

class Posts extends Controller {
    public function index(){
        $data = [];
        $this->view('posts/index', $data);
    }
}