<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_categories
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<?php 
// getting the category image
$catid = $params->get('parent');
// Get a db connection.
$ganimed_db = JFactory::getDbo();
// Create a new query object.
$ganimed_query = $ganimed_db->getQuery(true);
$ganimed_query
	->select(array('title, params'))
	->from('#__categories')
	->where('id = '.$catid.'');
// Reset the query using our newly populated query object.
$ganimed_db->setQuery($ganimed_query);
// Load the result(1) as an object.
$cat = $ganimed_db->loadObject();
$catparams = json_decode($cat->params);
?>
<?php if ($catparams->image) :?>
	<div class="category-img">
		<img src="<?php echo $catparams->image; ?>" alt="<?php echo $cat->title; ?>" />
	</div>
<?php endif; ?>
<ul class="categories-module<?php echo $moduleclass_sfx; ?>">
<?php
require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default').'_items');
?></ul>
