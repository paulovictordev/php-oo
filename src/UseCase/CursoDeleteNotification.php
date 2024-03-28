<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Curso;
use App\Observer\Listeners\CursoDeleteObserver;
use App\Observer\Publisher\CursoPublisher;

class CursoDeleteNotification
{
    private CursoPublisher $cursoPublisher;
    private CursoDeleteObserver $cursoObserver;

    public function __construct(
        private Curso $curso
    ) {
        $this->cursoPublisher = new CursoPublisher($curso);
        $this->cursoObserver = new CursoDeleteObserver();
    }

    public function notify()
    {
        $this->cursoPublisher->attach($this->cursoObserver);
        $this->cursoPublisher->notify();
    }
}