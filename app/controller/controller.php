<?php
class Controller {

    private $assign=array();

    function __construct(){
        
    }

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    function viewTpl ($file){
    	$filepath =PRODUCT_TEMPLATE_DIR.'/'.$file;

    	if(is_file($filepath)){
            $loader = new Twig_Loader_Filesystem(PRODUCT_TEMPLATE_DIR);
            $twig = new Twig_Environment($loader);
    		$template = $twig->load($file);
            $template->display($this->assign?$this->assign:[]);
    	}else{
            throw new Exception('没有找到视图文件：'.$file);
        }
        
    }

    
}
