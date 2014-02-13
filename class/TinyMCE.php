<?php
/**
	TinyMCE Editor Addons
	Version: 1.0
	Author: Andi Dittrich
	Author URI: http://andidittrich.de
	Plugin URI: http://www.a3non.org/go/enlighterjs
	License: MIT X11-License
	
	Copyright (c) 2014, Andi Dittrich

	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
namespace Enlighter;

class TinyMCE{
	
	// stores the plugin config
	private $_config;
	
	// plugin supported languages
	private $_supportedLanguageKeys;
	
	public function __construct($settingssUtil, $languageKeys){
		// store local plugin config
		$this->_config = $settingssUtil->getOptions();
		
		// store languages
		$this->_supportedLanguageKeys = $languageKeys;
		
		// add filter to enable the custom style menu - low priority to avoid conflicts with other plugins which try to overwrite the settings
		add_filter('mce_buttons_2', array($this, 'activateStyleButton'), 101);
		
		// add filter to add custom formats - low priority to avoid conflicts with other plugins which try to overwrite the settings
		add_filter('tiny_mce_before_init', array($this, 'insertFormats'), 101);
	}
	
	
	// insert styleselect menu into the $buttons array
	public function activateStyleButton($buttons){
		// styleselect menu already enabled ?
		if (!in_array('styleselect', $buttons)){
			array_unshift($buttons, 'styleselect');
		}
		return $buttons;
	}
	
	// callback function to filter the MCE settings
	public function insertFormats($tinyMceConfigData){
		// new style formats
		$styles = array();
		
		// style formats already defined ?
		if (isset($tinyMceConfigData['style_formats'])){
			$styles = json_decode($tinyMceConfigData['style_formats']);
		}
		
		// add all supported languages as Enlighter Style
		foreach ($this->_supportedLanguageKeys as $name => $lang){
				
			// define new enlighter style formats
			$styles[] =	array(
					'title' => 'Enlighter: '.$name,
					'block' => 'pre',
					'classes' => 'EnlighterJSRAW',
					'wrapper' => false,
					'selector' => 'pre.EnlighterJSRAW',
					'attributes' => array(
						'data-enlighter-language' => $lang
					)
			);
			/*
			// define new enlighter style formats
			$styles[] =	array(
					'title' => 'Enlighter (Inline): '.$name,
					'inline' => 'code',
					'classes' => 'EnlighterJSRAW',
					'wrapper' => false,
					'selector' => 'code.EnlighterJSRAW',
					'attributes' => array(
							'data-enlighter-language' => $lang
					)
			);
			*/
		}
	
		// add code blockformat
		/*
		if (isset($tinyMceConfigData['theme_advanced_blockformats'])){
			if (strpos('code', $tinyMceConfigData['theme_advanced_blockformats'])===false){
				$tinyMceConfigData['theme_advanced_blockformats'] .= 'code';
			}
		}else{
			$tinyMceConfigData['theme_advanced_blockformats']= 'p,address,pre,code,h1,h2,h3,h4,h5,h6';
		}
		*/
		
		// apply modified style data
		$tinyMceConfigData['style_formats'] = json_encode($styles);
		return $tinyMceConfigData;
	}

	
}