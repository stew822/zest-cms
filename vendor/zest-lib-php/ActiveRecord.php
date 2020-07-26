<?php

namespace zest;

require_once( "ActiveField.php" );
require_once( "Types.php" );

class ActiveRecord {

    protected $location;

    public function __construct( $location ) {

        $this->location = realpath( $location );

        if( $this->location === false ) {
            die( "error: $location does not exist" );
            // TODO: implement real error checking. 
        }

        #print( "created record at {$this->location}");
    }

    public function location() {
        return $this->location;
    }

    public function name() {
        return basename( $this->location );
    }

    /** returns true if this record exists; false otherwise */
    public function created() {
        if( is_dir( $this->location ) ) {
            return true;
        }
        else return false;
    }

    /** checks if parent record exists */
    public function hasParent() {
        // TODO: fix this
        if( substr( pathinfo($this->location)["dirname"], -3)  == ".db" ) {
            return true;
        }
        else {
            return false;
        }
    }

    /** returns parent record, if exists; if it doesn't exist, returns false */
    public function parent() {
        if( $this->hasParent() ) {
            return new ActiveRecord(pathinfo($this->location)["dirname"]);
        }
        else {
            return false;
        }
    }

    /** returns the fields that this record has */
    public function fields() {
        $files = array_diff(scandir( $this->location ), array('.', '..'));
        $fields = [];
        foreach( $files as $file ) {
            $fields[] = new ActiveField( "{$this->location}/$file" );
        }
        return $fields;
    }

    /** adds a field to this record */
    function addField( $name, types\TextType $type ): ActiveField {
        $fieldLocation = $this->location."/".$name;
        $field = $type->encoder()->create( $fieldLocation );
        if( $field !== false ) {
            return $field;
        }
        else {
            die("zest error could not create field at $fieldLocation" );
        }
    }
}
