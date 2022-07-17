/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function (config) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: ['undo', 'clipboard'] },
		{ name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
		{ name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
		{ name: 'links', groups: ['links'] },
		// insert horizontal line
		{ name: 'insert', groups: ['insert'] },
		{ name: 'forms', groups: ['forms'] },
		{ name: 'others', groups: ['others'] },
		{ name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
		{ name: 'document', groups: ['mode', 'document', 'doctools'] },
		// focus mode
		//{ name: 'tools', groups: [ 'tools' ] },
		// about
		//{ name: 'about', groups: [ 'about' ] },
		{ name: 'styles', groups: ['styles'] },
		//{ name: 'colors', groups: [ 'colors' ] },
	];

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;h4;h5;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.removeDialogTabs = 'image:advanced;image:Link';
	config.removeButtons = "Paste,PasteText,PasteFromWord";
};