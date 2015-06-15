<?php class Program extends Page {
  private static $description = "Container for our program pages.";

  private static $db = array(
	'ShortDescription' => 'Text',
	'Date' => 'SSDatetime',
	'EndDate' => 'SSDatetime',
	'IntensiveProgram' => 'Text',
	'ProgramStatus' => "Enum('open,closed','open')",
	'StatusText' => "Text",

	'OverviewTitle' => "Text",
	'OverviewContent' => 'HTMLText',
	'OverviewBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'TestimonialTitle' => "Varchar",
	'TestimonialContent' => 'TEXT',
	'TestimonialBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','orange')",

	'EnableFormat' => "Boolean(1)",
	'FormatTitle' => "Text",
	'FormatContent' => 'HTMLText',
	'FormatBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'EnableInstructors' => "Boolean(1)",
	'InstructorsTitle' => "Text",
	'InstructorsContent' => 'HTMLText',
	'InstructorsBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'EnableSpeakers' => "Boolean(1)",
	'SpeakersTitle' => "Text",
	'SpeakersContent' => 'HTMLText',
	'SpeakersBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'EnableAlumni' => "Boolean(1)",
	'AlumniTitle' => "Text",
	'AlumniContent' => 'HTMLText',
	'Alumnies' => 'Text',
	'AlumniBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'EnableFees' => "Boolean(1)",
	'FeesTitle' => "Text",
	'FeesContent' => 'HTMLText',
	'DatesTitle' => "Text",
	'DatesContent' => 'HTMLText',
	'FeesBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'ApplyContent' => 'HTMLText',
	'ApplyLinkText' => "Text",
	'ApplyLinkTarget' => "Text",
	'ApplyBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'EnableFAQ' => "Boolean(1)",
	'FAQTitle' => "Text",
	'FAQContent' => 'HTMLText',
	'FAQBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'ImageStyle' => "Enum('none,gray,sepia','none')",
	'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"

  );

	private static $defaults = array(
	);

	private static $icon = "cms/images/treeicons/page-gold-file.gif";

	private static $has_one = array(	
		'Thumbnail' => 'Image',
		'TestimonialImage' => 'Image'
	);

	private static $has_many = array(		
		'ProgramFormats' => 'ProgramFormat',
		'ProgramFees' => 'ProgramFees',
		'ProgramDates' => 'ProgramDates',
		'ProgramFAQs'=> 'ProgramFAQ'
	);

	private static $many_many = array(
		'FormatImages' => 'Image',
		'Instructors' => 'Instructor',
		'Speakers' => 'Speaker',
	);

	private static $belongs_to = array(
	);

	private static $belongs_many_many=array(
	 
	);

	private static $allowed_children = array(
		'ProgramFormat','Instructor','Speaker','ProgramFees','ProgramDates','ProgramFAQ'
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

		/* Overview section */

		$fields->addFieldToTab('Root.Overview', new TextField('OverviewTitle', 'Title'));

		$overviewContent = new HTMLEditorField('OverviewContent', 'Content');
		$fields->addFieldToTab('Root.Overview', $overviewContent);

		$fields->addFieldToTab('Root.Overview', new DropdownField('OverviewBGC','Background Colour',$this->dbObject('OverviewBGC')->enumValues()));


		/* Testimonial section */
		$fields->addFieldToTab('Root.Testimonial', new TextField('TestimonialTitle', 'Title'));

		$fields->addFieldToTab('Root.Testimonial', new TextAreaField('TestimonialContent', 'Testimonial'));

		$fields->addFieldToTab('Root.Testimonial', $TestimonialImage = new UploadField('TestimonialImage', 'Image'));
		$TestimonialImage->allowedExtensions = array('jpg', 'png', 'svg');
		$TestimonialImage->setFolderName('thumbnails');

		$fields->addFieldToTab('Root.Testimonial', new DropdownField('TestimonialBGC','Background Colour',$this->dbObject('TestimonialBGC')->enumValues()));


		/* ProgramFormat section */
		$fields->addFieldToTab('Root.Format', new CheckboxField('EnableFormat','Show Program Format')); 

		$fields->addFieldToTab('Root.Format', new TextField('FormatTitle', 'Title'));

		$formatContent = new HTMLEditorField('FormatContent', 'Content');
		$formatContent->setRows(15);
		$fields->addFieldToTab('Root.Format', $formatContent);

		$fields->addFieldToTab('Root.Format', new DropdownField('FormatBGC','Background Colour',$this->dbObject('FormatBGC')->enumValues()));

		$fields->addFieldToTab('Root.Format', $FormatImages = new UploadField('FormatImages', 'Images'));
		$FormatImages->allowedExtensions = array('jpg', 'png', 'svg');
		$FormatImages->setFolderName('formatimages');
		$FormatImages->setConfig('allowedMaxFileNumber', 10);

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Name',
            'Program.Title'=> 'Program'
        ));    
        $FormatField = new GridField(
            'ProgramFormats',
            'ProgramFormat',
            $this->ProgramFormats(),
            $config
        );        
        $fields->addFieldToTab('Root.Format', $FormatField);


		/* Instructors section */
		$fields->addFieldToTab('Root.Instructors', new CheckboxField('EnableInstructors','Show Instructors')); 

		$fields->addFieldToTab('Root.Instructors', new TextField('InstructorsTitle', 'Title'));

		$instructorsContent = new HTMLEditorField('InstructorsContent', 'Content');
		$instructorsContent->setRows(15);
		$fields->addFieldToTab('Root.Instructors', $instructorsContent);

		$fields->addFieldToTab('Root.Instructors', new DropdownField('InstructorsBGC','Background Colour',$this->dbObject('InstructorsBGC')->enumValues()));

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Name'
        ));    
        $instructorsField = new GridField(
            'Instructors',
            'Instructor',
            $this->Instructors(),
            $config
        );        
        $fields->addFieldToTab('Root.Instructors', $instructorsField);


		/* Speakers section */
		$fields->addFieldToTab('Root.Speakers', new CheckboxField('EnableSpeakers','Show Speakers')); 

		$fields->addFieldToTab('Root.Speakers', new TextField('SpeakersTitle', 'Title'));

		$speakersContent = new HTMLEditorField('SpeakersContent', 'Content');
		$speakersContent->setRows(15);
		$fields->addFieldToTab('Root.Speakers', $speakersContent);

		$fields->addFieldToTab('Root.Speakers', new DropdownField('SpeakersBGC','Background Colour',$this->dbObject('SpeakersBGC')->enumValues()));

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Name'
        ));    
        $speakersField = new GridField(
            'Speakers',
            'Speaker',
            $this->Speakers(),
            $config
        );        
        $fields->addFieldToTab('Root.Speakers', $speakersField);


		/* Alumni section */
		$fields->addFieldToTab('Root.Alumni', new CheckboxField('EnableAlumni','Show Alumni')); 

		$fields->addFieldToTab('Root.Alumni', new TextField('AlumniTitle', 'Title'));

		$alumniContent = new HTMLEditorField('AlumniContent', 'Content');
		$alumniContent->setRows(15);
		$fields->addFieldToTab('Root.Alumni', $alumniContent);

		$AlumniData = DataObject::get('Alumni');
		if ($AlumniData) $AlumniSource = $AlumniData->map('ID', 'Title')->toArray();
		$Alumni_field = ListboxField::create('Alumnies', 'Select Alumni');
	    $Alumni_field->setMultiple(true);
	    $Alumni_field->setSource($AlumniSource);

		$fields->addFieldToTab('Root.Alumni', $Alumni_field);


		$fields->addFieldToTab('Root.Alumni', new DropdownField('AlumniBGC','Background Colour',$this->dbObject('AlumniBGC')->enumValues()));


		/* Fees&Dates section */
		$fields->addFieldToTab('Root.Fees', new CheckboxField('EnableFees','Show Fees & Dates')); 

		$fields->addFieldToTab('Root.Fees', new TextField('FeesTitle', 'Fees Title'));

		$feesContent = new HTMLEditorField('FeesContent', 'Fees Content');
		$feesContent->setRows(15);
		$fields->addFieldToTab('Root.Fees', $feesContent);

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Fee Type',
			'Cost' => 'Cost'
        ));    
        $feesField = new GridField(
            'ProgramFees',
            'Program Fees',
            $this->ProgramFees(),
            $config
        );        
        $fields->addFieldToTab('Root.Fees', $feesField);

	    $fields->addFieldToTab("Root.Fees", new LiteralField('SectorsBreak','<br><br><br>'));

		$fields->addFieldToTab('Root.Fees', new TextField('DatesTitle', 'Dates Title'));

		$datesContent = new HTMLEditorField('DatesContent', 'Dates Content');
		$datesContent->setRows(15);
		$fields->addFieldToTab('Root.Fees', $datesContent);

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Event',
			'Date' => 'Date'
        ));    
        $datesField = new GridField(
            'ProgramDates',
            'Program Dates',
            $this->ProgramDates(),
            $config
        );        
        $fields->addFieldToTab('Root.Fees', $datesField);


		$fields->addFieldToTab('Root.Fees', new DropdownField('FeesBGC','Background Colour',$this->dbObject('FeesBGC')->enumValues()));


		/* Apply section */
		$applyContent = new HTMLEditorField('ApplyContent', 'Content');
		$applyContent->setRows(15);
		$fields->addFieldToTab('Root.Apply', $applyContent);

		$fields->addFieldToTab('Root.Apply', new TextField('ApplyLinkText', 'Link Text'));
		$fields->addFieldToTab('Root.Apply', new TextField('ApplyLinkTarget', 'Link URL'));

		$fields->addFieldToTab('Root.Apply', new DropdownField('ApplyBGC','Background Colour',$this->dbObject('ApplyBGC')->enumValues()));


		/* FAQ section */
		$fields->addFieldToTab('Root.FAQ', new CheckboxField('EnableFAQ','Show FAQ')); 

		$fields->addFieldToTab('Root.FAQ', new TextField('FAQTitle', 'Title'));

		$FAQContent = new HTMLEditorField('FAQContent', 'Content');
		$FAQContent->setRows(15);
		$fields->addFieldToTab('Root.FAQ', $FAQContent);

        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Question'
        ));    
        $FAQField = new GridField(
            'ProgramFAQs',
            'FAQ',
            $this->ProgramFAQs(),
            $config
        );        
        $fields->addFieldToTab('Root.FAQ', $FAQField);

		$fields->addFieldToTab('Root.FAQ', new DropdownField('FAQBGC','Background Colour',$this->dbObject('FAQBGC')->enumValues()));


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
	
  public function ProgramAlumni($ids) {
	  if($ids) {	
		  $idsArray = explode(",",$ids);
    	  return Alumni::get()->filter(array('ID' => $idsArray));	
	  }
  }
 

}
