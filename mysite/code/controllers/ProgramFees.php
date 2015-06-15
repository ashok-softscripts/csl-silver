<?php class ProgramFees extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
		'Cost' => 'Varchar',
        'SortOrder'=>'Int'
    );

	private static $has_one = array(	
		'Program' => 'Program'
	);		

	private static $default_sort='SortOrder';

	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->renameField('Name', 'Fee Type');
		return $fields;
	}
}
?>
