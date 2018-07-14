$(document).ready(function () {

    document.querySelectorAll( '.ckeditor textarea' )
        .forEach(function(el){
            el.removeAttribute('required');
            language: 'it';
            ClassicEditor
                .create( el )
                .then( function (editor) {
                    console.log( editor );
                    var div = el.parentNode.querySelector('.ck-editor__editable');
                    div.style.backgroundColor = 'white'; 
                    div.style.minHeight = '300px';
                } )
                .catch( function (error) {
                    console.error( error );
                } );
        });

    module.exports = {
        // ...
        
        plugins: [
            '@ckeditor/ckeditor5-essentials/src/essentials',
            // ...
     
            //'@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter',
            //'@ckeditor/ckeditor5-easy-image/src/easyimage',
     
            'ckeditor5-simple-upload/src/simpleupload'
     
            // ...
        ],
     
        // ...
     
        config: {
            toolbar: {
                items: [
                    'headings',
                    'bold',
                    'italic',
                    'imageUpload',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            // ...
        }
    }

});
