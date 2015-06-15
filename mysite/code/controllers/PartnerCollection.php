<?php class PartnerCollection extends Page {
  private static $description = "Partner Collection";

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $allowed_children = array(
	'Partner'   
  );

  private static $icon = "mysite/Assets/partners.png";


}

class PartnerCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }

}
