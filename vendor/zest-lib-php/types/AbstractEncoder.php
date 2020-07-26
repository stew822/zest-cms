<?php

namespace zest\types;

abstract class AbstractEncoder {
    abstract public function create( $location );
    abstract public function serialise( $value, $location ); 
    abstract public function deserialise( $location ); 
}