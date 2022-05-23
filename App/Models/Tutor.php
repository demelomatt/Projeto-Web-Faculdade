<?php
namespace App\Models;
class Tutor {

    protected $id; 
    protected $cpf; 
    protected $nome; 
    protected $celular; 
    protected $telefone;
    protected $cep;
    protected $uf;
    protected $logradouro;
    protected $cidade;  
    protected $bairro; 
    protected $numero_endereco; 
    protected $complemento_endereco;

    protected $email;
    protected $senha; 

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

    
    public function getEmail() {
    	return $this->email; 
    }
    public function setEmail($email) {
    	$this->email = $email; 
    }

    public function getSenha() {
    	return $this->senha; 
    }
    public function setSenha($senha) {
    	$this->senha = $senha; 
    }


    public function getId() {
        $query = "SELECT id_tutor FROM tb_tutor where email= '". $this->getEmail() ."'";
        $output =  $this->db->query($query)->fetchAll();
        $id = $output[0]['id_tutor'];
        return $id;
    }

    public function getCpf() {
    	return $this->cpf; 
    }
    public function setCpf($cpf) {
    	$this->cpf = $cpf; 
    }

    public function getNome() {
    	return $this->nome; 
    }
    public function setNome($nome) {
    	$this->nome = $nome; 
    }

    public function getCelular() {
    	return $this->celular; 
    }
    public function setCelular($celular) {
    	$this->celular = $celular; 
    }

    public function getTelefone() {
    	return $this->telefone; 
    }
    public function setTelefone($telefone) {
    	$this->telefone = $telefone; 
    }

    public function getCep() {
    	return $this->cep; 
    }
    public function setCep($cep) {
    	$this->cep = $cep; 
    }

    public function getNumeroEndereco() {
    	return $this->numero_endereco; 
    }
    public function setNumeroEndereco($numero_endereco) {
    	$this->numero_endereco = $numero_endereco; 
    }

    public function getComplementoEndereco() {
    	return $this->complemento_endereco; 
    }
    public function setComplementoEndereco($complemento_endereco) {
    	$this->complemento_endereco = $complemento_endereco; 
    }

    public function getUf() {
    	return $this->uf; 
    }
    public function setUf($uf) {
    	$this->uf = $uf; 
    }

    public function getLogradouro() {
    	return $this->logradouro; 
    }
    public function setLogradouro($logradouro) {
    	$this->logradouro = $logradouro; 
    }

    public function getCidade() {
    	return $this->cidade; 
    }
    public function setCidade($cidade) {
    	$this->cidade = $cidade; 
    }

    public function getBairro() {
    	return $this->bairro; 
    }
    public function setBairro($bairro) {
    	$this->bairro = $bairro; 
    }

    public function cadastrarTutor($tutor) {

        // Chechar se cpf ou email já foram cadastrados 
        $query = sprintf("select id_tutor, cpf, email from tb_tutor where cpf = %s or email = %s", "'".$tutor->getCpf()."'", "'".$tutor->getEmail()."'");
        $result = $this->db->query($query)->fetchAll();

        // Retornar 0 se houver registros
        if($result){
            return 0;
        }

        else{
            $query = "insert into tb_tutor (nome, cpf, celular, email, senha, telefone, cep, uf, logradouro, cidade, bairro, numero, complemento) 
            values(
                '".$tutor->getNome()."',
                '".$tutor->getCpf()."',
                '".$tutor->getCelular()."',
                '".$tutor->getEmail()."',
                '".$tutor->getSenha()."',
                '".$tutor->getTelefone()."', 
                '".$tutor->getCep()."', 
                '".$tutor->getUf()."', 
                '".$tutor->getLogradouro()."', 
                '".$tutor->getCidade()."', 
                '".$tutor->getBairro()."', 
                '".$tutor->getNumeroEndereco()."', 
                '".$tutor->getComplementoEndereco()."' 
            )";
            
            return $this->db->query($query)->fetchAll();
    
        }


	}

    public function iniciarSessao($tela){
        session_start();
        
        $_SESSION["user"] = $this->getId();
        header("Location: /".$tela);
    }


    public function getTutor($id) {

        $query = "SELECT * FROM tb_tutor where id_tutor= '". $id ."'";

		return $this->db->query($query)->fetchAll();
	}

    public function loginTutor($tutor) {

        $query = "SELECT * FROM tb_tutor where email= '". $tutor->getEmail() . "'and senha ='" .$tutor->getSenha() ."'";

		return $this->db->query($query)->fetchAll();
	}



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