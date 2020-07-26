<?php

namespace  zest\fieldEditors;

require_once( "fieldEditors/AbstractFieldEditor.php" );

class MarkdownEditor extends AbstractFieldEditor {
    public function head() {
        ?>
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
        <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <?php
    }

    public function editor(  $name, $location  ) {

        # this bit of code literally just removes a linting error
        if( !isset($name) ) { $name = "defaultFieldName"; }

        ?>
        <textarea class="field" id="<?php echo $name; ?>"></textarea>
		<script>
		var easyMDE = new EasyMDE({
			element: $('#<?php echo $name; ?>')[0],
			uploadImage: true,
			imageUploadEndpoint: "save-image.php"
		});
		</script>
        <?php
    }
}
