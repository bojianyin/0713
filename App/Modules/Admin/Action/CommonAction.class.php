<?php
	Class CommonAction extends Action {
		Public function _initialize(){
			if(!isset($_SESSION['uid']) and !isset($_SESSION['user'])){
				$this->redirect(GROUP_NAME."/Login/index");
			}
		}
	}
?>