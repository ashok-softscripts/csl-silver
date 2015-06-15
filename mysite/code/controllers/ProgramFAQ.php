<?php class ProgramFAQ extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
		'Answer' => 'HTMLText'
    );

	private static $has_one = array(	
		'Program' => 'Program'
	);		


	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->renameField('Name', 'Question');

		$Content = new HTMLEditorField('Answer', 'Answer');
		$Content->setRows(15);
		$fields->addFieldToTab('Root.Main', $Content);

		return $fields;
	}
}
?>
