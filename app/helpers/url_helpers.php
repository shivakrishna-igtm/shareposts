<?php
//redirecting to other pages
function redirect($page){
    header('location:'.URLROOT.'/'.$page );
}