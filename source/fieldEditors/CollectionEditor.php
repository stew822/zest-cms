<?php

namespace zest\fieldEditors;

require_once( "fieldEditors/AbstractFieldEditor.php" );

class CollectionEditor extends AbstractFieldEditor {

    public function editor( $name, $location ) {

        # this bit of code literally just removes a linting error
        if( !isset($location) ) { $location = "defaultFieldName"; }

        $items = scandir( $location );
        #var_dump($items);
        ?>
        Browsing content of collection: <?php echo $name; ?>

        <table class="collection">
            <?php
            foreach($items as $item ) {
                if( $item == "." || $item == ".." ) continue;

                $item_location = $location."/".$item;

                echo "<tr><td>";
                echo "<a href='?page=editor&item=".urlencode($item_location)."'>$item</a>";
                echo "</td></tr>";
            }
            ?>
        </table>
        <?php
    }
}
