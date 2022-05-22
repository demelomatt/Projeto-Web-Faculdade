<?php
namespace App\Models;
class Produto {

    protected $id; 
    protected $descricao; 
    protected $preco; 

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
    public function setPreco($preco) {
    	$this->preco = $preco; 
    }
    public function getPreco() {
    	return $this->preco;
    }

	public function getProdutos() {
		$query = "select id, descricao, preco from tb_produtos";
		return $this->db->query($query)->fetchAll();
	}

	public function itemProdutos($id) {
		
		$query = "select id, descricao, preco from tb_produtos where id =".$id;
		return $this->db->query($query)->fetchAll();
	}

	public function salvarProduto($produto) {
	   var_dump($produto);
       if ($this->getId()==0) {
		   $query = "insert into tb_produtos (descricao, preco) values('".$produto->getDescricao()."',".$produto->getPreco().")";
	    }
	    else  {
		   $query = "update tb_produtos set descricao = '".$produto->getDescricao()."', preco = ".$produto->getPreco()." where id = ".$produto->getId();
	    } 
		return $this->db->query($query)->fetchAll();
	}

	public function excluirProduto($id) {
	   $query = "delete from tb_produtos where id = ".$id;
		return $this->db->query($query)->fetchAll();
	}
}
?>