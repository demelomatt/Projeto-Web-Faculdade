<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class ServicoController extends Action {

	public function renderizar() {
		$servico = Container::getModel('Servico');

		$servicos = $servico ->getServicos();
		$this->view->dados = $servicos;
		$this->render('servico', '');
	}

}


?>