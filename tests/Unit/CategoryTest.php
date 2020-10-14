<?php

namespace Scm\Tests\Unit;

use Scm\Category;

/**
 * Initial test to validate Pest and phpunit-watcher
 */
it('should work')->assertTrue(true);

/**
 * Assert that it is an instance of Category
 */
$category = new Category;
it("shoulb be an instance of Category")->expect($category)->toBeInstanceOf(Category::class);
