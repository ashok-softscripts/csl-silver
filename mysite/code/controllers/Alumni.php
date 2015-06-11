<?php class Alumni extends Page {
  private static $description = "Container for our Alumni pages.";

  private static $db = array(
	'Role' => "Text",	
	'Year' => "Enum('2012,2008,2014 Aug Intensive,2014 SLDP Illawarra,2014 May Intensive,2014 RELP Nth Rivers,2014 SLDP Nth Rivers,2014,2014 RELP Nth Rivers,2014 Nth Rivers SLDP,2009,2013,2007,2011,2010','2014')",
	'Quote' => 'Text',
	'ShortDescription' => 'Text',
	'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"
	
  );

  private static $defaults = array(
  );

  private static $has_one = array(
	'Thumbnail' => 'Image',
	'HeroImage' => 'Image'
  );


  private static $belongs_many_many=array(
     
  );

  private static $allowed_children = array();


  public function getCMSFields() {

		$fields = parent::getCMSFields();

		$fields->renameField('Title', 'Name');
	
		$fields->addFieldToTab('Root.Main', new TextField('Role','Role'),'Content');

		$fields->addFieldToTab('Root.Main', new DropdownField('Year','Year',$this->dbObject('Year')->enumValues()),'Content');

		$fields->addFieldToTab('Root.Main', new TextAreaField('Quote', 'Testimonial Quote'),'Content');

		$fields->addFieldToTab('Root.Main', new TextAreaField('ShortDescription', 'Short Description'),'Content');

		$fields->addFieldToTab('Root.Main', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()),'Content');

		$fields->renameField("Content", "Description");

		$fields->addFieldToTab('Root.Images', $thumbnail = new UploadField('Thumbnail', 'Thumbnail Image'));
		$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
		$thumbnail->setFolderName('thumbnails');

		$fields->addFieldToTab('Root.Images', $hero = new UploadField('HeroImage', 'Hero Image'));
		$hero->allowedExtensions = array('jpg', 'png', 'svg');
		$hero->setFolderName('heroes');		
	
		return $fields;
  }

 
  
}

class Alumni_Controller extends Page_Controller {
  private static $allowed_actions = array (

  );

  public function init() {
    parent::init();
  }
}
