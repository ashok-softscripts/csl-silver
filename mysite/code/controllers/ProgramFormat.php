<?php class ProgramFormat extends DataObject {
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Description' => 'Text',
        'SortOrder'=>'Int'
    );

	//Relations
    static $has_one = array (
        'Program' => 'Program'
    );

	public static $default_sort='SortOrder';
}
?>
