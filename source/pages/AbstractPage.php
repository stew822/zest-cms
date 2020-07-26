<?php

namespace zest\pages;

abstract class AbstractPage {
    
    /** construct page; and pass $_GET arguments */
    public function __construct( $arguments = [] ) {}

    /** return title of page */
    abstract public function title();

    /** print any content that needs to go into the HTML header of this page */
    public function head() { echo ""; }

    /** print the navigation for this page */
    abstract public function nav();

    /** print the content for this page */
    abstract public function content(); 
}