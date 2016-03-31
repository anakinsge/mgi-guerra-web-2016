<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<ul class="mostread<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) : ?>
	<li>
            <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
                <?php $images = json_decode($item->images);  ?>
                <?php if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
                    <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
                        <div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
                        <?php
                        $imgAlt = $images->image_intro_alt;
                        if (empty($imgAlt)){
                            $imgAlt = $item->title;
                        }
                        ?>
                        <img class="img-responsive" src="<?php echo htmlspecialchars($images->image_intro); ?>" title="<?php echo htmlspecialchars($imgAlt); ?>" alt="<?php echo htmlspecialchars($imgAlt); ?>"/>
                    </div>                
                <?php endif; ?>
                <h3><?php echo $item->title; ?></h3>
            </a>
            <?php echo $item->introtext; ?>
	</li>
<?php endforeach; ?>
</ul>
