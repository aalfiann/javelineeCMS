/**
 * Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// This file contains style definitions that can be used by CKEditor plugins.
//
// The most common use for it is the "stylescombo" plugin, which shows a combo
// in the editor toolbar, containing all styles. Other plugins instead, like
// the div plugin, use a subset of the styles on their feature.
//
// If you don't have plugins that depend on this file, you can simply ignore it.
// Otherwise it is strongly recommended to customize this file to match your
// website requirements and design properly.

CKEDITOR.stylesSet.add( 'default', [
	/* Block Styles */

	// These styles are already available in the "Format" combo ("format" plugin),
	// so they are not needed here by default. You may enable them to avoid
	// placing the "Format" combo in the toolbar, maintaining the same features.
	/*
	{ name: 'Paragraph',		element: 'p' },
	{ name: 'Heading 1',		element: 'h1' },
	{ name: 'Heading 2',		element: 'h2' },
	{ name: 'Heading 3',		element: 'h3' },
	{ name: 'Heading 4',		element: 'h4' },
	{ name: 'Heading 5',		element: 'h5' },
	{ name: 'Heading 6',		element: 'h6' },
	{ name: 'Preformatted Text',element: 'pre' },
	{ name: 'Address',			element: 'address' },
	*/

	{ name: 'Italic Title',		element: 'h2', styles: { 'font-style': 'italic' } },
	{ name: 'Subtitle',			element: 'h3', styles: { 'color': '#aaa', 'font-style': 'italic' } },
	{
		name: 'Special Container',
		element: 'div',
		styles: {
			padding: '5px 10px',
			background: '#eee',
			border: '1px solid #ccc'
		}
	},

	/* Inline Styles */

	// These are core styles available as toolbar buttons. You may opt enabling
	// some of them in the Styles combo, removing them from the toolbar.
	// (This requires the "stylescombo" plugin)
	/*
	{ name: 'Strong',			element: 'strong', overrides: 'b' },
	{ name: 'Emphasis',			element: 'em'	, overrides: 'i' },
	{ name: 'Underline',		element: 'u' },
	{ name: 'Strikethrough',	element: 'strike' },
	{ name: 'Subscript',		element: 'sub' },
	{ name: 'Superscript',		element: 'sup' },
	*/

	{ name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },

	{ name: 'Big',				element: 'big' },
	{ name: 'Small',			element: 'small' },
	{ name: 'Typewriter',		element: 'tt' },

	{ name: 'Computer Code',	element: 'code' },
	{ name: 'Keyboard Phrase',	element: 'kbd' },
	{ name: 'Sample Text',		element: 'samp' },
	{ name: 'Variable',			element: 'var' },

	{ name: 'Deleted Text',		element: 'del' },
	{ name: 'Inserted Text',	element: 'ins' },

	{ name: 'Cited Work',		element: 'cite' },
	{ name: 'Inline Quotation',	element: 'q' },

	{ name: 'Language: RTL',	element: 'span', attributes: { 'dir': 'rtl' } },
	{ name: 'Language: LTR',	element: 'span', attributes: { 'dir': 'ltr' } },

	/* Object Styles */

	{
		name: 'Styled image (left)',
		element: 'img',
		attributes: { 'class': 'left' }
	},

	{
		name: 'Styled image (right)',
		element: 'img',
		attributes: { 'class': 'right' }
	},

	{
		name: 'Compact table',
		element: 'table',
		attributes: {
			cellpadding: '5',
			cellspacing: '0',
			border: '1',
			bordercolor: '#ccc'
		},
		styles: {
			'border-collapse': 'collapse'
		}
	},

	{ name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
	{ name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },
	{ name: 'Image Responsive', element : 'img', attributes: { 'class': 'img-responsive' }, style: { 'height': 'auto' } },

	/* Bootstrap Styles */
   
              /* Typography */
                { name : 'span.H1'        , element : 'span', attributes: { 'class': 'h1' } },
                { name : 'span.H2'        , element : 'span', attributes: { 'class': 'h2' } },
                { name : 'span.H3'        , element : 'span', attributes: { 'class': 'h3' } },
                { name : 'span.H4'        , element : 'span', attributes: { 'class': 'h4' } },
                { name : 'span.H5'        , element : 'span', attributes: { 'class': 'h5' } },
                { name : 'span.H6'        , element : 'span', attributes: { 'class': 'h6' } }, 
                

                { name : 'Paragraph Lead'     , element : 'p', attributes: { 'class': 'lead' } },

                {
                        name : 'Unstyled List',
                        element : 'ul',
                        attributes :
                        {
                                'class' : 'list-unstyled'
                        }
                },
                {
                        name : 'List inline',
                        element : 'ul',
                        attributes :
                        {
                                'class' : 'list-inline'
                        }
                },


                {
                        name : 'Table',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'table'
                        }
                },

                {
                        name : 'Table Striped rows',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'table table-striped'
                        }
                },
                {
                        name : 'Table Bordered',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'table table-bordered'
                        }
                },
                {
                        name : 'Table Hover rows',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'table table-hover'
                        }
                },
                {
                        name : 'Table Condensed',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'table table-condensed'
                        }
                },                
                {
                        name : 'Image shap rounded',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'img-rounded'
                        }
                },
                {
                        name : 'Image shap circle',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'img-circle'
                        }
                },
                {
                        name : 'Image shap thumbnail',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'img-thumbnail'
                        }
                },
                {
                        name : 'Image float left',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'pull-left'
                        }
                },
                {
                        name : 'Image float right',
                        element : 'table',
                        attributes :
                        {
                                'class' : 'pull-right'
                        }
                }
] );

CKEDITOR.stylesSet.add( 'javelinee', [
    // Block-level styles
    { name: 'Blue Title', element: 'h2', styles: { 'color': 'Blue' } },
    { name: 'Red Title' , element: 'h3', styles: { 'color': 'Red' } },
    

    // Inline styles
    { name: 'CSS Style', element: 'span', attributes: { 'class': 'my_style' } },
    { name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }
] );
