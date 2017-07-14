<?php
	Class LoginAction extends Action {
		Public function index(){
			$this->display();
		}
		Public function logHandler(){
			if(!IS_POST) halt("error!");
			if($data=M("login")->where(array("username"=>$_POST['username']))->find()){
				if($data["password"]==$_POST["pass"]){
					$newData=array(
						"id"=>$data["id"]
						,"loginip"=>get_client_ip()
						,"logintime"=>time()
					);
					$ISSAVE=M("login")->save($newData) or die("存入数据失败");
					session("uid",$data['id']);
					session("user",$data['username']);
					session("loginip",$data["loginip"]);
					session("logintime",$data['logintime']);
					$this->success("登录成功!",U(GROUP_NAME."/Index/index"));
				}else{
					$this->error("密码不正确!");
				}
			}else{
				$this->error("用户名不存在!");
			}
		}
		Public function regHandler(){
			if(!IS_POST) halt("error!");
			if(!M("login")->where(array("username"=>$_POST['user']))->find()){
				p($_POST);
				p($_SESSION);
			}else{
				$this->error("用户已经注册过了!");
			}
		}
		Public function verify(){
			import("Class.code",APP_PATH);
			$vcode=new Vcode();  
		    $_SESSION['code']=$vcode->getCode();  
		    $vcode->outImg();  
		}
	}
?>