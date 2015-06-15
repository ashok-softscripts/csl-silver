<?php
class AlumniYearsAdmin extends ModelAdmin {

    private static $managed_models = array(
        'AlumniYear',
    );

    private static $url_segment = 'alumniyear';

    private static $menu_title = 'Alumni Years';

	private static $menu_icon = "mysite/Assets/calendar.png";
}

class InstructorAdmin extends ModelAdmin {

    private static $managed_models = array(
        'Instructor',
    );

    private static $url_segment = 'instructors';

    private static $menu_title = 'Instructors';

	private static $menu_icon = "mysite/Assets/Instructor.png";

}


class SpeakerAdmin extends ModelAdmin {

    private static $managed_models = array(
        'Speaker',
    );

    private static $url_segment = 'speakers';

    private static $menu_title = 'Speakers';

	private static $menu_icon = "mysite/Assets/speaker.png";
}


?>
