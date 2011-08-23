<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Autoloader Class
 *
 * Autoload Base classes with PHP5's native autoload.
 *
 * @package			CodeIgniter
 * @subpackage		MyAutoload
 * @category		Hooks
 * @author			Shane Pearson <bubbafoley@gmail.com>
 * @license			http://philsturgeon.co.uk/code/dbad-license
 */
class Spl_class_loader {

	private $_include_paths = array();

	/**
	 * Register
	 *
	 * Register the autoloader function.
	 * 
	 * @access public
	 * @param  array  include paths
	 * @return void
	 */
	public function register(array $paths = array())
	{
		$this->_include_paths = $paths;
		spl_autoload_register(array($this, 'load_class'));
	}

	// --------------------------------------------------------------------

	/**
	 * Autoloader
	 *
	 * Autoload base classes.
	 *
	 * @access public
	 * @param string  the class to load
	 * @return void
	 */
	public function load_class($class)
	{
		if(class_exists($class, FALSE))
		{
			return;
		}

		foreach($this->_include_paths as $path)
		{
			$filepath = $path . $class . '.php';

			if(is_file($filepath))
			{
				include_once($filepath);	
				break;
			}
		}

	}

} // end class MY_Autoloader

/* End of file MY_Autoloader.php */
/* Location: ./application/hooks/MY_Autoloader.php */