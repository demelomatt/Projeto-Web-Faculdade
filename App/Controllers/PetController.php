<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Pet;


class PetController extends Action {

	public function renderizar() {
        session_start();
        if($_SESSION["user"]){
            $this->render('cadastroPet', '');
        }
        else{
            header('location:\login');
        }
		
	}

    public function cadastrarPet() {
        $rga = $_POST["txtrga"];
        $nome = $_POST["txtnome"];
		$sexo = $_POST["txtsexo"];
        $dt_nascimento = $_POST["txtdt_nascimento"];
        $apelido = $_POST["txtapelido"];
        $raca = $_POST["txtraca"];
        $cor = $_POST["txtcor"];
        $temperamento = $_POST["txttemperamento"];
        $castrado = $_POST["txtcastrado"];
        $deficiencia = $_POST["txtdeficiencia"];
    


		$tutor = Container::getModel('Pet');
        $pet->setRga($rga);
        $pet->setNome($nome);
        $pet->setSexo($sexo);
        $pet->setDt_nascimento($dt_nascimento);
        $pet->setApelido($apelido);
        $pet->setRaca($raca);
        $pet->setCor($cor);
        $pet->setTemperamento($temperamento);
        $pet->setCastrado($castrado);
        $pet->setDeficiencia($deficiencia);
        $pet->iniciarSessao();
	}

    public function loginTutor() {
		
		$this->render('loginTutor', '');
	}

    public function perfilTutor() {
		
		$this->render('perfilTutor', '');
	}
}