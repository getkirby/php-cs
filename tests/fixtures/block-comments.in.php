<?php

class Demo
{
	public const FIRST  = 1;  // not the last one in its block
	public const SECOND = 2;  // trailing the last one
	protected int $count = 0; /* trailing, block comment */
	// belongs to the property below
	private int $total = 0;
	public function method(): void
	{
	}
}
