<?php
class Pages extends Controller{
    public function __construct(){
        
    
    }
    public function index(){
        if(isLoggedIn()){
            redirect('posts');

        }

        $data=['title'=>'Shareposts',
    'description'=>'simple social network'];
        $this->view('pages/index',$data);
    }
    public function about(){
        $data=['titles'=>'About us',
    'description'=>'share your posts with other users'];
        $this->view('pages/about',$data);
    }
}