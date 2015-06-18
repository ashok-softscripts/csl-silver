<?php class NewsCollection extends Page {
  private static $description = "News list page.";

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $allowed_children = array(
    'News'
  );

  private static $icon = "mysite/Assets/news-list.png";


}

class NewsCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }

}
