<?php

namespace ajda2\Localization;


class ArrayTranslator implements ITranslator {

	/** @var array */
	protected $langTable;

	/** @var array|NULL */
	protected $defaultLangTable;

	/** @var bool */
	protected $strictMode;

	/**
	 * ArrayTranslator constructor.
	 * @param array      $langTable        Index is translation code, value is tranated text
	 * @param array|NULL $defaultLangTable Translation fallback
	 * @param bool       $strictMode
	 */
	public function __construct(array $langTable, array $defaultLangTable = NULL, $strictMode = FALSE) {
		$this->langTable = $langTable;
		$this->defaultLangTable = $defaultLangTable;
		$this->strictMode = $strictMode;
	}

	/**
	 * @param string $code
	 * @return string
	 * @throws MissingTranslationException
	 */
	public function translate($code) {
		if (isset($this->langTable[$code])) {
			return $this->langTable[$code];
		}

		if ($this->strictMode) {
			throw new MissingTranslationException("Missing translation for '{$code}'");
		}

		if (isset($this->defaultLangTable[$code])) {
			return $this->defaultLangTable[$code];
		}

		return $code;
	}

	/**
	 * @param bool $mode
	 * @return $this
	 */
	public function setStrictMode($mode = TRUE) {
		$this->strictMode = $mode;

		return $this;
	}
}

class MissingTranslationException extends \Exception {

}