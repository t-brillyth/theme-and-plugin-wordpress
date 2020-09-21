<?php  get_header('new'); ?>
<div class="container-fluid header_post">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6 text-center">
			<h2><?php
				if (is_singular()) :
					the_title('<h1 class="entry-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;

				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<?php
						prueba_desarrollo_posted_on();
						prueba_desarrollo_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</h2>
			<p><?php the_breadcrumb(); ?></p>
		</div>
		<div class="col-3"></div>
	</div>

</div>

	<main id="primary" class="site-main container">
		<div class="row">		
			<div class="col-12 col-md-3 my-2">
				<?php get_sidebar();?>
			</div>

			<div class="col-12 col-md-9 my-2">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer('post');
