<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class AgendamentoController extends Action {

	public function renderizar() {
        session_start();
        if(isset($_SESSION["user"])){
            $servico = Container::getModel('Servico');
            $pet = Container::getModel('Pet');
    
            $servicos = $servico ->getServicos();
            $pets = $pet->getPets($_SESSION["user"]);
            
            
            $this->view->dados = array($servicos, $pets);
    
            $this->render('agendamento', '');
        }
        else{
            header("Location:/login");
        }
	}

    public function agendar(){
        $pet_id = $_POST["pet"];
        $servico_id = $_POST["servico"];
        $date =  $_POST["date"] . " " . $_POST["horario"] . ":00";

        $agendamento = Container::getModel('Agendamento');
        $agendamento->setId_pet($pet_id);
        $agendamento->setData($date);
        $agendamento->setIdServico($servico_id);

        $result = $agendamento->cadastrarAgendamento($agendamento);

        if ($result == 0){
            
            $this->renderizar();
        
        }

        else{

            $result = $agendamento->cadastrarServicoAgendamento($agendamento);
            header("Location:/perfil");
        }

    }

}


?>