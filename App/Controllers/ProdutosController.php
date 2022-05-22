<?php
namespace App\Controllers;
//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
//os models
use App\Models\Produto;

class ProdutosController extends Action {

	public function listaProdutos() {
		$produto = Container::getModel('Produto');
		$produtos = $produto->getProdutos();
		$this->view->dados = $produtos;
		$this->render('listaProdutos', 'layout1');
	}

	public function incluirProduto() {
		$this->render('incluirProduto', 'layout2');
	}

	public function salvarProduto() {
        $id = $_POST["id"];
        $descricao = $_POST["descricao"];
		$preco = $_POST["preco"];
		$produto = Container::getModel('Produto');
		$produto->setId($id);
		$produto->setDescricao($descricao);
		$produto->setPreco($preco);
        $produto->salvarProduto($produto); 
		$this->listaProdutos();
	}

	public function alterarProduto() {
        $id = $_GET["id"];
		$produto = Container::getModel('Produto');
		$produtos = $produto->itemProdutos($id);
		$this->view->dados = $produtos;
		$this->render('alterarProduto', 'layout1');
	}

	public function excluirProduto() {
        $id = $_GET["id"];
		$produto = Container::getModel('Produto');
		$produtos = $produto->excluirProduto($id);
		$this->listaProdutos();
	}
}
?>