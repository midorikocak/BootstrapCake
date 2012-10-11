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
		class AppController extends Controller {
			public $helpers = array('BootstrapCake.Bootstrap'); 
		}
	```

	Note: You can also load the helper in every other controller if you like. But it's recommended to in the AppController to make it always available. 

5. Thats it! You're done and can now use Twitter Bootstrap in your CakePHP project! 

## Layout Generator 

##### BootstrapCake also brings an easy command line generator to create Twitter Bootstrap compatible layouts

Usage:

```ruby
	cake BootstrapCake.layout -n [LAYOUT_NAME] -t [*fixed or fluid] 	
```

Example:

```ruby
	cake BootstrapCake.layout -n my_layout -t fluid 
```

This will generate a Bootstrap compatible and fluid layout under _app/View/Layout/my_layout.ctp_

## Helper

The plugin includes a helper to load the required files for Twitter Bootstrap. 
So you are able to integrate Bootstrap in a existing layout.  

Load all files: 

```ruby
	echo $this->Bootstrap->load();
```

Creates and outputs the HTML tags for loading the CSS and JS files for Twitter Bootstrap.

Load CSS files:

```ruby
	echo $this->Bootstrap->css();
```

Outputs the HTML tag to just load the CSS files. 

Load JS files:

```ruby
	echo $this->Bootstrap->js(); 
```

Outputs the HTML tag to just load the JS files. 

###### Choose between compressed and uncompressed version

By default the plugin loads always to compressed version of Twitter Bootstrap files to improve loading time. 
But sometimes you maybe want to choose the uncompressed dev file. You can switch for every helper method to uncompressed file.

Usage:

```ruby
	echo $this->Bootstrap->load('dev');
```




