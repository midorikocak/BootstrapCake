<?php 

App::uses('File', 'Utility');	
App::uses('Folder', 'Utility');	

class TwitterBootstrap {

	/**
	 * The updater object 
	 *
	 * @access public 
	 * @var object 
	 */
	public $updater; 

	/**
	 * File for package info  
	 *
	 * @access private
	 * @var string
	 */
	private $package_info_file = 'https://raw.github.com/twitter/bootstrap/master/package.json'; 

	/**
	 * Package info about the current framework version
	 *
	 * @access public
	 * @var array 
	 */
	public $package_info; 

	/**
	 * Current version of twitter bootstrap 
	 * 
	 * @access public
	 * @var int 
	 */
	public $version; 


	public function __construct() {
		//Updates 
		$updater_file = new File(''.APP::pluginPath('BootstrapCake').'Vendor'.DS.'TwitterBootstrapUpdater.php'); 
		include_once($updater_file->pwd()); 
		//Infos/Version
		$this->package_info = json_decode(file_get_contents($this->package_info_file), true); 
		$this->version = $this->package_info['version'];    
	}

}