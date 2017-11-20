<?php 

/*
|* App Core Class
|* Creates URL & loads core controller
|* URL FORMAT - /controller/method/params
|
*/

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $this->getUrl();
    }

    /*
    |* getUrl works with / because we mapped so in the .htaccess of public
    */

    public  function getUrl()
    {
        echo $_GET['url'];
       
    }
}