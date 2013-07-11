/*
* Upload image
*/
jQuery(document).ready(function($){


    var custom_uploader;
    var value_img;
    var value_upload;

    $('#upload_image_button').click(function(e) {
        value_upload = $(this);
        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (value_img) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            value_img = $('.print-image').val();

            value_upload.siblings('#upload_image').val(attachment.url);


            if(value_img==undefined){
                $('.upload-image').after('<li><img class="print-image" src="' + attachment.url + '" height="100" width="100"></li>');


            } else {
                $('.print-image').attr('src', attachment.url);
            }

        });

        //Open the uploader dialog
        custom_uploader.open();

    });


});