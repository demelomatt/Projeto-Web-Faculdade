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

    public function removerAcentos($string){
        $newString = str_replace("-","",$string);
        $newString  = str_replace(".","",$newString );

        return $newString;
    }

    public function cadastrarPet() {
        session_start();

        $tutorId = $_SESSION["user"];
        $nome = $_POST["txtnome"];
        $apelido = $_POST["txtapelido"];
        $especie = ($_POST["especie"] == "cachorro" ? 0 : 1); 
        $rga = $this->removerAcentos($_POST["txtrga"]);
        $peso = floatval($this->removerAcentos($_POST["txtpeso"]));
        $temperamento = ($_POST["temperamento"] == "arisco" ? 0 : 1); 
        $castrado = ($_POST["castrado"] == "sim" ? 1 : 0); 
        $deficiencia = ($_POST["def"] == "sim" ? 1 : 0); 
        $dataNasc = str_replace("/","-",$_POST["txtdtnascimento"]);
        $cor = $_POST["txtcor"];
        $sexo = ($_POST["sexo"] == "macho" ? 0 : 1); 
        $raca = $_POST["txtraca"];

		$pet = Container::getModel('Pet');
        
        $pet->setId_tutor($tutorId);
        $pet->setNome($nome);
        $pet->setApelido($apelido);
        $pet->setTipo_pet($especie);
        $pet->setPeso($peso);
        $pet->setTemperamento($temperamento);
        $pet->setCastrado($castrado);
        $pet->setDt_nascimento($dataNasc);
        $pet->setCor($cor);
        $pet->setSexo($sexo);
        $pet->setRaca($raca);
        $pet->setDeficiencia($deficiencia);
        $pet->setRga($rga);

        $pet->cadastrarPet($pet);

        header("Location: /perfil");

	}


}