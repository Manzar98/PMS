<?php

	class Translator
	{
		function __construct($languageCode)
		{
			$translationFilePath = APP_PATH . '_templates' . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR . '_translations' . DIRECTORY_SEPARATOR . 'translations_' . $languageCode . '.ini';
            //echo $translationFilePath;
			if (file_exists($translationFilePath)) 
			{
				$this->translations = parse_ini_file($translationFilePath, true);
			} 
			else 
			{
				die("Unable to find the translation file for language $languageCode!");
			}
		}
		public function getTranslations()
		{
			return $this->translations;
		}
		
		public function translate()
		{
			 $numargs = func_num_args();
			 
			 if ($numargs < 1)
			 	trigger_error('Translator.translate requires at least the label as parameter');
			 else
			 {
			 	$arguments = func_get_args();
			 	
			 	$label = $this->getLabel($arguments);
			 	
			 	if ($this->existsLabel($label))
			 	{
			 		$message = $this->getMessage($label);
			 		
			 		$placeholders = $this->getMessagePlaceholders($arguments);
			 		
			 		if (count($placeholders) == 0)
			 			return $message;
			 			
				 	return $this->replacePlaceholders($message, $placeholders);
			 	}
				else
			 		return $label;
			 }
		}
		
		private function getLabel($arguments)
		{
			return $arguments[0];
		}
		
		private function existsLabel($label)
		{
			list($section, $sectionMessage) = explode(".", $label);
			
			return array_key_exists($section, $this->translations) && array_key_exists($sectionMessage, $this->translations[$section]);
		}
		
		private function getMessage($label)
		{
			list($section, $sectionMessage) = explode(".", $label);
			
			return $this->translations[$section][$sectionMessage];
		}
		
		private function getMessagePlaceholders($arguments)
		{
			$messagePlaceholders = $arguments;
			
			array_shift($messagePlaceholders);
			
			return $messagePlaceholders;
		}
		
		private function replacePlaceholders($message, $placeholders)
		{
			$messageWithReplacePlaceholders = $message;
			
			for ($index = 0; $index < count($placeholders); $index++) 
			{
				$messageWithReplacePlaceholders = str_replace('{' . $index . '}', $placeholders[$index], $messageWithReplacePlaceholders);
			}
			
			return $messageWithReplacePlaceholders;
		}
	}
?>