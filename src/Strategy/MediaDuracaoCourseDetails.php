<?php

declare(strict_types=1);

namespace App\Strategy;

class MediaDuracaoCourseDetails implements CourseDetailsStrategy
{
    public function getWorkload(): int
    {
        return 44;
    }

    public function getBasePrice(): float
    {
        return 799.90;
    }
}