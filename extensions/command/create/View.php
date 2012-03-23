<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_extjs\extensions\command\mvc;

use lithium\core\Libraries;
use lithium\util\Inflector;
use lithium\analysis\Inspector;
use lithium\core\ClassNotFoundException;
use lithium\util\String;

/**
 * Generate a View file in the `--library` namespace
 *
 * `li3 create view Posts index`
 * `li3 create --library=li3_plugin view Posts index`
 *
 */
class View extends \li3_extjs\extensions\command\ExtjsMvc {
	/**
	 * Get the class name for the model.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _class($request) {
		return Inflector::camelize(Inflector::pluralize($request->action));
	}

	/**
	 * Get the view class used in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _view($request) {
		return strtolower($this->_class($request));
	}

	/**
	 * Get the model class used in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _model($request) {
		return Inflector::camelize(Inflector::pluralize($request->action));
	}

	/**
	 * Get the store class used in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _store($request) {
		return $this->_model($request);
	}

	/**
	 * Override the save method to handle view specific params.
	 *
	 * @param array $params
	 * @return mixed
	
	protected function _save(array $params = array()) {
		$params['path'] = Inflector::underscore($this->request->action);
		$params['file'] = $this->request->args(0);

		$contents = $this->_template();
		$result = String::insert($contents, $params);

		if (!empty($this->_library['path'])) {
			$path = $this->_library['path'] . "/views/{$params['path']}/{$params['file']}";
			$file = str_replace('//', '/', "{$path}.php");
			$directory = dirname($file);

			if (!is_dir($directory)) {
				if (!mkdir($directory, 0755, true)) {
					return false;
				}
			}
			$directory = str_replace($this->_library['path'] . '/', '', $directory);

			if (file_put_contents($file, "<?php\n\n{$result}\n\n?>")) {
				return "{$params['file']}.php created in {$directory}.";
			}
		}
		return false;
	}
	 *
	 */
	/**
	 * Get the methods to test.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _methods($request) {
		$use = $this->_use($request);
		$path = Libraries::path($use);

		if (!file_exists($path)) {
			return "";
		}
		$methods = (array) Inspector::methods($use, 'extents');
		$testMethods = array();

		foreach (array_keys($methods) as $method) {
			$testMethods[] = "\tpublic function test" . ucwords($method) . "() {}";
		}
		return join("\n", $testMethods);
	}
	/**
	 * Override the save method to handle view specific params.
	 *
	 * @param array $params
	 * @return string A result string on success of writing the file. If any errors occur along
	 * the way such as missing information boolean false is returned.
	 */
	protected function _save(array $params = array()) {
		//echo "View::_save(params)\n";

		$params['path'] = Inflector::underscore($this->request->action);
		$params['file'] = Inflector::camelize($this->request->args(0)); // gets first action `index`

		$contents = $this->_template();
		$result = String::insert($contents, $params);
		if (!empty($this->_library['js'])) {
			$path = str_replace('\\', '/', $this->_library['path'] . $this->_library['js'] . "/{$params['namespace']}/{$params['path']}/{$params['file']}");
			$file = str_replace('//', '/', "{$path}.js");

			$directory = dirname($file);
			if (!is_dir($directory)) {
				if (!mkdir($directory, 0755, true)) {
					return false;
				}
			}
			$directory = str_replace($this->_library['path'] . '/', '', $directory);
			//echo $file;
			if (file_put_contents($file, "{$result}")) {
				return "`app\\view\\{$params['class']}` created in `{$path}.js`.";
			}
		}
		return false;
	}
}

?>