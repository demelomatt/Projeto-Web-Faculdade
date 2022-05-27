<?php
namespace App\Models;
class Agendamento {

    protected $id; 
    protected $id_pet; 
    protected $id_tutor; 
    protected $id_servico;
    protected $data; 

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

    public function getId() {
        $query = "select id_agendamento from tb_agendamento where ID_PET=" . $this->getId_pet() . " and data =". "'" . $this->getData() ."'";
        $output =  $this->db->query($query)->fetchAll();
        $id = $output[0]['id_agendamento'];
        return $id;
    }

    public function getIdServico() {
    	return $this->id_servico; 
    }
    public function setIdServico($id_servico) {
    	$this->id_servico = $id_servico; 
    }

    public function getId_pet() {
    	return $this->id_pet; 
    }
    public function setId_pet($id_pet) {
    	$this->id_pet = $id_pet; 
    }

    public function getId_tutor() {
    	return $this->id_tutor; 
    }
    public function setId_tutor($id_tutor) {
    	$this->id_tutor = $id_tutor; 
    }

    public function getData() {
    	return $this->data; 
    }
    public function setData($data) {
    	$this->data = $data; 
    }

    public function cadastrarAgendamento() {

        // Chechar se este horário já foi agendado 
        $query = sprintf("select data from tb_agendamento where data = " . "'".$this->getData()."'");
        $result = $this->db->query($query)->fetchAll();

        // Retornar 0 se houver registros
        if($result){
            return 0;
        }

        else{
            $query = "insert into tb_agendamento (id_pet, data) 
            values(
                " . $this->getId_pet() . ",
                '".$this->getData()."' 
            )";
            return $this->db->query($query)->fetchAll();
        }
	}

    public function cadastrarServicoAgendamento() {

        $query = "insert into tb_servico_agendamento (id_agendamento, id_servico) 
        values(".
            $this->getId() ."," .
            $this->getIdServico() ." 
        )";
        
        return $this->db->query($query)->fetchAll();
	}


    public function getAgendamentos() {

        $query = "select * from vw_agendamento where id_tutor = " . $this->getId_tutor() . " ORDER BY data";

        return $this->db->query($query)->fetchAll();
    }

    /*a gente não tem, por enquanto, a opção de atualizar o agendamento, nem de deletar */
    public function atualizarAgendamento($tutor) {
		
        $query = sprintf("update tb_tutor set nome = %s, cpf = %s, celular = %s, email = %s, senha = %s, cep = %s",
        $tutor->getNome(),$tutor->getCpf(), $tutor->getCelular(), $tutor->getEmail(), $tutor->getSenha(), $tutor->getCep()
        );

		return $this->db->query($query)->fetchAll();
	}
  

    public function deletarAgendamento($email) {
		
        $query = "delete from tb_tutor where email = ".$email;
		return $this->db->query($query)->fetchAll();
	}
    
}
?>