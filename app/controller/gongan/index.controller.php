<?php
class IndexController extends Controller {
  
    public function render() {
        //$data = "buzhdiao";
        //$this->assign('data',$data);
        $this->viewTpl('index.htm');
    }

    public function dologin($req){
    	$userid = $req -> param('userid', '');
        $pwd = $req -> param('pwd', '');
        
        $res=Box ::getObject('index', 'model') ->dologin();
        if($res){
            // echo json_encode(array("code" => CODE_SUCCESS, "res" => $res));
            return ['code' => CODE_SUCCESS, 'msg' => $res];
        }else{
            return ['code' => CODE_SUCCESS, 'msg' => "登陆失败"];
        }
    }
}