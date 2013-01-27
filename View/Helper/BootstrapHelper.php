<?php
/*
 * Twitter Bootstrap View Helper 
 *
 * Copyright 2012, visionred (http://visionred.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author 		  Florian Nitschmann (f.nitschmann@visionred.org) 
 * @copyright     Copyright 2012, visionred (http://visionred.org)
 * @link          http://visionred.org, visionred Web Solutions
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class BootstrapHelper extends AppHelper {
		
	public $helpers = array('Html');			

	/*
	 * laod($type = 'min') - Load all Twitter Bootstap Framework Files
	 * 
	 * @access public
	 * @param String $type - The type for the Twitter Bootstrap Version (min: compressed, dev: uncompressed) 
	 * @return html  
	 */
	public function load($type = 'min',$responsive = false) {
		//Create the html tags: 
		echo $this->Html->css('twitter/bootstrap/'.$this->filename($type).''); 
		if($responsive) {
			echo $this->Html->css('twitter/bootstrap/'.$this->filename($type,$responsive).'');
		}
		echo $this->Html->script('twitter/bootstrap/'.$this->filename($type).'');
	}

	/*
	 * css($type = 'min') - Load Twitter Bootstrap CSS File
	 * 
	 * @access public
	 * @param String $type - The type for the Twitter Bootstrap Version (min: compressed, dev: uncompressed) 
	 * @return html  
	 */
	public function css($type = 'min',$responsive = false) {
		//Load CSS and create html tag: 
		echo $this->Html->css('twitter/bootstrap/'.$this->filename($type,$responsive).''); 
	}

	/*
	 * js($type = 'min') - Load Twitter Bootstrap JS File
	 * 
	 * @access public
	 * @param String $type - The type for the Twitter Bootstrap Version (min: compressed, dev: uncompressed) 
	 * @return html  
	 */
	public function js($type = 'min') {
		//Load JS and create html tag: 
		echo $this->Html->script('twitter/bootstrap/'.$this->filename($type).''); 			
	}

	/*
	 * filename($type) - Returns the specific filename for compressed or uncompressed Bootstrap Files
	 * 
	 * @access private
	 * @param String $type - dev for uncompressed or min for compressed files
	 * @return String 
	 */
	private function filename($type,$responsive = false) {
		$type = strtolower($type); 
		$filename = 'bootstrap';
		if($responsive) $filename .= "-responsive";
		
		if(!($type == 'dev')) {
			$filename .= '.min';
		}
		
		// if($type == 'dev' || $type == 'min') {
		// 	if($type == 'dev') $filename = 'bootstrap';
		// 	else $filename = 'bootstrap.min'; 
		// }
		// else $filename = 'bootstrap.min'; 
		
		return $filename; 
	}

}
