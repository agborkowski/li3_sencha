<?php

/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_extjs\extensions\command\mvc;

use lithium\util\Inflector;

/**
 * Generate a Model class in the `--library` namespace
 *
 * `li3 create model Posts`
 * `li3 create --library=li3_plugin model Posts`
 *
 */
class Store extends \li3_extjs\extensions\command\ExtjsMvc {

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
	protected function _fields($request) {
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

}

?>