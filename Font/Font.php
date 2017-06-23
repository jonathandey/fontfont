<?php

namespace JD\FontFont\Font;

use JD\FontFont\Font\Contracts\FontUrlGeneratorInterface;

class Font
{
	public $name = null;

	public $filename = null;

	protected $path = null;

	public $url = null;

	public function __construct($name, $filename, $path)
	{
		$this->name = $name;

		$this->filename = $filename;

		$this->path = $path;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function getUrl(FontUrlGeneratorInterface $urlGenerator)
	{
		if (! is_null($this->url)) {
			return $this->url;
		}

		return $this->url = $urlGenerator->url($this);
	}
}