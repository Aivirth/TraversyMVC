<?php

    /*
    *| PDO database class
    *| Connect to database
    *| Create Prepared statements
    *| Bind Values
    *| Return rows and results
    *|
    */

    class Database
    {
        private $host       = DB_HOST;
        private $user       = DB_USER;
        private $password   = DB_PASS;
        private $dbname     = DB_NAME;

        private $dbh;   //database handler
        private $stmt;  //statement
        private $error; //eventual error

        public function __construct()
        {
            //Set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(

                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            );

            //Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            }catch(PODException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }


    }