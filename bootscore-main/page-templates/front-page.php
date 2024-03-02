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
      <header class="entry-header featured-full-width-img height-75 bg-dark text-light mb-3" style="background-image: url('https://probearbeit.webstube24.de/wp-content/uploads/2024/02/HL8-scaled-1.jpg')">
        <div class="<?= bootscore_container_class(); ?> entry-header h-100 d-flex flex-column justify-content-center pb-3">
          <div id="headerText">
            <h1 class="display-1"><?php bloginfo('name'); ?></h1>
            <p class="lead"><?php bloginfo('description'); ?></p>
            <button class="btn btn-lg buttone">Jetzt Kontaktieren</button>
          </div>
        </div>
      </header>

      <div class="<?= bootscore_container_class();?> pb-5">
        <?php bs_after_primary(); ?>

        <section class="text-center mt-5 mb-5 abstandLinksRechts">
          <h1>Willkommen bei Süt-term Hamburg</h1>
          <p>Willkommen bei Variotherm Hamburg - Ihr Experte für behagliche Wärme und erfrischende Kühle direkt in Ihrer Stadt! Entdecken Sie unsere hochwertigen Heiz- und Kühlsysteme, jetzt auch mit der Möglichkeit zum direkten Kauf in unserem Shop. Egal ob für Neubau oder Sanierung, wir bieten maßgeschneiderte Lösungen, die sich perfekt in Ihr Zuhause integrieren lassen. Besuchen Sie uns in Hamburg und erleben Sie Komfort und Effizienz mit Variotherm.</p>
        </section>

        <div class="pt-5 text-center">
          <h1 id="orangen">UNSERE PRODUKTE</h1>
          <?php woo_product_slider( 35 ); ?>
        </div>

        <section id="orange" class="text-center mt-5 full-width">
          <h3>Kontaktieren Sie uns jetzt!</h3>  
        </section> 

        <div class="row mt-5">
            <div class="entry-content">
              <div class="container">
                <div class="row">
                  <div class="col-sm pt-5">
                    <?php the_content(); ?>
                  </div>
                  <div class="col-sm align-self-center">
                    <?php echo do_shortcode('[einbetten_seite slug="hakon"]'); ?>
                    <p>Hakan Ertugrul</p>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- Schließt die row mt-5 -->
      </div> <!-- Schließt bootscore_container_class() pb-5 -->
    </main>
  </div> <!-- Schließt content-area -->
</div> <!-- Schließt site-content -->

<?php
get_footer();
?>
