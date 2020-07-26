<?php

namespace zest;

require_once( "Types.php" );

class ActiveField {

    protected $location;
    protected $type;

    function __construct( $location ) {
        $this->location = $location;

        $fragments = explode( ".", basename( $this->location ) );

        if( isset( $fragments[1] ) ) {
            if( Types::hasExtension($fragments[1] ) ) {
                $this->type = Types::byExtension( $fragments[1] );
            }
            else $this->type = Types::unknown();
        }
        else {
            // if the type of the item is not set, then it must be an item in a collection
            // this class shouldn't have been created on this location
            $this->type = Types::unknown();
        }
    }

    function type() {
        return $this->type;
    }

    function value( $value = NULL ) {
        if( $this->type instanceof \zest\types\UnknownType ) {
            if( func_num_args() == 0 ) {
                # set value
                $this->type->encoder()->serialise( $value, $this->location );
            }
            else {
                # get value
                $this->type->encoder()->deserialise( $this->location );
            }
        }
        else die( "cannotw sdadas get property of unknwon type" );
    }

}