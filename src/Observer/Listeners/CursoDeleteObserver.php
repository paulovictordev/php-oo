<?php

declare(strict_types=1);

namespace App\Observer\Listeners;

use SplObserver;
use SplSubject;
use App\Observer\Publisher\CursoPublisher;

class CursoDeleteObserver implements SplObserver
{
    public function update(SplSubject|CursoPublisher $subject): void
    {

        echo "<pre>";
        print_r($subject->getCursoToNotify());
        echo "</pre>";

        $curso = $subject->getCursoToNotify();
        echo "Chamou o update do Curso {$curso->nome} Observador" . PHP_EOL;
    }
}