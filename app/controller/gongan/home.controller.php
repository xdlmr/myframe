<?php
class HomeController extends Controller {
  
    public function render() {
        //$data = "buzhdiao";
        //$this->assign('data',$data);
        $this->viewTpl('home.htm');
    }

   
}