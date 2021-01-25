<?php
/* Template Name: Page
 * Description: For showing all posts 
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 


?>
<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-shop" ) ?>


<section class="main blog-section">
        <div class="container">
            <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-9 select-blog-list">
                    <div class="row">
                
                    
                    <?php the_content(); 
                    
                    
                    ?>     
                    
                    </div>
                    
                </div>
                

            <?php endwhile; ?>
            </div>
        </div>
        <hr class="hr">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <footer>
                        <div class="row">
                            <div class="col-md-12">
                                <p>&copy; Copyright <span class="update-year"></span> Jordan</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </section>

    <?php wp_footer()?>