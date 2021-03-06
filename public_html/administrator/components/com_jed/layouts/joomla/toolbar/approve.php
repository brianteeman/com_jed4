<?php
/**
 * @package    JED
 *
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('behavior.core');

/**
 * @var array   $displayData The array with values
 *
 * @var string  $title       The button title
 * @var integer $approved    The approved state
 */
$title = $displayData['title'];

$buttonClass = '';

switch ($displayData['approved'])
{
	case '0':
		$buttonClass = 'btn-warning';
		break;
	case '1':
		$buttonClass = 'btn-success';
		break;
	case '2':
		$buttonClass = 'btn-danger';
		break;
	case '3':
		$buttonClass = 'btn-info';
		break;
}
?>
<button type="button" data-toggle="modal"
        onclick="jQuery('#approveModal').modal('show'); return true;"
        class="btn btn-small <?php
        echo $buttonClass; ?>">
    <span class="icon-checkmark-circle" aria-hidden="true"></span>
	<?php echo $title; ?>
</button>
