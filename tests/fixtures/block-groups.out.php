<?php

class Demo
{
	use Alpha;
	use Beta;

	public const FOO = 'bar';
	public const BAZ = 'qux';

	public static array $types = [];
	public static int $limit = 10;

	public array $data = [];
	public string $name = '';

	protected int $count = 0;
	protected bool $ready = false;
	private array $cache = [];

	protected static string $key = 'view';
	private static self|null $instance = null;
}
