<?php

namespace zest\pages;

require_once( "AbstractPage.php" );

class NotFoundPage extends AbstractPage {
    public function title() {
        ?>Page not found<?php
    }

    public function nav() {
        return [
            "/" => "home"
        ];
    }

    public function content() {
        ?>
        Sorry, the page you requested does not exist.
        <?php
    }
}
