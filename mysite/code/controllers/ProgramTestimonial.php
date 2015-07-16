<?php class ProgramTestimonial extends Page {
	private static $db = array(
		'EnableNav' => "Boolean(1)",
		'Description' => 'Text',
		'Name' => 'Varchar(100)',
		'LinkURL' => 'Varchar',
		'LinkStyle' => 'Varchar(100)',
		'BackgroundColour' => 	"Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','orange')"
	);

	private static $has_one = array(	
		'TestimonialImage' => 'Image'
	);
 	
	private static $defaults = array(
  		'ShowInSearch' => 0
  	);

  	public function getCMSFields() {
    	$fields = parent::getCMSFields();

		/* Reset Defaults */
		$fields->removeByName("Metadata");
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('EnableNav','Show In Navigation'),'Content'); 
				
		$fields->addFieldToTab('Root.Main', new TextAreaField('Description', 'Description'));

		$fields->addFieldToTab('Root.Main', new TextField('Name', 'Title'));
		
		$fields->addFieldToTab('Root.Main', new TextField('LinkURL', 'Link URL'));
		
		$fields->addFieldToTab('Root.Main', new DropdownField('LinkStyle','Link Style',array(
		'h2' => 'H2',	
		'h3' => 'H3'		
  	)));

		$fields->addFieldToTab('Root.Main', $TestimonialImage = new UploadField('TestimonialImage', 'Image'),'Content');
		$TestimonialImage->allowedExtensions = array('jpg', 'png', 'svg');
		$TestimonialImage->setFolderName('thumbnails');

		//$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));
		
		/* Reset Defaults */
		$fields->removeByName("Content");

		return $fields;
  	}
}


class ProgramTestimonial_Controller extends Page_Controller {
	private static $allowed_actions = array (
  	);

  	public function init() {
    	parent::init();
  	}
}

?>