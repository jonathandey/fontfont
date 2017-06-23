<?php

namespace JD\FontFont\Library;

use JD\FontFont\Font\Font;
use Symfony\Component\Finder\Finder;
use JD\FontFont\Font\FontCollection;
use JD\FontFont\Library\Contracts\LibraryInterface;

class LocalFileLibrary implements LibraryInterface
{
	protected $fontDirectoryPath = null;

	protected $fileMatch = null;

	private $finder = null;

	public function __construct($fontDirectoryPath, $fileMatch = null)
	{
		$this->fontDirectoryPath = $fontDirectoryPath;

		$this->fileMatch = $fileMatch;

		$this->finder = new Finder;
	}

	public function loadFonts()
	{
		$fonts = $this->loadFontsFromDirectory();

		$collection = new FontCollection($fonts);

		return $collection;
	}

	protected function loadFontsFromDirectory()
	{
		$loadedFonts = [];

		$fonts = $this->finder
			->files()
			->in($this->fontDirectoryPath)
		;

		if (! is_null($this->fileMatch))
		{
			$fonts->name($this->fileMatch);
		}

		foreach ($fonts as $font) {
			$fileInfo = pathinfo($font->getFilename());

			$loadedFonts[] = new Font(
				$fileInfo['filename'], 
				$font->getFilename(),
				$font->getRealPath()
			);
		}

		return $loadedFonts;
	}
}