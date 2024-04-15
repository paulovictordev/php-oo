<?php

declare(strict_types=1);

namespace App\Strategy;

class IntensivoCourseDetails implements CourseDetailsStrategy
{
    public function getWorkload(): int
    {
        return 72;
    }

    public function getBasePrice(): float
    {
        return 1109.90;
    }
}