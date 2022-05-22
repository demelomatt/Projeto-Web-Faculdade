<?php

namespace App\Models;

class Cliente {

    protected $id; 
    protected $nome;

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
    public function setNome($id) {
    	$this->nome = $nome; 
    }


    public function getClientes() {
		
		$query = "select id, nome from tb_clientes";
		return $this->db->query($query)->fetchAll();
	}



} 
