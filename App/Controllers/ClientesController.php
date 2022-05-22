<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Cliente;


class ClientesController extends Action {

	public function listaClientes() {
		$cliente = Container::getModel('Cliente');
		$clientes = $cliente->getClientes();
		$this->view->dados = $clientes;
		echo var_dump($clientes); 
		$this->render('listaClientes', 'layout1');
	}

	public function incluirClientes() {
		
		$this->render('incluirCliente', 'layout1');
	}
}