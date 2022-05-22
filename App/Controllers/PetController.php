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

    public function cadastrarTutor() {
        $cpf = $_POST["txtcpf"];
        $nome = $_POST["txtnome"];
		$celular = $_POST["txtcelular"];
        $telefone = $_POST["txttelefone"];
        $email = $_POST["txtemail"];
        $senha = $_POST["txtsenha"];
        $cep = $_POST["txtcep"];
        $uf = $_POST["txtuf"];
        $cidade = $_POST["txtcidade"];
        $logradouro = $_POST["txtcidade"];
        $bairro = $_POST["txtcidade"];
        $numeroEndereco = $_POST["txtnumero"];
        $complementoEndereco = $_POST["txtcomplemento"];


		$tutor = Container::getModel('Tutor');
        $tutor->setCpf($cpf);
        $tutor->setNome($nome);
        $tutor->setCelular($celular);
        $tutor->setEmail($email);
        $tutor->setSenha($senha);
        $tutor->setCep($cep);
        $tutor->setUf($uf);
        $tutor->setLogradouro($logradouro);
        $tutor->setBairro($bairro);
        $tutor->setCidade($cidade);
        $tutor->setNumeroEndereco($numeroEndereco);
        $tutor->setComplementoEndereco($complementoEndereco);
        $tutor->cadastrarTutor($tutor);
        $tutor->iniciarSessao();
	}

    public function loginTutor() {
		
		$this->render('loginTutor', '');
	}

    public function perfilTutor() {
		
		$this->render('perfilTutor', '');
	}
}