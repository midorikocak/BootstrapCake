# Twitter Bootstrap 2.0 for CakePHP 2.x 
Twitter Bootstrap is a sleek, intuitive and powerful front-end framework for faster and easier web-development. 
It comes accross with base HTML and CSS for typography, forms, buttons, tables, grids, navigation and more.

BootstrapCake is a plugin for CakePHP 2.x that easily integrates the Twitter Bootstrap CSS and JS toolkit. 

## Docs & Links 

[Twitter Bootstrap GitHub Repo](https://github.com/twitter/bootstrap "Twitter Bootstrap GitHub") - The official Twitter Bootstrap Repository on GitHub 

[Twitter Bootstrap Website](http://twitter.github.com/bootstrap/ "Twitter Bootstrap Website") - Official Twitter Bootstrap Website with examples and tutorials 

[Introduction to Twitter Bootstrap](http://twitter.github.com/bootstrap/getting-started.html "Introduction to Twitter Bootstrap") - Introduction how to start with Twitter Bootstrap 

## Installation & Setup

1. Clone the plugin into your _app/Plugin_ folder with `git clone git@github.com:visionred/BootstrapCake.git`

2. Setup your CakePHP Console (if you haven't already) following this [guide](http://book.cakephp.org/2.0/en/console-and-shells.html) 

3. Switch to your console, run the following command (in your project path) and follow the guide:

```ruby
	cake BootstrapCake.install 
```  

4. Open your _AppController.php_ under _app/Controller_ and add a new helper:

```ruby
	<?php
		class AppController extends Controller {
			public $helpers = array('BootstrapCake.Bootstrap'); 
		}
	?>	
``

Note: You can also load the helper in every other controller if you like. But it's recommended to in the AppController to make it always available. 

  

