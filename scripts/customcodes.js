(function() {  
    tinymce.PluginManager.add('fs_pdf', function( editor, url ) {
        editor.addButton( 'fs_pdf', {
            title: 'Add a PDF Button',
            image: url+'/pdf-icon.png',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Insert a PDF button',
                    body: [
                        {
                            type: 'textbox',
                            name: 'btn_loc',
                            label: 'PDF Link',
                            value: 'http://'
                        }
                    ],
                    onsubmit: function( e ) {
                        if(e.data.btn_loc === '') {
                            editor.windowManager.alert('Please, fill in all fields.');
                            return false;
                        }
                        editor.insertContent( '<br/>[pdf url="' + e.data.btn_loc + '"]Download PDF[/pdf]<br/>' );
                    }
                });
            }
        });
    });
})(); 
