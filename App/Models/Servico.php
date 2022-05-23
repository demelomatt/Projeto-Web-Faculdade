<?php
namespace App\Models;
class Servico {

    protected $id; 
    protected $nome;
    protected $descricao; 
    protected $valor; 

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

    public function getNome() {
    	return $this->nome; 
    }
    public function setNome($nome) {
    	$this->nome = $nome; 
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

    public function getServicos() {

        $query = "SELECT * FROM tb_servico";

        return $this->db->query($query)->fetchAll();
    }

}
?>