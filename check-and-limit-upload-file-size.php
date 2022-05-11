//note
//check-and-limit-upload-file-size when uploding
function nelio_max_image_size( $file ) {

  $size = $file['size'];
  $size = $size / 1024;
  $type = $file['type'];
  $is_image = strpos( $type, 'image' ) !== false;
  $limit = 5000;
  $limit_output = '5Mb';

  if ( $is_image && $size > $limit ) {
    $file['error'] = 'Image files must be smaller than ' . $limit_output;
  }//end if

  return $file;

}//end nelio_max_image_size()
add_filter( 'wp_handle_upload_prefilter', 'nelio_max_image_size' );
