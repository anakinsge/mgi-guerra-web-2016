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
            <a href="<?php echo $item->link; ?>">
                <b><?php echo $item->title; ?></b>
                <?php $images = json_decode($item->images);  ?>
                <?php if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
                    <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
                    <div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
                    <img
                        <?php if ($images->image_intro_caption):
                        echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
                        endif; ?>
                        <?php
                        $imgAlt = $images->image_intro_alt;
                        if (empty($imgAlt)){
                            $imgAlt = $item->title;
                        }
                        ?>
                        src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($imgAlt); ?>"/>
                    </div>
                <?php endif; ?>
            </a>
	</li>
<?php endforeach; ?>
</ul>
