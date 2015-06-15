<?php class HomePage extends Page {
  private static $description = "Home page";

  private static $db = array(
	'ApplyContent' => 'HTMLText',
	'ApplyLinkText' => "Text",
	'ApplyLinkTarget' => "Text",
	'ApplyBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
	'FeatureQuote' => "Varchar",
	'QuoteBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

	'SeasonalContent' => "HTMLText",
	'SeasonalLinkText' => "Text",
	'SeasonalLinkTarget' => "Text",
	'SeasonalBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
	'PartnersTitle' => "Varchar",
	'PartnersLinkText' => "Varchar",
	'PartnersLinkTarget' => "Varchar",
	'PartnersLimit' => "Int",
	'PartnersBGC' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",


  );

  private static $has_one = array(
	'ApplyImage' => 'Image'
  );

  private static $allowed_children = array(

  );

  private static $icon = "cms/images/treeicons/home-file.png";

  public function getCMSFields() {

		$fields = parent::getCMSFields();

		$applyContent = new HTMLEditorField('ApplyContent', 'Content');
		$applyContent->setRows(15);
		$fields->addFieldToTab('Root.Application', $applyContent);

		$fields->addFieldToTab('Root.Application', new TextField('ApplyLinkText', 'Link Text'));

		$fields->addFieldToTab('Root.Application', new TextField('ApplyLinkTarget', 'Link URL'));

		$fields->addFieldToTab('Root.Application', $applyimage = new UploadField('ApplyImage', 'Background Image'));
		$applyimage->allowedExtensions = array('jpg', 'png', 'svg');
		$applyimage->setFolderName('applications');

		$fields->addFieldToTab('Root.Application', new DropdownField('ApplyBGC','Background Colour',$this->dbObject('ApplyBGC')->enumValues()));


		$AlumniData = DataObject::get('Alumni');
		if ($AlumniData) $AlumniSource = $AlumniData->map('ID', 'Title');
		$quote_field = new DropdownField('FeatureQuote', 'Select Alumni for quote', $AlumniSource, $this->FeatureQuote);
		$quote_field->setEmptyString('(Select one)');

		$fields->addFieldToTab('Root.Quote', $quote_field);

		$fields->addFieldToTab('Root.Quote', new DropdownField('QuoteBGC','Background Colour',$this->dbObject('QuoteBGC')->enumValues()));

		$seasonalContent = new HTMLEditorField('SeasonalContent', 'Content');
		$seasonalContent->setRows(15);
		$fields->addFieldToTab('Root.Seasonal', $seasonalContent);

		$fields->addFieldToTab('Root.Seasonal', new TextField('SeasonalLinkText', 'Link Text'));

		$fields->addFieldToTab('Root.Seasonal', new TextField('SeasonalLinkTarget', 'Link URL'));

		$fields->addFieldToTab('Root.Seasonal', new DropdownField('SeasonalBGC','Background Colour',$this->dbObject('SeasonalBGC')->enumValues()));

		$fields->addFieldToTab('Root.Partners', new TextField('PartnersTitle', 'Title'));

		$fields->addFieldToTab('Root.Partners', new TextField('PartnersLinkText', 'Link Text'));

		$fields->addFieldToTab('Root.Partners', new TextField('PartnersLinkTarget', 'Link URL'));

		$fields->addFieldToTab('Root.Partners', new NumericField('PartnersLimit', 'No. of partners show'));

		$fields->addFieldToTab('Root.Partners', new DropdownField('PartnersBGC','Background Colour',$this->dbObject('PartnersBGC')->enumValues()));


		return $fields;

  }

	
}

class HomePage_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }

	
  public function FeaturedPartners($num=8) {
    $holder = PartnerCollection::get()->First();
    return ($holder) ? Partner::get()->filter('ParentID', $holder->ID)->limit($num) : false;
  }


}
