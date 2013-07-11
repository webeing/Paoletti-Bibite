<?php
/**
 * Crea l'oggetto upload image
 */

/**
 * Class Upload
 */



$bp_upload = new BPUploadimage();

class BPUploadimage{

        function __construct() {
            add_action('admin_enqueue_scripts', array(__CLASS__,'bp_admin_scripts'));
        }



     public function bp_print_input_upload_media($value_name, $value_image, $label){

         echo '<li class="left"><label for="bp_img_scritta">';
         _e($label, 'bp' );
         echo '</label></li>';

         echo '<li class="upload-image">';
         if($value_image){
             echo '<input id="upload_image" type="text" size="36" name="upload_image_'.$value_name.'" value="'.$value_image.'" />';

         }else{

             echo '<input id="upload_image" type="text" size="36" name="upload_image_'.$value_name.'" value="http://" />';
         }

             echo ' <input id="upload_image_button" class="button" type="button" value="Upload Image" /></li>';

         if($value_image){
             echo '<li><img class="print-image" src="'.$value_image.'" height="100" width="100"></li>';
         }

     }


     public function bp_admin_scripts() {

            wp_enqueue_media();
            wp_register_script('upload-image', get_template_directory_uri() .'/js/upload_foto.js', array('jquery'));
            wp_enqueue_script('upload-image');

    }


}