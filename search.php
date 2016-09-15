<?php get_header(); ?>
<div id="content">
<?php get_sidebar(); ?>

<div id="blog">
	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>
		<p>Your search for <strong><?php the_search_query() ?></strong> discovered the following results:</p>

	<?php while (have_posts()) : the_post(); ?>
		<div class="post blurb" id="post-<?php the_ID(); ?>">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="commentlink date"><?php the_time('D, F jS, Y @ g:ia') ?></div>

		<div class="excerpt">
		<?php the_excerpt(); ?>
		</div>
		
	</div><!--end post_class -->
	
	<?php endwhile; // START REST OF PAGE ?>
		<div class="browse">
		<p class="older"><?php next_posts_link('&laquo; Older Posts '); ?></p>
		<p class="newer"><?php previous_posts_link('Newer Posts &raquo;'); ?></p>
		</div>

	<?php else :?>
		<h1>Search Results</h1>
		<p>Nothing was found for your search: <strong><?php the_search_query() ?></strong></p>
		<p>Try your search again?</p>
	<?php endif; ?>
	
		</div><!---blog-->
	</div><!--content-->
<?php get_footer(); ?>