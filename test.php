<?php

set_include_path( '/workspace/zest-cms/vendor/zest-lib-php' ); 

function require_all_files($dir) {
    foreach( glob( "$dir/*" ) as $path ){
        if ( preg_match( '/\.php$/', $path ) ) {
            echo "[[$path]]\n";
            require_once $path;  // it's a PHP file so just require it
        } elseif ( is_dir( $path ) ) {
            require_all_files( $path );  // it's a subdir, so call the same function for this subdir
        }
    }
}

require_all_files("vendor/zest-lib-php");



