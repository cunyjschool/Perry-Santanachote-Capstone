<div class="col2">

	<?php include('ads/ads-management.php'); ?>
	
	<?php include('ads/ads-300x250.php'); ?>

	<?php include('ads/ads-top.php'); ?>

   <div class="col2_box">
   
   <?php 
   
   if (is_page) { ?> 
   
   <?php
if($post->post_parent)
$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); else
$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
if ($children) { ?>
<div id="related-cats" class="widget" >
<h2><?php the_title(); ?> <?php _e('Sub Pages',woothemes); ?></h2>
	<ul>
		<?php echo $children; ?>
	</ul>
</div>
<?php } ?>
<?php } ?>

   
   <?php if (is_single()) { ?>
	
		<?php
				$catlist = "";
				foreach((get_the_category()) as $category) { $catlist .= $category->cat_ID; } 
				$the_query = new WP_Query('cat=' . $catlist . '&showposts=5&orderby=post_date&order=desc');
		?>
			
		<div id="related-cats" class="widget" >
			<h2>More posts in this category</h2>
			<ul>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID; ?>	
				
						<li><a title="<?php _e('Permanent link to ',woothemes); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				
						<li class="cat_feed"><a href="<?php get_category_rss_link(true, $category->cat_ID, ''); ?>"><?php _e('This Categorys RSS Feed',woothemes); ?></a></li>
			</ul>
		</div>
   
   <?php } else { ?>
   
   <div class="sideTabs">
   
        <ul class="idTabs">
				<li><a href="#feat"><?php _e('Latest News ',woothemes); ?></a></li>
				<li><a href="#pop"><?php _e('Popular ',woothemes); ?></a></li>
            <li><a href="#comm"><?php _e('Latest Comments ',woothemes); ?></a></li>
        </ul>
        
        <div class="fix"></div>

		<div id="sidetabber">
		
			<ul class="list2" id="feat">
				<?php query_posts('showposts=10'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></li>
				<?php endwhile; endif; ?>
			</ul>

            <ul class="list1" id="pop">
                <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
            </ul>

			<ul class="list3" id="comm">
                <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
			</ul>	

		</div><!--/sidetabber-->
	
	</div><!--/sideTabs-->
   	
	<?php } ?>
	
    <div class="fix" style="height:10px !important;"></div>
    
    <?php include('ads/ads-management.php'); ?>
	
	<?php if (get_option('woo_flickr_id') != "") { ?>
	
		<div class="flickr">
			<?php $flickr_url = get_option('woo_flickr_url'); ?>
			<h2><?php _e('Our Flickr Photos ',woothemes); ?> <span class="flickr-ar"> - <a href="<?php echo "$flickr_url"; ?>"><?php _e('See all photos',woothemes); ?></a></span></h2>
			<div class="photos">
            	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo get_option('woo_flickr_entries'); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>
            </div>
            <div class="fix"></div>            
		</div><!--/flickr-->
	
	<?php } ?>
    
	<?php include('ads/ads-bottom.php'); ?>
	
	<div class="fix"></div>
	
	<div class="subcol fl">
	
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>		
		
			<div class="widget">
			
				<h2 class="hl"><?php _e('Related sites ',woothemes); ?></h2>
				<ul>
					<?php get_links('-1','<li>','</li>'); ?>
				</ul>
			
			</div><!--/widget-->
		
		<?php endif; ?>
	
	</div><!--/subcol-->
		
	<div class="subcol fr">

		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>		
		
			<div class="widget">
				
				<h2 class="hl"><?php _e('Information ',woothemes); ?></h2>
				<ul>
					<li><a href="http://www.woothemes.com">WooThemes</a></li>
					<li><a href="http://www.markforrester.co.za"><?php _e('Designed by ',woothemes); ?> Mark Forrester</a></li>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>					
					<li><a href="http://www.wordpress.org"><?php _e('Powered by ',woothemes); ?> Wordpress</a></li>
					<li><a href="http://localhost/premium/?feed=rss2"><?php _e('Entries ',woothemes); ?> RSS</a></li>
					<li><a href="http://localhost/premium/?feed=comments-rss2"><?php _e('Comments ',woothemes); ?> RSS</a></li>
				</ul>
				
			</div><!--/widget-->
		
		<?php endif; ?>
			
	</div><!--/subcol-->
	
	<div class="fix"></div>
    
    </div><!--/col2_box-->
	
</div><!--/col2-->
