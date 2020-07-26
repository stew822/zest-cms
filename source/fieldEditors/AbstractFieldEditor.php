<?php

namespace zest\fieldEditors;

abstract class AbstractFieldEditor {
    public function head() {
        echo "";
    }
    abstract public function editor( $name, $location ); 
}