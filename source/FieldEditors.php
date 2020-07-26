<?php

namespace zest;

require_once( "fieldEditors/CollectionEditor.php" );
require_once( "fieldEditors/MarkdownEditor.php" );
require_once( "fieldEditors/TextEditor.php" );
require_once( "fieldEditors/DateEditor.php" );

final class FieldEditors  {
    private static $initialised = false;
    private static $editors = [];

    # private, so can't create an instance
    private function __construct() {}

    private static function init() {
        if (!self::$initialised) {
            self::$initialised = true;

            self::$editors = [];
            self::$editors[ "collection" ] = new fieldEditors\CollectionEditor();
            self::$editors[ "markdown" ] = new fieldEditors\MarkdownEditor();
            self::$editors[ "txt" ] = new fieldEditors\TextEditor();
            self::$editors[ "date" ] = new fieldEditors\DateEditor();
        }
    }

    static function head() {
        self::init();
        foreach( self::$editors as $name => $editor ) {
            $editor->head();
        }
    }

    static function exists( $field ) {
        self::init();
        
    }

    static function printEditor( $field ) {
        self::init();
        
        if( isset($this->contentTypes[$type] ) ) {
            $name = pathinfo( $location )["filename"];
            $this->contentTypes[$type]->editor( $name, $location );
        }
        else {
            echo "content type not recognised @ " . $location;
        }
    }

}
