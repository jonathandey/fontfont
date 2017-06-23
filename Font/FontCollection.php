<?php

namespace JD\FontFont\Font;

class FontCollection
{
	protected $items = [];

	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function toArray()
	{
		return $this->items;
	}

	public function toJson()
	{
		return json_encode($this->toArray());
	}

	public function fill($items)
	{
		$this->items = $items;

		return $this;
	}
}