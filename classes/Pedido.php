<?php

class Pedido {
    private $numero;
    private $cliente;
    private $produtos;

    public function __construct($numero, Cliente $cliente) {
        $this->numero = $numero;
        $this->cliente = $cliente;
        $this->produtos = array();
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function getProdutos() {
        return $this->produtos;
    }

    // Adiciona um produto ao pedido
    public function adicionarProduto(Produto $produto) {
        $this->produtos[] = $produto;
    }

    // Calcula o total do pedido
    public function calcularTotal() {
        $total = 0;
        foreach ($this->produtos as $produto) {
            $total += $produto->getPreco();
        }
        return $total;
    }

    // Exibe o resumo do pedido
    public function exibirResumo() {
        $resumo = "Pedido Nº " . $this->numero . "\n\n";
        $resumo .= "Cliente:\n";
        $resumo .= $this->cliente->getNome() . "\n";
        $resumo .= $this->cliente->getEmail() . "\n\n";
        $resumo .= "Produtos:\n";
        
        foreach ($this->produtos as $produto) {
            $resumo .= $produto->getNome() . " - R$ " . number_format($produto->getPreco(), 2, ',', '.') . "\n";
        }
        
        $resumo .= "\nTotal do Pedido: R$ " . number_format($this->calcularTotal(), 2, ',', '.');
        
        return $resumo;
    }
}

?>
