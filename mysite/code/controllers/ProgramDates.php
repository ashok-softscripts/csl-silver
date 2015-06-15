<?php class ProgramDates extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
		'Date' => 'Varchar'
    );

	private static $has_one = array(	
		'Program' => 'Program'
	);		


	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->renameField('Name', 'Event');
		return $fields;
	}

}
?>
