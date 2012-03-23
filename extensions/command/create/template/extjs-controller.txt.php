/**
 * @class Ext.app.Controller.Test
 * @namespace {:namespace}
 *
 * Controller are generate by (li3_extjs) Holicon ExtJs Lithium Generator .
 * 
 * @docauthor AgBorkowski
 * @author nobody
 */

Ext.define('APP.controller.{:class}', {
	extend: 'Ext.app.Controller',

	stores : ['{:store}'],

	models : ['{:model}'],

	/**
	 * @cfg {[String]} requires
	 * @member Ext.Class
	 * List of classes that have to be loaded before instanciating this class.
	 */
	requires : [
		'APP.view.{:view}.Index'
	],

	refs : [ {
		ref : 'content',
		selector : 'content'
	} ],

	init : function() {
		this.control({});
	},

	/**
	 * CRUD actions ...
	 */

	/**
	 * index method
	 */
	index: function() {
		var me = this,
		app = this.application,
		viewport = app.getViewport();

		viewport.changeView(Ext.create(app.getModuleClassName('{:view}.Index', 'view')));
	}

});