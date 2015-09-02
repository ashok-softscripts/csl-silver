<?php class ProgramDates extends DataObject {
	private static $db = array(
		'Name' => 'Varchar(255)',
		'Date' => 'Varchar(255)',		
		'Link' => 'Varchar(255)',
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
