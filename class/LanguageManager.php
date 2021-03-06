<?php
/**
	Try to load User-Languages from the `enlighter` directory of current selected Theme
	Version: 1.0
	Author: Andi Dittrich
	Author URI: http://andidittrich.de
	Plugin URI: http://andidittrich.de/go/enlighterjs
	License: MIT X11-License
	
	Copyright (c) 2014, Andi Dittrich

	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
namespace Enlighter;

class LanguageManager{
	
	private $_cache;
	private $_url;
	
	public function __construct($cacheManager){
		// initialize object caache
		$this->_cache = new ObjectCache($cacheManager->getCachePath().'userlanguages.cache.php');
	}
	
	// drop cache content and remove cache file
	public function forceReload(){
		$this->_cache->clear();
	}
	
	public function getUserLanguages(){
		// cached data available ?
		if (!$this->_cache->isCachedDataAvailable()){
			// get template directories
			$childDir = get_stylesheet_directory();
			$themeDir = get_template_directory();
			
			// load enlighter-languages from current theme
			$languageFiles = $this->getJsFilesFromDirectory($themeDir, get_template_directory_uri());
			
			// load enlighter-languages from current child-theme (if used)
			if ($childDir != $themeDir){
				$languageFiles = array_merge($languageFiles, $this->getJsFilesFromDirectory($childDir, get_stylesheet_directory_uri()));	
			}
			
			// store data
			$this->_cache->setData($languageFiles);
		}
				
		return $this->_cache->getData();
	}
	
	public function getUserLanguageKeys(){
		$languages = array();
		foreach($this->getUserLanguages() as $language => $source) {
			$languages[$source[2]] = $language;
		}
		return $languages;
	}
	
	private function getJsFilesFromDirectory($dir, $uri){
		// enlighter subdirectory
		$dir .= '/enlighter/';
		$uri .= '/enlighter/';
		
		// available ?
		if (!is_dir($dir)){
			return array();
		}
		
		// get all files of the selected directory
		$files = scandir($dir);
		
		// language buffers
		$languages = array();
		
		// filter js files
		foreach($files as $file){
			if ($file != '.' && $file != '..'){
				if (substr($file, -2) == 'js'){
					$data = get_file_data($dir.$file, array('language'));
					// absolute path + uri for external themes
					$languages[basename($file, '.js')] = array(
							$dir.$file,
							$uri.$file,
							$data[0]
					);
				}
			}
		}
		
		return $languages;
	}
	
}