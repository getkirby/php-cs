<?php

class Demo
{
	public array $data = [];
	private int $count = 0;

	public function factory(): object
	{
		return new class () {
			public string $name = '';
			private array $options = [];
		};
	}

	public function reset(): void
	{
		$this->count = 0;
	}
}
