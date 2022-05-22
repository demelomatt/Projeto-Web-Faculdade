<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class IndexController extends Action {

	public function index() {
           $this->render('index', '');
	}

	public function menuPrincipal() {
		$this->render('menuPrincipal', 'layout1');
	}

	public function sobreNos() {

		/*$info = Container::getModel('Info');

		$informacoes = $info->getInfo();
		
		@$this->view->dados = $informacoes;
*/  echo "aaaaaaaaaa";
		$this->render('sobreNos', 'layout1');
	}

}


?>