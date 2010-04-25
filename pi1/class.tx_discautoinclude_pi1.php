<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jon Langeland <kemo@discworld.dk>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*
* Hint: use extdeveval to insert/update function index above.
*/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
* Plugin 'DISC :: AutoIncluder' for the 'disc_autoinclude' extension.
*
* @author	Jon Langeland <kemo@discworld.dk>
* @package	TYPO3
* @subpackage	tx_discautoinclude
*/
class tx_discautoinclude_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_discautoinclude_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_discautoinclude_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'disc_autoinclude';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	* The main method of the PlugIn
	*
	* @param	string		$content: The PlugIn content
	* @param	array		$conf: The PlugIn configuration
	* @return	The content that is displayed on the website
	*/
	function main($content, $conf)	{
		
		$this->conf = $conf;
		
		if(!(bool)$this->conf['disable']){
			# Include CSS
			if(!(bool)$this->conf['css.']['disable']){
				$path = PATH_site.$this->conf['css.']['include_dir'];
				$files['css'] = t3lib_div::getFilesInDir($path,$extensionList='css',$prependPath=0,$order='');
				
				//return print_r($path,1);
				
				foreach($files['css'] AS $md5=>$file){
					$GLOBALS['TSFE']->additionalHeaderData[$md5] = '<link rel="stylesheet" type="text/css" href="'.$this->conf['css.']['include_dir'].$file.'" />';
				}
				
			}
			
			# Include JS
			if(!(bool)$this->conf['js.']['disable']){
				$path = PATH_site.'/'.$this->conf['js.']['include_dir'];
				$files['js'] = t3lib_div::getFilesInDir($path,$extensionList='js',$prependPath=0,$order='');
				
				foreach($files['js'] AS $md5=>$file){
					$GLOBALS['TSFE']->additionalHeaderData[$md5] = '<script type="text/javascript" src="'.$this->conf['js.']['include_dir'].$file.'"></script>';
				}
			}
			
			return null;
		}else{
			return null;
		}
		
		
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/disc_autoinclude/pi1/class.tx_discautoinclude_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/disc_autoinclude/pi1/class.tx_discautoinclude_pi1.php']);
}

?>