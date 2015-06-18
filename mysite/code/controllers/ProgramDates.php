<?php class ProgramDates extends DataObject {
	private static $db = array(
		'Name' => 'Varchar',
		'Date' => 'Varchar',
		'SortOrder'=>'Int'
	);

	private static $has_one = array(	
		'ProgramFeesDates' => 'ProgramFeesDates'
	);		

	private static $default_sort='SortOrder';

	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->renameField('Name', 'Event');
		return $fields;
	}
}
?>
