<?php
defined( 'ABSPATH' ) || exit;

function eos_dfeh_update_wp_config( $new_line ){
  if( !function_exists( 'get_filesystem_method' ) ){
    require_once ( ABSPATH . '/wp-admin/includes/file.php' );
  }
  $writeAccess = false;
	$access_type = get_filesystem_method();
	if( $access_type === 'direct' ){
		/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
		$creds = request_filesystem_credentials( admin_url(),'',false,false,array() );
		/* initialize the API */
		if ( ! WP_Filesystem( $creds ) ) {
      die();
      exit;
		}
		global $wp_filesystem;
		$writeAccess = true;
		if( empty( $wp_filesystem ) ){
			require_once ( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
    }
    $config_file_path = ABSPATH.'/wp-config.php';
    if( !file_exists( $config_file_path ) ){
      echo 'Disable Fatal Error Handler was trying to update the file wp-config.php but it looks you have no wp-config.php';
      die();
      exit;
    }
    $new_line = $new_line."\r\n";
    $config_file = file( $config_file_path );
    $line_exist = false;
    $unsetIdx = array();
    $n = 0;
    foreach ( $config_file as &$line ) {
  		if ( ! preg_match( '/^define\(\s*\'([A-Z_]+)\',(.*)\)/',$line,$match ) ) {
  			continue;
  		}
  		if ( 'WP_DISABLE_FATAL_ERROR_HANDLER' === $match[1] ) {
  			$line = $new_line;
        $unsetIdx[] = $n;
        $line_exist = true;
  		}
      ++$n;
  	}
    foreach( $unsetIdx as $idx ){
      if( isset( $config_file[$idx] ) ){
        unset( $config_file[$idx] );
      }
    }
    $handle = @fopen( $config_file_path, 'w' );
  	array_shift( $config_file );
    if( '' !== $new_line ){
  	   array_unshift( $config_file, "<?php\r\n",$new_line );
    }
    if( is_resource( $handle ) ){
    	// Insert the constant in wp-config.php file.
    	foreach( $config_file as $new_line ) {
    		@fwrite( $handle, $new_line );
    	}
    	@fclose( $handle );
    }
  }
  else{
    echo 'Disable Fatal Error Handler was trying to update the file wp-config.php but it looks you have no access to the file';
    die();
    exit;
  }
}
