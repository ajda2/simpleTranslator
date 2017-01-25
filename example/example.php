<?php

use ajda2\Localization\ArrayTranslator;

require_once __DIR__ . '/../src/ITranslator.php';
require_once __DIR__ . '/../src/ArrayTranslator.php';

$strictMode = FALSE;
$enTable = require_once './translations/en.php'; // Get EN translations
$csTable = require_once './translations/cs.php'; // Get fallback for translations, not required

$translator = new ArrayTranslator($enTable, $csTable, $strictMode);

echo $translator->translate('form.validate.invalid_email') . PHP_EOL; // valid translation
echo $translator->translate('czech_only'); // return 'czech_only' because strictMode is disabled

$translator->setStrictMode(TRUE);

echo $translator->translate('czech_only'); // throw MissingTranslationException because of strict mode