<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Jed\Administrator\Controller;

defined('_JEXEC') or die;

use Exception;
use Joomla\CMS\MVC\Controller\AdminController;

use function defined;

/**
 * Tickets list controller class.
 *
 * @since 4.0.0
 */
class TicketsController extends AdminController
{
	/**
	 * Text prefix
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	public $text_prefix = 'COM_JED_TICKETS';

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
	public function getModel($name = 'Ticket', $prefix = 'Administrator', $config = ['ignore_request' => true])
	{
		return parent::getModel($name, $prefix, $config);
	}
}