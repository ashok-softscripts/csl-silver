<?php class Speaker extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
		'Description' => 'HTMLText'
    );

	private static $has_one = array(	
		'Thumbnail' => 'Image'		
	);		

	private static $belongs_many_many = array(
		 'ProgramSpeakerss' => 'ProgramSpeakers'
    );

	private static $summary_fields = array(
  		'Title' => 'Title'
 	);
 

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$Content = new HTMLEditorField('Description', 'Content');
		$Content->setRows(15);
		$fields->addFieldToTab('Root.Main', $Content);

		$fields->addFieldToTab("Root.Main",  $thumbnail = new UploadField('Thumbnail', 'Thumbnail'));
		$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
		$thumbnail->setFolderName('thumbnails');	

		return $fields;
	}

	public function canView($member = null) {
        return Permission::check('CMS_ACCESS_SpeakerAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_SpeakerAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_SpeakerAdmin', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_SpeakerAdmin', 'any', $member);
    }
}
?>