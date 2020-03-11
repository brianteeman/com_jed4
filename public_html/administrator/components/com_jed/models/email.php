<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\AdminModel;

/**
 * Email model
 *
 * @since   4.0.0
 */
class JedModelEmail extends AdminModel
{
	/**
	 * Get the form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A Form object on success | False on failure.
	 *
	 * @since   4.0.0
	 *
	 * @throws  Exception
	 */
	public function getForm($data = [], $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_jed.email',
			'email',
			['control' => 'jform', 'load_data' => $loadData]
		);

		if (!is_object($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Send out a test e-mail.
	 *
	 * @return  array  Contains message and status.
	 *
	 * @since   4.0.0
	 *
	 * @throws  Exception
	 */
	public function testEmail(): array
	{
		$config   = Factory::getConfig();
		$from     = $config->get('mailfrom');
		$fromName = $config->get('fromname');
		$mail     = Factory::getMailer();
		$input    = Factory::getApplication()->input;

		$cids            = $input->get('cid', [], 'array');
		$email           = $input->get('email', null, '');
		$result          = [];
		$result['msg']   = '';
		$result['state'] = 'error';

		if (!$cids || !$email)
		{
			$result['msg'] = Text::_('COM_JED_NO_EMAILS_FOUND');

			if (!$email)
			{
				$result['msg'] = Text::_('COM_JED_MISSING_EMAIL_ADDRESS');
			}

			return $result;
		}

		$db    = $this->getDbo();
		$query = $db->getQuery(true)
			->select(
				[
					$db->quoteName('subject'),
					$db->quoteName('body'),
				]
			)
			->from($db->quoteName('#__jed_emails'));

		foreach ($cids as $cid)
		{
			$query->clear('where')
				->where($db->quoteName('id') . ' = ' . (int) $cid);
			$db->setQuery($query);
			$details = $db->loadObject();

			if ($details->body)
			{
				$mail->clearAddresses();

				if ($mail->sendMail($from, $fromName, $email, $details->subject, $details->body, true))
				{
					$result['msg']   = Text::_('COM_JED_TESTEMAIL_SENT');
					$result['state'] = '';
				}
			}
		}

		return $result;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  array  The data for the form.
	 *
	 * @since   4.0.0
	 *
	 * @throws  Exception
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = Factory::getApplication()->getUserState('com_jed.edit.email.data', []);

		if (0 === count($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
}