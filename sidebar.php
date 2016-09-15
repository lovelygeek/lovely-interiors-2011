<div id="sidebar">
<?php get_search_form(); ?>

<?php if (is_home()) { ?>
	<p><img src="<?php bloginfo("template_url"); ?>/images/welcome.png" alt="welcome to lovely interiors" class="center" />
	Welcome to Lovely Interiors! I'm Cristina, owner of <a href="http://lovelygeek.net">Lovely Geek Designs!</a> This is my little space where I can share my interior design projects, inspirations, ideas, and share life inside the home. <a href="http://interiors.lovelygeek.net/about/">More?</a></p>
	
	<p class="center">
	<a href="http://feeds.feedburner.com/LovelyInteriors" title="Subscribe to my site!"><img src="<?php bloginfo("template_url"); ?>/images/rss.png" alt="rss" /></a>
	<a href="http://astore.amazon.com/darthcenanet-20" title="Check out my Amazon store!"><img src="<?php bloginfo("template_url"); ?>/images/amazon.png" alt="amazon web store" /></a>
	<a href="http://www.flickr.com/photos/darth_cena/" title="See my photos on Flickr!"><img src="<?php bloginfo("template_url"); ?>/images/flickr.png" alt="flickr" /></a>
	<a href="http://twitter.com/#!/darthcena" title="What's going on with me, you ask?"><img src="<?php bloginfo("template_url"); ?>/images/twitter.png" alt="@DarthCena" /></a>
	<a href="http://pinterest.com/lovelygeek" title="Follow my inspiration!"><img src="<?php bloginfo("template_url"); ?>/images/pinterest.png" alt="lovelygeek" /></a>
	</p> 
	
	<!--<a href="#" title="Tour our home! - Coming soon!"><img src="<?php bloginfo("template_url"); ?>/images/hometour.png" alt="home tour" class="center" /></a>-->
	
	<h2>Navigation</h2>
	<ul class="side">
	<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home'); ?></a></li>
	<?php wp_list_pages('title_li='); ?> 
	</ul>
	
	<h2>Categories</h2>
	<ul class="side"><?php wp_list_categories( '&title_li='); ?></ul>
	
	<h2>Archives</h2>
	<ul class="side"><?php wp_get_archives('type=monthly'); ?></ul>
	
	<h2>Bloggers</h2>
	<ul class="side"><?php wp_list_bookmarks('title_li=&categorize=0&category=2'); ?></ul>
	
	<h2>Inspiration</h2>
	<ul class="side"><?php wp_list_bookmarks('title_li=&categorize=0&category=5'); ?></ul>
	
	<h2>Shopping</h2>
	<ul class="side"><?php wp_list_bookmarks('title_li=&categorize=0&category=3'); ?></ul>
<?php } ?> 


<?php if (is_single()) { if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h2>Navigation</h2>
	<ul class="side">
	<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home'); ?></a></li>
	<?php wp_list_pages('title_li='); ?> 
	</ul>
	
	<h2>Archives</h2>
	<ul class="side"><?php wp_get_archives('type=monthly&limit=6'); ?>
	</ul> 
	
	<h2>Categories</h2>
	<ul class="side"> <?php wp_list_categories( '&title_li='); ?> </ul>
	<?php endwhile; ?><?php endif; ?>
<?php } ?>



<?php if ((is_page('about')) or (is_page('contact'))) { ?>
	<h2>Navigation</h2>
	<ul class="side">
	<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home'); ?></a></li>
	<?php wp_list_pages('title_li='); ?> 
	</ul>
	
	<h2>Elsewhere</h2>
	<ul class="side">
	<li><a href="http://lovelygeek.net">Lovely Geek Designs</a></li>
	<li><a href="http://joshandcristina.com">Joshua <span class="amp">&amp;</span> Cristina</a></li>
	</ul>
	 
	<p class="center">
	<a href="http://feeds.feedburner.com/LovelyInteriors" title="Subscribe to my site!"><img src="<?php bloginfo("template_url"); ?>/images/rss.png" alt="rss" /></a>
	<a href="http://astore.amazon.com/darthcenanet-20" title="Check out my Amazon store!"><img src="<?php bloginfo("template_url"); ?>/images/amazon.png" alt="amazon web store" /></a>
	<a href="http://www.flickr.com/photos/darth_cena/" title="See my photos on Flickr!"><img src="<?php bloginfo("template_url"); ?>/images/flickr.png" alt="flickr" /></a>
	<a href="http://twitter.com/#!/darthcena" title="What's going on with me, you ask?"><img src="<?php bloginfo("template_url"); ?>/images/twitter.png" alt="@DarthCena" /></a>
	<a href="http://pinterest.com/lovelygeek" title="Follow my inspiration!"><img src="<?php bloginfo("template_url"); ?>/images/pinterest.png" alt="lovelygeek" /></a>
	</p> 
<?php } ?>



<?php if ((is_archive()) or (is_search())) { ?>
	<h2>Calendar</h2>
	<?php get_calendar(); ?>
	
	<h2>Archives</h2>
	<ul class="side"><?php wp_get_archives('type=monthly&limit=6'); ?>
	</ul> 	
	
	<h2>Categories</h2>
	<ul class="side"> <?php wp_list_categories( '&title_li='); ?> </ul>			
<?php } ?>	

</div><!--End sidebar-->