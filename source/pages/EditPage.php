<?php

namespace zest\pages;

require_once( "AbstractPage.php" );
require_once( "FieldEditors.php" );
require_once( "zest-lib-php/ActiveRecord.php" );


class EditPage extends AbstractPage {

    private $record;

    public function __construct( $arguments = [] ) {
        if( isset($arguments['item'])) {
            $location = $arguments['item'];
        }
        else $location = '.';
        // TODO: Fix this code ^^
        

        $this->record = new \zest\ActiveRecord( $location );

    }

    /** returns title of the edit page */
    public function title() {
        return "Editor";
    }

    /** prints navigation for the edit page */
    public function nav() {

        if( $this->record->hasParent() ) {
            $parentLocation = $this->record->parent()->location(); 

            $link = "?page=editor&item=".urlencode($parentLocation);

            return [
                $link => "&#8592; back to $parentLocation"
            ];
        }
        else return [
            "#" => "root node"
        ];
    }

    /** prints the html <head> content needed for the edit page */
    public function head() {
        \zest\FieldEditors::head();
    }

    /** prints content of the edit page */
    public function content() {

        if( !$this->record->created() ) {
            ?> <p>Record doesn't exist</p> <?php
            return;
        }

        
        echo "<p style='color:green;'>editing ".$this->record->name()."</p>";

        foreach( $this->record->fields() as $field ) {
            if( \zest\FieldEditors::exists( $field->type() ) ) {
                \zest\FieldEditors::printEditor( $field );
            }
        }

        ?>
        <button type="button">Add new field to item</button>
        <?php
        
    }
}
