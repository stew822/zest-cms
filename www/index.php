<?php

# tag editor -- https://goodies.pixabay.com/jquery/tag-editor/demo.html
# fields obviously don't have schemes
# but items do
# could constrain what appears in a collection, eg. a folder called "blog"
# might have to contain items that have a "title", "published" and "content" fields
# alteratively a single item may have it's own schema, which would force it to have certain
# fields, eg. if it is an application configuration file

# schemas could specify field constraints. Available constraints will differ depending on the type of field.

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_include_path(get_include_path() . PATH_SEPARATOR . '/workspace/zest-cms/vendor');
set_include_path(get_include_path() . PATH_SEPARATOR . '/workspace/zest-cms/source');
set_include_path(get_include_path() . PATH_SEPARATOR . '/workspace/zest-cms/vendor/zest-lib-php');

require_once( "pages/EditPage.php" );
require_once( "pages/NotFoundPage.php");
if( isset($_GET['page']) ) { 
    $slug = $_GET['page'];
}
else {
    $slug = "editor";
}

if( !isset($_GET['item']) ) { 
    $_GET['item'] = "../example.database";
}

$pages = [];
$pages["editor"] = new \zest\pages\EditPage( $_GET );

if( isset($pages[$slug] ) ) {
    $page = $pages[$slug];
}
else {
    $page = new \zest\pages\NotFoundPage();
}

include( "theme/theme.php" );