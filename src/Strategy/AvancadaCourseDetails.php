<?php

declare(strict_types=1);

namespace App\Strategy;

class AvancadaCourseDetails implements CourseDetailsStrategy
{
    public function getWorkload(): int
    {
        return 96;
    }

    public function getBasePrice(): float
    {
        return 2319.90;
    }
}