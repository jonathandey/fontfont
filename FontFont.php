<?php

namespace JD\FontFont;

use JD\FontFont\Library\LocalFileLibrary;
use JD\FontFont\Font\FontCollectionUrlGenerator;
use JD\FontFont\Font\Contracts\FontUrlGeneratorInterface;

class FontFont
{
	public static function loadFontDirectory($dir, FontUrlGeneratorInterface $urlGenerator = null)
	{
		$library = new LocalFileLibrary($dir, '/\.(ttf|otf)$/');
		$fontCollection = $library->loadFonts();

		if (! is_null($urlGenerator)) {
			(new FontCollectionUrlGenerator($fontCollection, $urlGenerator))->generate();
		}

		return self::$fontCollection = $fontCollection;
	}
}