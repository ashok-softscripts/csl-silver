<?php class Partner extends Page {
  private static $description = "Container for partners";

  private static $db = array(
	'Website' => "Text",		
  );

  private static $defaults = array(
  );

  private static $icon = "mysite/Assets/partner.png";

  private static $has_one = array(	
	'Logo' => 'Image'
  );

	private static $has_many = array(
	);

	private static $belongs_to = array(
	);

	private static $belongs_many_many=array(
	 
	);

	private static $allowed_children = array();


  public function getCMSFields() {

		$fields = parent::getCMSFields();

		$fields->renameField('Title', 'Name');

		$fields->addFieldToTab('Root.Main', new TextField('Website', 'Website'),'Content');

		$fields->addFieldToTab('Root.Main', $thumbnail = new UploadField('Logo', 'Logo'));
		$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
		$thumbnail->setFolderName('partners');

		$fields->renameField("Content", "Summary");

	
		return $fields;
  }

  
}

class Partner_Controller extends Page_Controller {
  private static $allowed_actions = array (

  );

  public function init() {
    parent::init();
  }

}
