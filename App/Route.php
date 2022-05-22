<?php
namespace App;
use MF\Init\Bootstrap;
class Route extends Bootstrap {

	protected function initRoutes() {

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

// tutor 

		$routes['cadastroTutor'] = array(
			'route' => '/cadastro',
			'controller' => 'TutorController',
			'action' => 'renderizar'
		);

		$routes['cadastrarTutor'] = array(
			'route' => '/cadastrar',
			'controller' => 'TutorController',
			'action' => 'cadastrarTutor'
		);


		$routes['telaLogin'] = array(
			'route' => '/login',
			'controller' => 'TutorController',
			'action' => 'renderizarLogin'
		);

		$routes['logar'] = array(
			'route' => '/logar',
			'controller' => 'TutorController',
			'action' => 'loginTutor'
		);

		$routes['perfil'] = array(
			'route' => '/perfil',
			'controller' => 'TutorController',
			'action' => 'perfilTutor'
		);

		// PET
		$routes['cadastroPet'] = array(
			'route' => '/cadastrar_pet',
			'controller' => 'PetController',
			'action' => 'renderizar'
		);

		$routes['cadastrarTutor'] = array(
			'route' => '/cadastrar',
			'controller' => 'TutorController',
			'action' => 'cadastrarTutor'
		);



		$this->setRoutes($routes);
	}
}
?>
