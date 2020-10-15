<?php

namespace Scm;

/**
 * Metadata
 */
abstract class Metadata
{
    protected int $id;
    protected string $name;
    protected string $description;

    abstract protected function create();
    abstract protected function update();
    abstract protected function delete();
    abstract protected function list();
}
