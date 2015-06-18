<?php class News extends Page {
  private static $description = "Container for News pages.";

  private static $db = array(
	'Published' => "SSDatetime",		
	'ShortDescription' => 'Text',
	'ImageStyle' => "Enum('none,gray,sepia','none')",
	'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"
	
  );

  private static $defaults = array(
  );

  private static $icon = "mysite/Assets/news.png";

  private static $has_one = array(	
	'Thumbnail' => 'Image',
	'HeroImage' => 'Image'
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

		$dateField = new DateField('Published', 'Publish Date (for example: 06/24/2015)');
    	$dateField->setConfig('showcalendar', true);
	    $dateField->setConfig('dateformat', 'MM/dd/YYYY');
	    $fields->addFieldToTab('Root.Main', $dateField, 'Content');

		$fields->addFieldToTab('Root.Main', new TextAreaField('ShortDescription', 'Short Description'),'Content');

		$fields->addFieldToTab('Root.Images', new DropdownField('ImageStyle','Image Style',$this->dbObject('ImageStyle')->enumValues()));

		$fields->addFieldToTab('Root.Images', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		$fields->addFieldToTab('Root.Images', $thumbnail = new UploadField('Thumbnail', 'Thumbnail Image'));
		$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
		$thumbnail->setFolderName('thumbnails');

		$fields->addFieldToTab('Root.Images', $hero = new UploadField('HeroImage', 'Hero Image'));
		$hero->allowedExtensions = array('jpg', 'png', 'svg');
		$hero->setFolderName('heroes');		
	
		return $fields;
  }

  
}

class News_Controller extends Page_Controller {
  private static $allowed_actions = array (

  );

  public function init() {
    parent::init();
  }

}
