<?php
    class Post
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPosts()
        {
            $this->db->query(
                "SELECT *,
                 posts.id as postId,
                 users.id as userId,
                 posts.created_at as postCreated,
                 users.created_at as userCreated
                 FROM posts
                 INNER JOIN users
                 ON posts.user_id = users.id
                 ORDER BY posts.created_at DESC 
            ");
            return $results = $this->db->resultSet();
        }

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id )');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;

        }

        public function deletePost($id){
            $this->db->query('DELETE * posts WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }