<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;

JFormHelper::loadFieldClass('list');

/**
 * List of approved states.
 *
 * @package  JED
 * @since    4.0.0
 */
class JedFormFieldApproved extends JFormFieldList
{
	/**
	 * Type of field
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	protected $type = 'approved';

	/**
	 * Build a list of approved states.
	 *
	 * @return  array  List of approved states.
	 *
	 * @since   4.0.0
	 * @throws  RuntimeException
	 */
	public function getOptions(): array
	{
		$params = ComponentHelper::getParams('com_jed');
		$codes = $params->get('awaiting_response_codes');

		$options = [];

		array_walk(
			$codes,
			static function($code) use (&$options) {
				$options[] = HTMLHelper::_('select.option', $code->code, $code->code . ' - ' . $code->name);
			}
		);

		return array_merge(parent::getOptions(), $options);
	}
}
