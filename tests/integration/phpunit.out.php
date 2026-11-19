<?php

namespace Kirby\Demo;

use PHPUnit\Framework\Attributes\BackupGlobals;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
	#[BackupGlobals(true)]
	public function testDemo(): void
	{
		$this->assertSame('demo', (new Demo())->name());
	}
}
