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
    }