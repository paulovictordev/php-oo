<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Curso;
use App\Strategy\AvancadaCourseDetails;
use App\Strategy\CurtaDuracaoCourseDetails;
use App\Strategy\FormacaoCourseDetails;
use App\Strategy\CourseDetailsStrategy;
use App\Strategy\IntensivoCourseDetails;
use App\Strategy\MediaDuracaoCourseDetails;

class SetCourseDatails
{
    protected CourseDetailsStrategy $workloadStrategy;

    public function __construct(
        protected Curso $curso
    ) {
        $this->workloadStrategy = match ($this->curso->types) {
            'formacao' => new FormacaoCourseDetails(),
            'curta_duracao' => new CurtaDuracaoCourseDetails(),
            'media_duracao' => new MediaDuracaoCourseDetails(),
            'avancada' => new AvancadaCourseDetails(),
            'intensivo' => new IntensivoCourseDetails(),
            default => throw new \InvalidArgumentException('Modalidade de curso não encontrada')
        };
    }

    public function execute(): void
    {
        $this->curso->workload = $this->workloadStrategy->getWorkload();
        // base_price etc...
    }
}