<?php
namespace App\Models;
class Agendamento {

    protected $id; 
    protected $id_pet; 
    protected $data; 

   /* protected $email;
    protected $senha;*/ 

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

    public function getId() {
    	return $this->id; 
    }
    public function setId($id) {
    	$this->id = $id; 
    }

    public function getId_pet() {
    	return $this->cpf; 
    }
    public function setId_pet($id_pet) {
    	$this->id_pet = $id_pet; 
    }

    public function getData() {
    	return $this->data; 
    }
    public function setData($data) {
    	$this->data = $data; 
    }


    public function cadastrarTutor($agendamento) {

        // Chechar se cpf ou email já foram cadastrados 
        $query = sprintf("select id, id_pet, data from tb_agendamento where id_pet = %s or data = %s", "'".$agendamento->getId_pet()."'", "'".$agendamento->getData()."'");
        $result = $this->db->query($query)->fetchAll();

        // Retornar 0 se houver registros
        if($result){
            return 0;
        }

        else{
            $query = "insert into tb_agendamento (data) 
            values(
                '".$agendamento->getAgendamento()."' 
            )";
            
            return $this->db->query($query)->fetchAll();
    
        }


	}

    public function iniciarSessao($tela){
        session_start();
        $_SESSION["user"] = $this->getEmail();
        header("Location: /".$tela);
    }

    public function getTutor($tutor) {

        $query = "SELECT * FROM tb_tutor where email= '". $tutor->getEmail() . "'and senha ='" .$tutor->getSenha() ."'";

		return $this->db->query($query)->fetchAll();
	}

    /*a gente não tem, por enquanto, a opção de atualizar o agendamento, nem de deletar */
    public function atualizarTutor($tutor) {
		
        $query = sprintf("update tb_tutor set nome = %s, cpf = %s, celular = %s, email = %s, senha = %s, cep = %s",
        $tutor->getNome(),$tutor->getCpf(), $tutor->getCelular(), $tutor->getEmail(), $tutor->getSenha(), $tutor->getCep()
        );

		return $this->db->query($query)->fetchAll();
	}
  

    public function deletarTutor($email) {
		
        $query = "delete from tb_tutor where email = ".$email;
		return $this->db->query($query)->fetchAll();
	}
    
}
?>