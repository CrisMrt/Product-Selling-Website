<?php 
class Produto {
    public $id;
    public $nome;
    public $descricao;
    public $filename;
    public $price;
    public $idcategoria;
}

class ProdutoGet{
    public $id;
    public $nome;
    public $descricao;
    public $nomeficheiro;
    public $price;
}

Class CategoriaProduto{
    public $nome;
    public $idCategoria;
}

Class ItemCarrinho{
    public $idCarrinho;
    public $quantidade;
    public $produto;
}


class CarrinhoCompras{
    public $idCarrinho;
    public $listaItens = array();
    public $total;
}

class ItemCarrinhoSimples {
    public $id;
    public $quantidade;
}


?>