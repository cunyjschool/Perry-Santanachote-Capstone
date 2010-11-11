<div class="box">

	<?php
	$the_query = new WP_Query('category_name=feature&cat=-'. $GLOBALS[ex_feat] . ',-' . $GLOBALS[ex_vid] . '&showposts=' . get_option('woo_other_entries') . '&orderby=post_date&order=desc&offset=1');
	$counter = 0; $counter2 = 0;
	while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID; $counter++; $counter2++; 
	?>
				
		<div class="post <?php if ($counter == 1) { echo 'fl'; } else { echo 'fr'; $counter = 0; } ?>"><!--/start post-->
		
			<h2><a title="<?php _e('Permanent link to ',woothemes); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <p class="posted_on"><?php the_time('d F Y'); ?> <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></p>
			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
		
        <div class="postmeta">
        	<span class="posted_in"><?php the_category(', ') ?></span>
        	<span class="comments"><?php comments_popup_link(__('0 Comments',woothemes), __('1 Comment',woothemes), __('% Comments',woothemes)); ?></span>
		</div>
        
        </div><!--/post-->
		
		<?php if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
		
	<p class="more"><a href="<?php echo get_option('woo_archives'); ?>"><?php _e('See more articles in the archive',woothemes); ?></a></p>
	
</div><!--/box-->