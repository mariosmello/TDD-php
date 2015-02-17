<?php

namespace CDC\Loja\Produto;

require './vendor/autoload.php';

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use CDC\Loja\Produto\MaiorEMenor;
use PHPUnit_Framework_TestCase as PHPUnit;

class MaiorEMenorTest extends PHPUnit
{
    public function testOrdemDecrecente()
    {
        $carrinho = new CarrinhoDeCompras;

        $carrinho->adiciona(new Produto("Geladeira", 450.00));
        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de Pratos", 70.00));

        $maiorMenor = new MaiorEMenor;
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de Pratos", $maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
    }

    public function testOrdemCrescente()
    {
        $carrinho = new CarrinhoDeCompras;

        $carrinho->adiciona(new Produto("Jogo de Pratos", 70.00));
        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorMenor = new MaiorEMenor;
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de Pratos", $maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
    }

    public function testOrdemAleatoria()
    {
        $carrinho = new CarrinhoDeCompras;

        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de Pratos", 70.00));
        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorMenor = new MaiorEMenor;
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de Pratos", $maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
    }

    public function testApenasUmProduto()
    {
        $carrinho = new CarrinhoDeCompras;

        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorMenor = new MaiorEMenor;
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Geladeira", $maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
    }
}