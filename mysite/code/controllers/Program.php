<?php class Program extends Page {
  private static $description = "Container for our program pages.";

  private static $db = array(
	'ShortDescription' => 'Text',
	'Date' => 'SSDatetime',
	'EndDate' => 'SSDatetime',
	'IntensiveProgram' => 'Text',
	'ProgramStatus' => "Enum('open,closed','open')",
	'StatusText' => "Text",	  
	'ImageStyle' => "Enum('none,gray,sepia','none')",
	'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"

  );

	private static $defaults = array(
	);

	private static $icon = "cms/images/treeicons/page-gold-file.gif";

	private static $has_one = array(	
		'Thumbnail' => 'Image'
	);

	private static $has_many = array(		
	);

	private static $many_many = array(		
	);

	private static $many_many_extraFields=array(		
	);

	private static $belongs_to = array(
	);

	private static $belongs_many_many=array(
	);

	private static $allowed_children = array(
		'ProgramOverview',
		'ProgramTestimonial',
		'ProgramFormats',
		'ProgramInstructors',
		'ProgramSpeakers',
		'ProgramAlumni',
		'ProgramFeesDates',
		'ProgramApplication',
		'ProgramFAQSection',
		'UserDefinedForm',
	);



  //Outputs date span or single date if no end date defined
	public function DateRange() {
		$start = new Date();
		$start->setValue($this->Date);

		if (!is_null($this->EndDate)) { // Check if there is an end date
			$end = new Date();
			$end->setValue($this->EndDate);
			return $start->RangeString($end);
		} 
		else {
			return $start->Long();
		}
	}

	//Outputs date period bewtween start and end dates
	public function DatePeriod() {
         if($this->Date && $this->EndDate) {
             $ago = abs(strtotime($this->EndDate) - strtotime($this->Date));
             
             if($ago < 60) {
                 $span = $ago;
                 return ($span != 1) ? "{$span} secs" : "{$span} sec";
             }
             if($ago < 3600) {
                 $span = round($ago/60);
                 return ($span != 1) ? "{$span} mins" : "{$span} min";
             }
             if($ago < 86400) {
                 $span = round($ago/3600);
                 return ($span != 1) ? "{$span} hours" : "{$span} hour";
             }
             if($ago < 86400*30) {
                 $span = round($ago/86400);
                 return ($span != 1) ? "{$span} days" : "{$span} day";
             }
             if($ago < 86400*365) {
                 $span = round($ago/86400/30);
                 return ($span != 1) ? "{$span} months" : "{$span} month";
             }
             if($ago > 86400*365) {
                 $span = round($ago/86400/365);
                 return ($span != 1) ? "{$span} years" : "{$span} year";
             }
         }
     }

  	public function getCMSFields() {

		$fields = parent::getCMSFields();

		/* Main section */
		$fields->renameField('Title', 'Name');

		$fields->addFieldToTab('Root.Main', new TextAreaField('ShortDescription', 'Short Description'),'Content');

		$dateField = new DateField('Date', 'Start Date (for example: 06/24/2015)');
		$dateField->setConfig('showcalendar', true);
		$dateField->setConfig('dateformat', 'MM/dd/YYYY');
		$fields->addFieldToTab('Root.Main', $dateField, 'Content');

		$EndDateField = new DateField('EndDate', 'End Date (for example: 06/24/2015)');
		$EndDateField->setConfig('showcalendar', true);
		$EndDateField->setConfig('dateformat', 'MM/dd/YYYY');
		$fields->addFieldToTab('Root.Main', $EndDateField, 'Content');

		$fields->addFieldToTab('Root.Main', new TextField('IntensiveProgram', 'Intensive Program'),'Content');

		$fields->addFieldToTab('Root.Main', new DropdownField('ProgramStatus','Status',$this->dbObject('ProgramStatus')->enumValues()), 'Content');

		$fields->addFieldToTab('Root.Main', new TextField('StatusText', 'Status Note'),'Content');

		/* Theme section */
		$fields->addFieldToTab('Root.Theme', new DropdownField('ImageStyle','Image Style',$this->dbObject('ImageStyle')->enumValues()));

		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		$fields->addFieldToTab('Root.Theme', $thumbnail = new UploadField('Thumbnail', 'Thumbnail Image'));
		$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
		$thumbnail->setFolderName('thumbnails');	

		/* Reset Defaults */
		$fields->removeByName("Content");

		return $fields;
	}
  
}

class Program_Controller extends Page_Controller {
  	private static $allowed_actions = array (
	);

  	public function init() {
    	parent::init();
  	}
}
