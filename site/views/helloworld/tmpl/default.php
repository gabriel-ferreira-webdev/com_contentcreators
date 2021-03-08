<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<div class="container">
<div class="item-page">

<div style="text-align: center;"><span style="font-size: 18pt; font-family: sourceSansPro-SemiBold;"><strong>ONE GREAT WORK NETWORK CONTENT CREATORS</strong></span></div>

<ul class="menu-cc mod-list">

<?php
// first line might not be necessary depending on Joomla version
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
$usersID = JAccess::getUsersByGroup(6);
$users = array();
foreach($usersID as $cUserID)
{
    $user[] = JFactory::getUser($cUserID);
    $userProfile[] = JUserHelper::getProfile( $cUserID );

}
function cmp($a, $b)
{
    return strcmp($a->name, $b->name);
}
function cmp2($a, $b)
{
    return strcmp($a->profile, $b->profile);
}

usort($user, "cmp");


for ($i=0; $i < count($user); $i++) {
  foreach ($userProfile as $ccp) {
  if ($user[$i]->{'id'} == $ccp->{"id"}) {


$customFields = FieldsHelper::getFields('com_users.user', JFactory::getUser($ccp->{"id"}), true);
foreach ($customFields as $ccf) {

if ($ccf->name == "blog-url") {

// echo '<pre>';
// print_r($customFields);
// echo '</pre>';
?>
<li class="<?php echo ($ccf->value); ?>">
<a href="<?php echo ($ccf->value); ?>">
<img src="<?php echo $ccp->{"profile"}["avatar"]; ?>" alt="">
<span class="image-title">
<?php
echo $user[$i]->{"name"};
?>
</span>
</a>
</li>
<?php
}
  }

}
}


    }
?>

</ul>

</div>
</div>
