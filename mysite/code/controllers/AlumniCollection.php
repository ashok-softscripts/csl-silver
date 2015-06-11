<?php class AlumniCollection extends Page {
  private static $description = "Top level listing for a group of Alumni page.";

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $allowed_children = array(
    'Alumni'
  );

}

class AlumniCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }
}
