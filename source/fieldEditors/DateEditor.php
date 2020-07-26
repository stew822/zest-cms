<?php

namespace  zest\fieldEditors;

require_once( "fieldEditors/AbstractFieldEditor.php" );

class DateEditor extends AbstractFieldEditor {
    public function head() {
        // does nothing -- no need to print any head for this one
    }

    public function editor( $name, $location ) {

        # this bit of code literally just removes a linting error
        if( !isset($name) ) { $name = "defaultFieldName"; }

        ?>
        <input type="date" class="field" id="<?php echo $name; ?>"></input>
        <?php
    }
}
