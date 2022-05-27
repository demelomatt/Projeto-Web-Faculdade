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
			'action' => 'perfilTutor'
		);

		$routes['logar'] = array(
			'route' => '/logar',
			'controller' => 'TutorController',
			'action' => 'loginTutor'
		);

		$routes['logout'] = array(
			'route' => '/logout',
			'controller' => 'TutorController',
			'action' => 'logoutTutor'
		);


		$routes['perfil'] = array(
			'route' => '/perfil',
			'controller' => 'TutorController',
			'action' => 'perfilTutor'
		);

		// PET
		$routes['cadastroPet'] = array(
			'route' => '/cadastro_pet',
			'controller' => 'PetController',
			'action' => 'renderizar'
		);

		$routes['cadastrarPet'] = array(
			'route' => '/cadastrar_pet',
			'controller' => 'PetController',
			'action' => 'cadastrarPet'
		);

		$routes['perfilPet'] = array(
			'route' => '/perfil_pet',
			'controller' => 'PetController',
			'action' => 'perfilPet'
		);


		// SERVICO
		$routes['servicos'] = array(
			'route' => '/servicos',
			'controller' => 'ServicoController',
			'action' => 'renderizar'
		);

		// AGENDAMENTO
		$routes['agendamento'] = array(
			'route' => '/agendamento',
			'controller' => 'AgendamentoController',
			'action' => 'renderizar'
		);

		$routes['agendar'] = array(
			'route' => '/agendar',
			'controller' => 'AgendamentoController',
			'action' => 'agendar'
		);




		$this->setRoutes($routes);
	}
}
?>
