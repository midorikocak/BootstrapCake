<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');



class TestShell extends AppShell {

	public function main() {
		$file = new File(''.APP::pluginPath('BootstrapCake').'webroot'.DS.'current_bootstrap.zip'); 
		//copy('http://twitter.github.com/bootstrap/assets/bootstrap.zip', $file->pwd()); 
		/*if($file->exists()) {
			$tarName = $file->pwd();
			$folder = $file->Folder(); 
			$path = $folder->pwd(); 
			//$this->out($path);  
			$shell = "unzip $tarName -d $path";
			$shell = escapeshellcmd($shell);
			exec($shell,$nu);
			print_r($nu); 
		}
		else {*/
			$content = file_get_contents('http://twitter.github.com/bootstrap/assets/bootstrap.zip'); 
			$fp = fopen($file->pwd(), 'w'); 
			fwrite($fp, $content);
			fclose($fp); 
			//$this->out(php_uname(1)); 
		//}
	}

}