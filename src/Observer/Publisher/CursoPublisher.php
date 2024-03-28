<?php

declare(strict_types=1);

namespace App\Observer\Publisher;

use App\Entity\Curso;
use SplSubject;
use SplObserver;
use SplObjectStorage;

class CursoPublisher implements SplSubject
{
    private SplObjectStorage $observers;

    public function __construct(
        private Curso $curso
    ) {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getCursoToNotify(): Curso
    {
        return $this->curso;
    }
}