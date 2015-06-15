<?php class ProgramFees extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
		'Cost' => 'Varchar'
    );

	private static $has_one = array(	
		'Program' => 'Program'
	);		


	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->renameField('Name', 'Fee Type');
		return $fields;
	}
}
?>
