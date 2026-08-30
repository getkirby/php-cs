<?php

class Demo
{
	use Alpha;

	/**
	 * The types
	 */
	public static array $types = [];

	#[Deprecated]
	public array $data = [];

	/**
	 * Already separated
	 */
	protected int $count = 0;

	#[Internal]
	#[Deprecated]
	protected static string $key = 'view';
}
