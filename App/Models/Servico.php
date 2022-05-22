<?php
namespace App\Models;
class Servico {

    protected $id; 
    protected $descricao; 
    protected $valor; 

    /*protected $email;
    protected $senha; */

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

    public function getDescricao() {
    	return $this->descricao; 
    }
    public function setDescricao($descricao) {
    	$this->descricao = $descricao; 
    }

    public function getValor() {
    	return $this->valor; 
    }
    public function setValor($valor) {
    	$this->valor = $valor; 
    }

    
    public function cadastrarServico($servico) {

        // Chechar se cpf ou email já foram cadastrados 
        $query = sprintf("select id, descricao, valor from tb_servico where descricao = %s or valor = %s", "'".$servico->getDescricao()."'", "'".$servico->getValor()."'");
        $result = $this->db->query($query)->fetchAll();

        // Retornar 0 se houver registros
        if($result){
            return 0;
        }

        else{
            $query = "insert into tb_servico (descricao, valor) 
            values(
                '".$servico->getDescricao()."',
                '".$servico->getValor()."'
            )";
            
            return $this->db->query($query)->fetchAll();
    
        }


	}

    public function iniciarSessao($tela){
        session_start();
        $_SESSION["user"] = $this->getEmail();
        header("Location: /".$tela);
    }

    public function getServico($servico) {

        $query = "SELECT * FROM tb_servico where descricao= '". $servico->getDescricao() . "'and valor ='" .$servico->getValor() ."'";

		return $this->db->query($query)->fetchAll();
	}


    public function atualizarServico($servico) {
		
        $query = sprintf("update tb_servicp set descricao = %s, valor = %s",
        $servico->getDescricao(),$servico->getValor()
        );

		return $this->db->query($query)->fetchAll();
	}
  

    public function deletarServico($descricao) {
		
        $query = "delete from tb_servico where descricao = ".$descricao;
		return $this->db->query($query)->fetchAll();
	}
    
}
?>