<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

use Joomla\CMS\MVC\Controller\AdminController;

/**
 * Extensions list controller class.
 *
 * @since 4.0.0
 */
class JedControllerExtensions extends AdminController
{
	/**
	 * Set the text context
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	protected $text_prefix = 'COM_JED_EXTENSIONS';

	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    Optional. Model name
	 * @param   string  $prefix  Optional. Class prefix
	 * @param   array   $config  Optional. Configuration array for model
	 *
	 * @return  object    The Model
	 *
	 * @since   4.0.0
	 * @throws  Exception
	 */
	public function getModel($name = 'Extension', $prefix = 'JedModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
