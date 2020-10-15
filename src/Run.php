<?php

namespace Scm;

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
