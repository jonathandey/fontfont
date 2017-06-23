<?php

namespace JD\FontFont\Font\Contracts;

use JD\FontFont\Font\Font;

interface FontUrlGeneratorInterface
{
	public function url(Font $font);
}