<?php

namespace Kirby\Demo;

use LogicException;

class BlankLines
{
	public function load(bool $cached): array
	{
		if ($cached === true) {
			$data = $this->cache();

			$data = $this->normalize($data);

		} else {
			$data = $this->fetch();
		}

		try {
			$this->validate($data);

		} catch (LogicException) {
			return [];
		}

		return $data;
	}
}
