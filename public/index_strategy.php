<?php

interface ClienteDesconto
{
    public function desconto($valor);
}

class Cliente implements ClienteDesconto
{
    public $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function desconto($valor)
    {
        return $valor - $valor * 0.05;
    }
}

class ClienteVip implements ClienteDesconto
{
    public $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function desconto($valor)
    {
        return $valor - $valor * 0.1;
    }
}



class Carrinho
{
    public $cliente;

    public $itens = [];
    
    public function __construct($cliente)
    {
        $this->cliente = $cliente;
    }

    public function addItem($item)
    {
        $this->itens[] = $item;
    }

    public function total()
    {
        $total = 0;
        
        foreach($this->itens as $item) {
            $total += $item['valor'] * $item['qtd'];
        }

        $total = $this->cliente->desconto($total);

        return $total;
    }

}

$cliente = new Cliente('normal');

$clienteVip = new  ClienteVip('vip');

$item1 = [
    'desc' => 'Fone',
    'qtd' => 1,
    'valor' => 10
];

$item2 = [
    'desc' => 'Carregador',
    'qtd' => 1,
    'valor' => 50
];

$carrinho = new Carrinho($clienteVip);

$carrinho->addItem($item1);
$carrinho->addItem($item2);

echo "Total do Carrinho: {$carrinho->total()}";


