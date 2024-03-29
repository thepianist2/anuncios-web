<?php
/**
 *
 * This file is part of the sfFilebasePlugin package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   de.optimusprime.sfFilebasePlugin.adminArea
 * @author    Johannes Heinen <johannes.heinen@gmail.com>
 * @license   MIT license
 * @copyright 2007-2009 Johannes Heinen <johannes.heinen@gmail.com>
 */
?>
<?php use_stylesheet('/sfFilebasePlugin/css/cloud.css');?>
<?php use_helper('tagcloud')?>
<div class="tagcloud">
  <?php  TagcloudHelper::showCloud($tags->getRawValue(), $url);?>
</div>