<?php get_header(); ?>
<div id="content">
<?php get_sidebar(); ?>

	<div id="blog">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="subject"><?php the_title(); ?></a>
			<div class="commentlink date"><?php the_time('l, F jS, Y') ?> <?php edit_post_link('Edit &raquo;', '&oslash; ', ''); ?></div>
			
			<!--storycontent-->
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<!--storycontent-->
		
			<p class="postmetadata">
				Posted in <?php the_category(', ') ?> |  
				<?php wp_link_pages(); ?><a href="<?php comments_link(); ?>"><?php comments_number('Leave a Comment','1 Comment','% Comments'); ?></a>
			</p>
			<?php comments_template(); // Get wp-comments.php template ?>
		</div><!--end post_class -->
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
		
		<div class="browse">
			<p class="older"><?php next_posts_link('&laquo; Older Posts '); ?></p>
			<p class="newer"><?php previous_posts_link('Newer Posts &raquo;'); ?></p>
		</div>

	</div><!--end blog-->	
</div><!--end content-->
<?php get_footer(); ?>