<?php

declare(strict_types=1);

namespace App\Strategy;

class FormacaoCourseDetails implements CourseDetailsStrategy
{
    public function getWorkload(): int
    {
        return 192;
    }

    public function getBasePrice(): float
    {
        return 3489.90;
    }
}