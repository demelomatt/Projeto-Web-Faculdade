<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Tutor;


class TutorController extends Action {

	public function renderizar() {
		
		$this->render('cadastroTutor', '');
	}

    public function removerAcentos($string){
        $newString = str_replace("-","",$string);
        $newString  = str_replace(".","",$newString );

        return $newString;
    }

    public function cadastrarTutor() {
        $cpf = $this->removerAcentos($_POST["txtcpf"]);
        $nome = $_POST["txtnome"];
		$celular = $this->removerAcentos($_POST["txtcelular"]);
        $telefone = $this->removerAcentos($_POST["txttelefone"]);
        $email = $_POST["txtemail"];
        $senha = $_POST["txtsenha"];
        $cep = $this->removerAcentos($_POST["txtcep"]);
        $uf = $_POST["txtuf"];
        $cidade = $_POST["txtcidade"];
        $logradouro = $_POST["txtlogradouro"];
        $bairro = $_POST["txtcidade"];
        $numeroEndereco = $_POST["txtnumero"];
        $complementoEndereco = $_POST["txtcomplemento"];


		$tutor = Container::getModel('Tutor');
        $tutor->setCpf($cpf);
        $tutor->setNome($nome);
        $tutor->setCelular($celular);
        $tutor->setTelefone($telefone);
        $tutor->setEmail($email);
        $tutor->setSenha($senha);
        $tutor->setCep($cep);
        $tutor->setUf($uf);
        $tutor->setLogradouro($logradouro);
        $tutor->setBairro($bairro);
        $tutor->setCidade($cidade);
        $tutor->setNumeroEndereco($numeroEndereco);
        $tutor->setComplementoEndereco($complementoEndereco);

        $result = $tutor->cadastrarTutor($tutor);
        
        
        if ($result == 0){
            
            $this->renderizarLogin();
        
        }

        else{
            // iniciar sessão e ir para tela de cadastro do pet se cadastro é válido
            $tutor->iniciarSessao("cadastrar_pet");
        }

    }

    public function renderizarLogin() {
		
		$this->render('loginTutor', '');
	}

    public function loginTutor() {
        $email = $_POST["txtusuario"];
        $senha = $_POST["txtsenha"];

		$tutor = Container::getModel('Tutor');

        $tutor->setEmail($email);
        $tutor->setSenha($senha);
        $result = $tutor->getTutor($tutor);

                
        // Se usuário e senha existem, então iniciar sessão e ir para tela de perfil
        if ($result){
            $tutor->iniciarSessao("perfil");
            

        }

        else{
            $this->renderizarLogin();
        }
        
    }

    public function perfilTutor() {
        session_start();
        if($_SESSION["user"]){
            $this->render('perfilTutor', '');
        }
        else{
            $this->renderizarLogin();
        }

        
	}
}