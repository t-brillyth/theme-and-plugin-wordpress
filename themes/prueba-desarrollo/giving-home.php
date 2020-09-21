<?php

/**
 * Template Name: giving-home 
 */

// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>

<main class="main-content">

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="title_home" style="background-image:url(<?php the_post_thumbnail_url('full'); ?>)">
                        <div class="position_header_home">
                            <div class="title_header_home text-center">
                                <div class="inter_header_title">
                                    <h1><?php the_title(); ?></h1>
                                    <?php
                                    echo ('<p>');
                                    the_field('subtitle');
                                    echo ('</p>'); ?>
                                </div>
                            </div>
                        </div>
                    </header>
                </article>


            </div>
        </div><!-- row -->
    </div><!-- container -->

    <!--LIST PORTFOLIO-->
    <div class="lista-portfolio container mb-5">
        <div class="row text-center my-5" id="list_category">
           <div class="col-12">
           <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<div class="listCategory"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
            }
            ?>
           </div>
        </div>
        <div class="row">


            <?php
            $args = array(
                'post_type' => 'portfolio',
                'order'         => 'ASC',
                'orderby'       => 'title'
            );

            $portfolio = new WP_Query($args);

            if ($portfolio->have_posts()) {
                while ($portfolio->have_posts()) {
                    $portfolio->the_post();
            ?>


                    <div class="col-12 col-md-4 portfolio">
                        <figure class="portfolio_home">
                            <?php the_post_thumbnail('large'); ?>
                        </figure>
                        <aside class="description_portfolio">
                            <h4 class='text-left title mb-0'>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <p class="text-left category m-0">
                                <a href="<?php the_permalink(); ?>"> <?php the_category(); ?> </a>
                            </p>
                        </aside>
                    </div>


            <?php }
            }

            ?>
        </div>
    </div>
    <!---->




    <!--List POST-->
    <div class="container postView">

        <div class="row card-group">
            <?php
            global $post;

            $last_posts = get_posts(array('posts_per_page' => 3));

            foreach ($last_posts as $post) :
                setup_postdata($post); ?>

            <?php endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="container-fluid postView">
        <div class="row">
            <!--Post -->
            <div class="col-12 col-sm-12 col-md-12 mb-3">
                <div class="interCard mt-4">
                    <div class="text-center">
                        <?php if (have_rows('last_post')) : ?>
                            <?php while (have_rows('last_post')) : the_row(); ?>
                                <h2 class="title_last pt-3"> <?php the_sub_field('title_section'); ?></h2>
                                <hr />
                                <p class="description_last"><?php the_sub_field('description'); ?></p>
                                <div class="row card-group">
                                    <?php
                                    global $post;

                                    $last_posts = get_posts(array('posts_per_page' => 3));

                                    foreach ($last_posts as $post) :
                                        setup_postdata($post); ?>
                                        <div class="col-12 col-md-4">
                                            <div class="card text-left">
                                                <?php the_post_thumbnail('post-thumbnails', array('class' => 'card-img-top img-fluid')); ?>
                                                <div class="card-body">
                                                    <h5 class="card-titl mb-0"><?php the_title(); ?></h5>
                                                    <p class="text-muted mt-0 mb-3"><small><?php echo get_the_date(); ?> </small></p>
                                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                                </div>
                                                <hr />
                                                <div class="row card-footer">
                                                    <div class="col-6 text-left">
                                                        <a href="#"><i class="fas fa-sync-alt"></i></a>
                                                        <a href="#"><i class="far fa-comments"></i></a>
                                                        <a href="#"><i class="far fa-heart"></i></a>
                                                    </div>
                                                    <a class="col-6 text-right" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php get_footer(); ?>