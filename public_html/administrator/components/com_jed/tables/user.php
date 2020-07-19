<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;

/**
 * JED Review table class
 *
 * @since  4.0.0
 */
class TableUser extends Table
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  A database connector object
	 *
	 * @since   4.0.0
	 */
	public function __construct($db)
	{
		parent::__construct('#__jed_users', 'id', $db);
	}
}
