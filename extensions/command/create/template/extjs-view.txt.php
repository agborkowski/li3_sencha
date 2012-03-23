/**
 * @class APP.view.{:class}.Index
 * @todo complet docs
 * @namespace {:namespace}
 *
 * View are generate by (li3_extjs) Holicon ExtJs Lithium Generator .
 *
 * @docauthor AgBorkowski orginal methods comments taken form sencha.com
 * @author nobody
 */

Ext.define('APP.view.{:view}.Index' ,{
	extend: 'Ext.panel.Panel',

	/**
	 * @cfg {[String]} alias
	 * @member Ext.Class
	 * List of short aliases for class names.  Most useful for defining xtypes for widgets
	 */
	alias: 'widget.{:view}Index',

	/**
	 * @cfg {String} id
	 * <p>The <b><u>unique id of this component instance</u></b> (defaults to an {@link #getId auto-assigned id}).</p>
	 */
	id: '{:view}Index',

	/**
	 * @cfg {[String]} requires
	 * @member Ext.Class
	 * List of classes that have to be loaded before instanciating this class.
	 */
	requires: [
		//'APP.view.{:view}.Grid',
		//'APP.view.{:view}.Preview',
	],
	title: '{:class}',
	closable: true,
	iconCls: '{:view} index',
	layout: 'fit',
	initComponent: function() {
		Ext.apply(this, {
			title: '{:class}',

			items: [{
				xtype: 'grid',

				/**
				 * @cfg {[Ext.grid.column.Column]} columns
				 * An array of {@link Ext.grid.column.Column column} definition objects which define all columns that appear in this
				 * grid. Each column definition provides the header text for the column, and a definition of where the data for that
				 * column comes from.
				 */
				columns: [{
					text: 'field',
					dataIndex: 'field'
				}],

				/**
				 * @cfg {Object/Array} dockedItems
				 * A component or series of components to be added as docked items to this panel.
				 * The docked items can be docked to either the top, right, left or bottom of a panel.
				 */
				dockedItems:[{
					xtype: 'pagingtoolbar',
					store: '{:store}',
					dock: 'bottom'
				}]

			}]

		});

		this.callParent();
	}

	/**
	 * Private methods ...
	 */

});