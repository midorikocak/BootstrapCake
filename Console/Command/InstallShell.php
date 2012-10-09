<?php

	App::uses('Folder', 'Utility');

	class InstallShell extends AppShell {

		//App folder paths: 
		private $app_css_folder;
		private $app_img_folder;
		private $app_js_folder; 
		//Plugin folder paths: 
		private $plugin_css_folder;
		private $plugin_img_folder; 
		private $plugin_js_folder;

		//---Shell functions: 

		public function initialize() {
			//Color Setup:
			$this->stdout->styles('green', array('text' => 'green'));
			$this->stdout->styles('red', array('text' => 'red'));
			$this->stdout->styles('yellow', array('text' => 'yellow'));
			//Setup plugin folder paths: 
			$this->setupFolders(); 
		}

		public function main() {
			$this->out("<green>Welcome to Twitter Bootstrap 2.0 for CakePHP 2.x!</green>\n");
			$this->out("<yellow>Checking if Bootstrap is already installed:</yellow>\n");
			//Check if Bootstrap is already installed: 
			$install_status = $this->checkInstallationStatus();
			if($install_status == true) {
				$this->out(__d('cake_console', '<green>Twitter Bootstrap files are already installed!</green>'));
				$setup_task = strtoupper($this->in(__d('cake_console', 'Do you like to set them up again?'), array('Y', 'N'), 'N'));
				switch ($setup_task) {
					case 'Y':
						$this->install(true); 
						break;
					case 'N':
						$this->out(__d('cake_console', '<red>Aborted</red>'));
						break;
				}
			} 
			else {
				$this->out(__d('cake_console', '<red>Twitter Bootstrap is not installed yet!</red>'));
				$this->out("\n");
				$setup_task = strtoupper($this->in(__d('cake_console', 'Do you like to set up Twitter Bootstrap?'), array('Y', 'N'), 'Y'));
				switch ($setup_task) {
					case 'Y':
						$this->install(); 
						break;
					case 'N':
						$this->error(__d('cake_console', 'Installation aborted!')); 
						break; 
				}
			}
		}

		public function install($override = false) {
			//Delete existing folders:
			if($override == true) {
				$this->app_css_folder->delete();
				$this->app_img_folder->delete();
				$this->app_js_folder->delete(); 
			}
			//Outputs: 
			$this->hr(); 
			$this->out(__d('cake_console', '<yellow>Copying new files:</yellow>')); 
			$this->out("\n"); 
			//CSS:
			$this->plugin_css_folder->copy(array(
				'to' => $this->app_css_folder->pwd(),
				'mode' => 0755,
			));
			$this->out($this->plugin_css_folder->messages());
			if($this->app_css_folder->dirsize() > 0) $this->success();
			else $this->failure();
			//IMG:  
			$this->plugin_img_folder->copy(array(
				'to' => $this->app_img_folder->pwd(),
				'mode' => 0755
			));
			$this->out($this->plugin_img_folder->messages());
			if($this->app_img_folder->dirsize() > 0) $this->success();
			else $this->failure(); 
			//JS: 
			$this->plugin_js_folder->copy(array(
				'to' => $this->app_js_folder->pwd(),
				'mode' => 0755
			));
			$this->out($this->plugin_js_folder->messages());
			if($this->app_js_folder->dirsize() > 0) $this->success();
			else $this->failure(); 
			//Finish installation:
			$this->hr();
			$this->out(__d('cake_console', '<green>Installation complete!</green>')); 
		}

		//---Private Shell functions:

		private function checkInstallationStatus() {
			//Check the dirsizes:
			if($this->app_css_folder->dirsize() > 0 && $this->app_js_folder->dirsize() > 0 && $this->app_img_folder->dirsize() > 0) {
				$css_files = $this->app_css_folder->find('bootstrap.*\.css');
				$img_files = $this->app_img_folder->find('.*\.png');
				$js_files = $this->app_js_folder->find('bootstrap.*\.js');
				if(count($css_files) > 0 && count($img_files) > 0 && count($js_files) > 0) return true; 
				else return false; 
			}
			else return false; 
		}

		private function setupFolders() {
			//App: 
			$this->app_css_folder = new Folder(''.CSS.'twitter'.DS.'bootstrap', true, 0755);
			$this->app_img_folder = new Folder(''.IMAGES.'twitter'.DS.'bootstrap', true, 0755);
			$this->app_js_folder = new Folder(''.JS.'twitter'.DS.'bootstrap', true, 0755);
			//Plugin: 
			$this->plugin_css_folder = new Folder(''.APP::pluginPath('BootstrapCake').'webroot'.DS.'css'.DS.'twitter'.DS.'bootstrap');
			$this->plugin_js_folder = new Folder(''.APP::pluginPath('BootstrapCake').'webroot'.DS.'js'.DS.'twitter'.DS.'bootstrap');
			$this->plugin_img_folder = new Folder(''.APP::pluginPath('BootstrapCake').'webroot'.DS.'img'.DS.'twitter'.DS.'bootstrap');
		}

		private function success() {
			$this->out(__d('cake_console', '<green>SUCCESS!</green>'));
		}

		private function failure() {
			$this->error(__d('cake_console', 'Installation failed!')); 
		}

	}
?>