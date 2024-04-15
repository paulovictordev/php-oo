<?php

declare(strict_types=1);

namespace App\Strategy;

interface CourseDetailsStrategy
{
    public function getWorkload(): int;

    public function getBasePrice(): float;
}