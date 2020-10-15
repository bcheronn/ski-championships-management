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
$category = new Category();
it("should be an instance of Category")->expect($category)->toBeInstanceOf(Category::class);
it("should have a property id")->expect($category)->toHaveProperty("id");
it("should have a property name")->expect($category)->toHaveProperty("name");
it("should have a property description")->expect($category)->toHaveProperty("description");
