<?php
namespace App;
use MF\Init\Bootstrap;
class Route extends Bootstrap {

	protected function initRoutes() {
	
// menu Principal 		
		$routes['menuPrincipal'] = array(
			'route' => '/menuPrincipal',
			'controller' => 'indexController',
			'action' => 'menuPrincipal'
		);

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);	

// Produtos
		$routes['produtos'] = array(
			'route' => '/produtos',
			'controller' => 'ProdutosController',
			'action' => 'listaProdutos'
		);

		$routes['incluirProduto'] = array(
			'route' => '/incluirProduto',
			'controller' => 'ProdutosController',
			'action' => 'incluirProduto'
		);

		$routes['salvarProduto'] = array(
			'route' => '/salvarProduto',
			'controller' => 'ProdutosController',
			'action' => 'salvarProduto'
		);

		$routes['alterarProduto'] = array(
			'route' => '/alterarProduto',
			'controller' => 'ProdutosController',
			'action' => 'alterarProduto'
		);



		$routes['excluirProduto'] = array(
			'route' => '/excluirProduto',
			'controller' => 'ProdutosController',
			'action' => 'excluirProduto'
		);


// clientes 

		$routes['listaClientes'] = array(
			'route' => '/listaClientes',
			'controller' => 'ClientesController',
			'action' => 'listaClientes'
		);

		$routes['incluirClientes'] = array(
			'route' => '/incluirCliente',
			'controller' => 'ClientesController',
			'action' => 'incluirClientes'
		);


		$this->setRoutes($routes);
	}
}
?>
