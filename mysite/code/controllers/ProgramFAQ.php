<?php class ProgramFAQ extends DataObject {
	private static $db = array(
        'Name' => 'Text',
		'Answer' => 'HTMLText',
        'SortOrder'=>'Int'
    );

	private static $has_one = array(	
		'ProgramFAQSection' => 'ProgramFAQSection'
	);		

	private static $default_sort='SortOrder';

	public function getCMSFields(){	
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new TextField('Name', 'Question'));
		
		//$fields->renameField('Name', 'Question');

		$Content = new HTMLEditorField('Answer', 'Answer');
		$Content->setRows(15);
		$fields->addFieldToTab('Root.Main', $Content);

		return $fields;
	}
}
?>
