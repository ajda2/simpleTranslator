<?php

namespace ajda2\Localization;


interface ITranslator {

	/**
	 * @param $code
	 * @return string
	 */
	public function translate($code);
}