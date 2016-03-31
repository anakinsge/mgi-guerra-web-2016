<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');
?>
<?php if ($params->get('image')) : ?>
    <?php $images = json_decode($item->images);  //print_r($images);?>
    <?php if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
    <?php
    $imgAlt = $images->image_fulltext_alt;
    if (empty($imgAlt)){
        $imgAlt = $item->title;
    }
    ?>
        <div>
            <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
                <img class="img-responsive" src="<?php echo htmlspecialchars($images->image_fulltext); ?>" title="<?php echo htmlspecialchars($imgAlt); ?>" alt="<?php echo htmlspecialchars($imgAlt); ?>"/>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
<div>    
    <?php if ($params->get('item_title')) : ?>
        <<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
        <?php if ($params->get('link_titles') && $item->link != '') : ?>
        <a title="<?php echo $item->title; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
        <?php else : ?>
                <?php echo $item->title; ?>
        <?php endif; ?>
        </<?php echo $item_heading; ?>>
    <?php endif; ?>
    <?php echo $item->afterDisplayTitle; ?>

    <?php echo $item->beforeDisplayContent; ?>
    <?php echo $item->introtext; ?>
    <?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
        <a class="readmore" title="<?php echo $item->title; ?>" href="<?php echo $item->link; ?>"><?php echo $item->linkText; ?></a>
    <?php endif; ?>
</div>