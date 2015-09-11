<?php 
require './vendor/autoload.php';

// an example test
class ExampleTest extends PHPUnit_Framework_TestCase {

	/*
	@test
	 */
	public function testPassesAsExpected() {
		$this->assertTrue(true);
	}

	/*
	@test
	 */
	public function testFailsAsExpected() {
		$this->assertFalse(false);
	}
}