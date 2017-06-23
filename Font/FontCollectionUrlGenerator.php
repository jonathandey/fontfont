<?php

namespace JD\FontFont\Font;

use JD\FontFont\Font\Contracts\FontUrlGeneratorInterface;

class FontCollectionUrlGenerator
{
	protected $fonts = [];

	protected $urlGenerator = null;

	public function __construct(FontCollection $fonts, FontUrlGeneratorInterface $urlGenerator)
	{
		$this->fonts = $fonts->toArray();

		$this->urlGenerator = $urlGenerator;
	}

	public function generate()
	{
		foreach ($this->fonts as $font) {
			$font->getUrl($this->urlGenerator);
		}
	}
}