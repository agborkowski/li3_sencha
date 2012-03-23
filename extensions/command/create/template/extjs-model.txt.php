/**
 * @class APP.model.Tests
 * @namespace {:namespace}
 * @todo complete docs
 *
 * View are generate by (li3_extjs) Holicon ExtJs Lithium Generator .
 *
 * @docauthor AgBorkowski orginal methods comments taken form sencha.com
 * @author nobody
 */

Ext.define('APP.model.{:class}', {
	extend: 'Ext.data.Model',
	fields: [
		//'id',
		//'password',
	],

	/**
	 * @cfg {String} idProperty
	 * The name of the field treated as this Model's unique id. Defaults to 'id'
	 * good for Sql database, this params should be set to '_id' for noSql database.
	 */
	idProperty: 'id',

	proxy: {
		type: 'rest',
		url: '/{:controller}',
		reader: {
			root: 'data'
		}
	}
});