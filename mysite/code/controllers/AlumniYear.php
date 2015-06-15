<?php class AlumniYear extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
    );

	public function canView($member = null) {
        return Permission::check('CMS_ACCESS_AlumniYearsAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_AlumniYearsAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_AlumniYearsAdmin', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_AlumniYearsAdmin', 'any', $member);
    }
}
?>
