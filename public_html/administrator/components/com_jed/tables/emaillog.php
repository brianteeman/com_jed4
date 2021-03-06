<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;

/**
 * Email logs table class
 *
 * @since  4.0.0
 */
class TableEmaillog extends Table
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  A database connector object
	 * @since   4.0.0
	 */
	public function __construct($db)
	{
		parent::__construct('#__jed_email_logs', 'id', $db);
	}
}
