<?php get_header(); ?>
<div id="content">
<?php get_sidebar(); ?>	

<div id="blog">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="subject"><?php the_title(); ?></a>
			<div class="commentlink date"><?php the_time('l, F jS, Y') ?> <?php edit_post_link('Edit &raquo;', '&oslash; ', ''); ?></div>
		
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			
			<?php comments_template(); // Get wp-comments.php template ?>	
		</div><!--end post_class -->
		
		<div class="browse">
		<p class="next"><?php next_post_link('%link &raquo;'); ?></p>
		<p class="previous"><?php previous_post_link('&laquo; %link'); ?></p>
		</div>
		<?php endwhile; endif; ?>
	</div><!--end blog-->	
</div><!--content-->	
<?php get_footer(); ?>