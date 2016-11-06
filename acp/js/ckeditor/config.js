/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'en';
	 config.width = "auto";
    config.height = "auto";
	// config.extraPlugins = 'lineutils,widget,image2,dialog,clipboard';
	 config.justifyClasses = [ 'text-left', 'text-center', 'text-right', 'text-justify' ];
	// config.uiColor = '#AADC6E';
	//config.stylesSet = 'javelinee';
};

/** Ini dalah config untuk paragraph

CKEDITOR.on('dialogDefinition', function( ev ) {
  var dialogName = ev.data.name;
  var dialogDefinition = ev.data.definition;

  if(dialogName === 'table' || dialogName == 'tableProperties' ) {
    var infoTab = dialogDefinition.getContents('info');

    //remove fields
    var cellSpacing = infoTab.remove('txtCellSpace');
    var cellPadding = infoTab.remove('txtCellPad');
    var border = infoTab.remove('txtBorder');
    var width = infoTab.remove('txtWidth');
    var height = infoTab.remove('txtHeight');
    var align = infoTab.remove('cmbAlign');
    
}
  if(dialogName === 'image') {
    var infoTab = dialogDefinition.getContents('info');
        dialogDefinition.removeContents( 'Link' );
        dialogDefinition.removeContents( 'advanced' );    
      infoTab.remove('txtWidth');
      infoTab.remove('txtHeight');
      infoTab.remove('txtBorder');
      infoTab.remove('txtHSpace');
      infoTab.remove('txtVSpace');
      infoTab.remove('ratioLock');
      infoTab.remove('cmbAlign');
                   
  }
**/  
});