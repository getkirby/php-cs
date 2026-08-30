<?php

class Demo
{
	public const FOO = 'bar';

	protected array $cache = [];

	public function __construct(
		public string $name,
		protected Page|null $parent = null,
		#[Internal]
		private array $options = []
	) {
	}
}
