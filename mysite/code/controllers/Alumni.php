<?php class Alumni extends Page {
  private static $description = "Container for our Alumni pages.";

  private static $db = array(
	'Role' => "Text",		
	'Quote' => "Text",
	'ShortDescription' => 'Text',
	'Year' => 'Varchar',
	'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"
	
  );

	private static $defaults = array(
	);

	private static $icon = "cms/images/treeicons/user-file.gif";

	private static $has_one = array(	
	'Thumbnail' => 'Image',
	'HeroImage' => 'Image'
	);

	private static $has_many = array(
	);

	private static $belongs_to = array(
	);

	private static $belongs_many_many = array(
		 'ProgramAlumnis' => 'ProgramAlumni'
    );

	private static $allowed_children = array();


  public function getCMSFields() {

		$fields = parent::getCMSFields();

		$fields->renameField('Title', 'Name');

		$YearsData = DataObject::get('AlumniYear');
		if ($YearsData) $YearSource = $YearsData->map('Name', 'Name');
		$year_field = new DropdownField('Year', 'Select Year', $YearSource, $this->Year);
		$year_field->setEmptyString('(Select one)');

		$fields->addFieldToTab('Root.Main', $year_field ,'Content');

		$fields->addFieldToTab('Root.Main', new TextField('Role', 'Role'),'Content');

		$fields->addFieldToTab('Root.Main', new TextAreaField('Quote', 'Testimonial Quote'),'Content');

		$fields->addFieldToTab('Root.Main', new TextAreaField('ShortDescription', 'Short Description'),'Content');

		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

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

  public function AlumniByYear($year) {
      return Alumni::get()->exclude(array('ID' => $this->ID))->filter(array('Year' => $year))->limit(12);
  }
}
