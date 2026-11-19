<?php

namespace Kirby\Demo;

use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
	/**
	 * @backupGlobals enabled
	 */
	public function testDemo(): void
	{
		$this->assertSame('demo', (new Demo())->name());
	}
}
