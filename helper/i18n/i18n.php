<?php
/*
 * Author midmike
 */
class i18n {
	public static function getLabel($phrase) {
		echo self::getLabelWithoutWrite ( $phrase );
	}
	public static function getLabelWithoutWrite($phrase) {
		// the original of this code can be found on:
		// http://www.mind-it.info/2010/02/22/a-simple-approach-to-localization-in-php/
		/* Static keyword is used to ensure the file is loaded only once */
		static $translations = NULL;
		if (is_null ( $translations )) {
			$lang_file = SITE_ROOT . '/helper/i18n/lang/' . $_SESSION ["locale"] . '.txt';
			/* If no instance of $translations has occured load the language file */
			if (! file_exists ( $lang_file )) {
				$lang_file = SITE_ROOT . '/helper/i18n/lang/' . 'en.txt';
			}
			$lang_file_content = file_get_contents ( $lang_file );
			/*
			 * Load the language file as a JSON object
			 * and transform it into an associative array
			 */
			$translations = json_decode ( $lang_file_content, true );
		}
		$phrase = utf8_encode ( $phrase );
		if (isset ( $translations [$phrase] )) {
			return $translations [$phrase];
		} else {
			return $phrase;
		}
	}
	public static function changeLocale($locale, $session) {
		Session_Handler::checkSession ();
		$_SESSION ["locale"] = setlocale ( LC_ALL, $locale );
	}
}
?>