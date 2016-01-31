<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='/layouts/main';

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * @var array
     */
    public $menu=array();
    /**
     * @var array
     */
    public $submenu=array();
    /**
     * @var array
     */
    public $footer_menu=array();
    /**
     * @var array
     */
    public $header_menu=array();

    /**
     * Filters
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    /**
     * Access rules.
     * @return array
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

}