<?php

/**
 * Template Name: Full Width Image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

  <div id="content" class="site-content">
    <div id="primary" class="content-area">

      <main id="main" class="site-main">

        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
        <header class="entry-header featured-full-width-img height-75 bg-dark text-light mb-3" style="background-image: url('https://probearbeit.webstube24.de/wp-content/uploads/2024/02/HL8-scaled-1.jpg')">
          <div class="<?= bootscore_container_class(); ?> entry-header h-100 d-flex align-items-end pb-3">
            <div id="headerText">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
          </div>
        </header>

        <div class="<?= bootscore_container_class(); ?> pb-5">

          <!-- Hook to add something nice -->
          <?php bs_after_primary(); ?>

          <section>
            <h1>Überschrift</h1>
            <p>text bla bla bla</p>
          </section>


          <?php woo_product_slider( 35 ); ?>


          <div class="row">
            <div class="<?= bootscore_main_col_class(); ?>">

              <div class="entry-content">
                <?php the_content(); ?>
              </div>

              <footer class="entry-footer">
                <?php comments_template(); ?>
              </footer>

            </div>
            <?php get_sidebar(); ?>
          </div>
        </div>

      </main>

    </div>
  </div>

<?php
get_footer();
