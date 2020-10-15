<?php

namespace Scm\Tests\Unit;

use Scm\Run;

/**
 * Assert that it is an instance of Class
 */
$run = new Run();
it("should be an instance of class Run")->expect($run)->toBeInstanceOf(Run::class);
it("should have the property id")->expect($run)->toHaveProperty("id");
it("should have the property number")->expect($run)->toHaveProperty("number");
it("should have the property time")->expect($run)->toHaveProperty("time");
