<?php
namespace App\Models;

class Pet {

    protected $id_pet; 
    protected $id_tutor; 
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
    protected $peso;
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

    public function getId_tutor() {
    	return $this->id_tutor; 
    }
    public function setId_tutor($id_tutor) {
    	$this->id_tutor = $id_tutor; 
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

    public function getPeso() {
    	return $this->peso; 
    }
    public function setPeso($peso) {
    	$this->peso = $peso; 
    }


    public function cadastrarPet() {
     
        $query = "insert into tb_pet (id_tutor, rga, tipo_pet, nome, sexo, peso, data_nascimento, apelido, raca, cor, temperamento, castrado, deficiencia) 
        values(
            "
            .$this->getId_tutor().",
            '".$this->getRga()."',
            '".$this->getTipo_pet()."',
            '".$this->getNome()."',
            '".$this->getSexo()."',
            '".$this->getPeso()."',
            '".$this->getDt_nascimento()."',
            '".$this->getApelido()."', 
            '".$this->getRaca()."', 
            '".$this->getCor()."', 
            '".$this->getTemperamento()."', 
            '".$this->getCastrado()."', 
            '".$this->getDeficiencia()."'
        )";

        return $this->db->query($query)->fetchAll();

}

    public function getPets() {

        $query = "SELECT * FROM tb_pet where id_tutor= '". $this->getId_tutor()."'";

        return $this->db->query($query)->fetchAll();
    }

    public function getPetById() {

        $query = "SELECT * FROM tb_pet where id_tutor= ". $this->getId_tutor() ." and id_pet = " . $this->getId_pet();

        return $this->db->query($query)->fetchAll();
    }

    public function atualizarPet() {
		
        $query = sprintf("update tb_pet set rga = %s, tipo_pet = %s, nome = %s, sexo = %s, dt_nascimento = %s, apelido = %s, raca = %s, cor=%s, temperamento = %s, castrado = %s, deficiencia = %s",
        $this->getRga(),$this->getTipo_pet(), $this->getNome(), $this->getSexo(), $this->getDt_nascimento(), $this->getApelido(), $this-> getRaca(), $this->getCor(), $this-> getTemperamento(), $this-> getCastrado(), $this-> getDeficiencia() 
        );

		return $this->db->query($query)->fetchAll();
	}
  

    public function deletarPet($nome) {
		
        $query = "delete from tb_pet where nome = ".$nome;
		return $this->db->query($query)->fetchAll();
	}
    
}
?>