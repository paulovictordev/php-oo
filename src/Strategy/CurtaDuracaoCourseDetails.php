<?php

declare(strict_types=1);

namespace App\Strategy;

class CurtaDuracaoCourseDetails implements CourseDetailsStrategy
{
    public function getWorkload(): int
    {
        return 16;
    }

    public function getBasePrice(): float
    {
        return 289.90;
    }
}