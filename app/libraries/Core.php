<?php
//core creates a url and loads controller
//url format- /controller/method/params
class Core{
    protected $currentController='Pages';
    protected $currentMethod='index';
    protected $params=[];
    public function __construct(){
        //checking for the controllers which is the value after 1st / in url;
        $url=$this->getUrl();
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php' )){
            $this->currentController=ucwords($url[0]);
            //unset to default if not
            unset($url[0]);
    }
    //require the controller
    require_once '../app/controllers/'.$this->currentController.'.php';
    //instantiate current controller
    $this->currentController=new $this->currentController;
    //checking for methods in controller class
    if(isset($url[1])){
        if(method_exists($this->currentController,$url[1])){
            $this->currentMethod=$url[1];
            unset($url[1]);
        }
    }
    //get params;
    $this->params = $url ? array_values($url) : [];
    call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
}
    public function getUrl(){
     if(isset($_GET['url'])){
         $url=rtrim($_GET['url'],'/');
         $url=filter_var($url,FILTER_SANITIZE_URL);
         $url=explode('/',$url);
         return $url;
     }
    }
}
?>