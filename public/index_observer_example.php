<?php

interface Subject
{
    public function attach(Observer $observable): void;

    public function detach(Observer $observer): void;

    public function notify(): void;
}

interface Observer
{
    public function update();
}

class Loja implements Subject
{
    private int $stock = 0;
    private array $observers = [];

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $qty): self
    {
        $this->stock += $qty;

        $this->notify();

        return $this;
    }

    public function attach(Observer $observable): void
    {
        $this->observers[] = $observable;
    }

    public function detach(Observer $observer): void
    {
        unset($this->observers[$observer]);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class Cliente implements Observer
{
    public function update()
    {
        echo "Cliente notificado que o produto chegou na loja." . PHP_EOL;
    }
}

class Logista implements Observer
{
    public function update()
    {
        echo "Logista notificado que o produto chegou na loja." . PHP_EOL;
    }
}

$loja = new Loja();

$clienteJoao = new Cliente();
$LojaFilial = new Logista();

$loja->attach($clienteJoao);
$loja->attach($LojaFilial);

$loja->setStock(10);