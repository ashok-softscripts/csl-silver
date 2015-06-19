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
	  'FeaturesRow'
  );

  private static $icon = "cms/images/treeicons/home-file.png";

  public function getCMSFields() {

		$fields = parent::getCMSFields();

		return $fields;

  }
	

	
}

class HomePage_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }
		
  function LatestNews($num=2){
	$holder = Blog::get()->First();
    return ($holder) ? BlogPost::get()->filter('ParentID', $holder->ID)->limit($num) : false;
  }


}
