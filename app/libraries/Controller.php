<?php
class Controller
//base controller
//loads models and views
{
    public function model($model){
        //require model file
        require_once '../app/model/'.$model.'.php';
        //instantiate model
        return new $model();
                                    
    }
    //load view method
    public function view($view,$data=[]){
        if(file_exists('../app/view/'.$view.'.php')){
            require_once '../app/view/'.$view.'.php';
        }
        else{
            die('view does not exist');
        }
    }
}
