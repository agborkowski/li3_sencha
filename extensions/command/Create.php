<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_sencha\extensions\command;

use lithium\util\String;
use lithium\core\Libraries;
use lithium\util\Inflector;
use lithium\core\ClassNotFoundException;

/**
 * The `create` command allows you to rapidly develop your models, views, controllers, and tests
 * by generating the minimum code necessary to test and run your application.
 *
 * `li3 extjs Users`
 * `li3 extjs-create model Users`
 *
 */
class Create extends \lithium\console\command\Create {

	/**
	 * Add `Store` options to get the namespace.
	 *
	 * @param string $request
	 * @param array $options
	 * @return string
	 */
	protected function _namespace($request, $options  = array()) {
		$defaults['spaces']['store'] = 'store';
		$options += $defaults;

		parent->_namespace($request, $options);
	}
}

?>