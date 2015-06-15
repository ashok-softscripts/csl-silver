<?php class ProgramFormat extends DataObject {
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Description' => 'Text',
    );

	//Relations
    static $has_one = array (
        'Program' => 'Program'
    );
}
?>
