<?php /* Template Name: woocommerce */ ?>
<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-shop" ) ?>
<section class="main blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 select-blog-list">
                    <div class="row">
                    <?php woocommerce_content(); ?>     
                    <?php 
                    global $product,$post;

                        var_dump($product);
                    ?>
                    </div>
                    
                </div>
                
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