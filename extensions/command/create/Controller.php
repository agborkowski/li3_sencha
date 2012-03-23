<?php

namespace li3_extjs\extensions\command\mvc;

use lithium\util\Inflector;

/**
 * Generate a Controller class in extjs mvc
 *
 */
class Controller extends \li3_extjs\extensions\command\ExtjsMvc {

	/**
	 * Get the controller class name.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _class($request) {
		return $this->_name($request);
	}

	/**
	 * Returns the name of the controller class, minus `'Controller'`.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _name($request) {
		return Inflector::camelize(Inflector::pluralize($request->action));
	}

	/**
	 * Get the plural variable used for data in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _plural($request) {
		return Inflector::pluralize(Inflector::camelize($request->action, false));
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
	 * Get the view class used in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _view($request) {
		return strtolower($this->_class($request));
	}

	/**
	 * Get the singular variable to use for data in controller methods.
	 *
	 * @param string $request
	 * @return string
	 */
	protected function _singular($request) {
		return Inflector::singularize(Inflector::camelize($request->action, false));
	}
}

?>