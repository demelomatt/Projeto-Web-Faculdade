<?php
namespace App\Models;
class Pet {

    protected $id_pet; 
    protected $rga; 
    protected $tipo_pet; 
    protected $nome; 
    protected $sexo;
    protected $dt_nascimento;
    protected $apelido;
    protected $raca;
    protected $cor;  
    protected $temperamento; 
    protected $castrado; 
    protected $deficiencia;

    /*protected $email;
    protected $senha; */

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

    public function getId_pet() {
    	return $this->id_pet; 
    }
    public function setId_pet($id_pet) {
    	$this->id_pet = $id_pet; 
    }

    public function getRga() {
    	return $this->rga; 
    }
    public function setRga($rga) {
    	$this->rga = $rga; 
    }

    public function getTipo_pet() {
    	return $this->tipo_pet; 
    }
    public function setTipo_pet($tipo_pet) {
    	$this->tipo_pet = $tipo_pet; 
    }

    public function getNome() {
    	return $this->nome; 
    }
    public function setNome($nome) {
    	$this->nome = $nome; 
    }

    public function getSexo() {
    	return $this->sexo; 
    }
    public function setSexo($sexo) {
    	$this->sexo = $sexo; 
    }

    public function getDt_nascimento() {
    	return $this->dt_nascimento; 
    }
    public function setDt_nascimento($dt_nascimento) {
    	$this->dt_nascimento = $dt_nascimento; 
    }

    public function getApelido() {
    	return $this->apelido; 
    }
    public function setApelido($apelido) {
    	$this->apelido = $apelido; 
    }

    public function getRaca() {
    	return $this->raca; 
    }
    public function setRaca($raca) {
    	$this->raca = $raca; 
    }

    public function getCor() {
    	return $this->cor; 
    }
    public function setCor($cor) {
    	$this->cor = $cor; 
    }

    public function getTemperamento() {
    	return $this->temperamento; 
    }
    public function setTemperamento($temperamento) {
    	$this->temperamento = $temperamento; 
    }

    public function getCastrado() {
    	return $this->castrado; 
    }
    public function setCastrado($castrado) {
    	$this->castrado = $castrado; 
    }

    public function getDeficiencia() {
    	return $this->deficiencia; 
    }
    public function setDeficiencia($deficiencia) {
    	$this->deficiencia = $deficiencia; 
    }

       public function cadastrarPet($pet) {
        // Chechar se cpf ou email já foram cadastrados 
        $query = sprintf("select rga, nome from tb_pet where rga = %s or nome = %s", "'".$pet->getRga()."'", "'".$pet->getNome()."'");
        $result = $this->db->query($query)->fetchAll();

        // Retornar 0 se houver registros
        if($result){
            return 0;
        }

        else{
            $query = "insert into tb_pet (rga, tipo_pet, nome, sexo, dt_nascimento, apelido, raca, cor, temperamento, castrado, deficiencia) 
            values(
                '".$pet->getRga()."',
                '".$pet->getTipo_pet()."',
                '".$pet->getNome()."',
                '".$pet->getSexo()."',
                '".$pet->getDt_nascimento()."',
                '".$pet->getApelido()."', 
                '".$pet->getRaca()."', 
                '".$pet->getCor()."', 
                '".$pet->getTemperamento()."', 
                '".$pet->getCastrado()."', 
                '".$pet->getDeficiencia()."'
            )";
            
            return $this->db->query($query)->fetchAll();
    
        }


	}

    public function iniciarSessao($tela){
        session_start();
        $_SESSION["pet"] = $this->getNome();
        header("Location: /".$tela);
    }

    public function getTutor($tutor) {

        $query = "SELECT * FROM tb_tutor where email= '". $tutor->getEmail() . "'and senha ='" .$tutor->getSenha() ."'";

		return $this->db->query($query)->fetchAll();
	}


    public function atualizarPet($pet) {
		
        $query = sprintf("update tb_pet set rga = %s, tipo_pet = %s, nome = %s, sexo = %s, dt_nascimento = %s, apelido = %s, raca = %s, cor=%s, temperamento = %s, castrado = %s, deficiencia = %s",
        $pet->getRga(),$pet->getTipo_pet(), $pet->getNome(), $pet->getSexo(), $pet->getDt_nascimento(), $pet->getApelido(), $pet-> getRaca(), $pet->getCor(), $pet-> getTemperamento(), $pet-> getCastrado(), $pet-> getDeficiencia() 
        );

		return $this->db->query($query)->fetchAll();
	}
  

    public function deletarPet($nome) {
		
        $query = "delete from tb_pet where nome = ".$nome;
		return $this->db->query($query)->fetchAll();
	}
    
}
?>