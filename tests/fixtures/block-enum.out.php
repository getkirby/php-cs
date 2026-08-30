<?php

enum Status: string
{
	case Draft = 'draft';
	case Listed = 'listed';
	case Unlisted = 'unlisted';

	public const DEFAULT = self::Draft;
	public const FALLBACK = self::Unlisted;

	public function label(): string
	{
		return ucfirst($this->value);
	}
}
