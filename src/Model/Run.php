<?php declare(strict_types=1);

namespace Scm\Model;

class Run{
    private int $id;
    private int $number;
    private float $time;

    /**
     * Get the value of id
     */ 
    final public function getId(): int
    {
        return $this->id;
    }
}
