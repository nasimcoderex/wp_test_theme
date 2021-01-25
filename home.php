<?php 
/* Template Name: Blog 

 * Description: For showing all blogs 
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>
<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-blog" ) ?>
<section class="main blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 select-blog-list">
                    <div class="row">

                        <?php 
                    while(have_posts()){
                        the_post();
                    ?>
                        <div class="col-sm-6 col-md-6" <?php post_class() ?>>
                            <div class="thumbnail rex-blog-section">
                            <?php 
                                if(has_post_thumbnail( )){
                                    $thub = get_the_post_thumbnail_url(null,"large");
                                    ?>
                                    <a href="<?php the_permalink()?>"><img src="<?php echo $thub?>" alt="<?php the_title()?>"></a>
                                    <?php
                                }
                            ?>
                                <div class="rex-caption">
                                    <a href="<?php the_permalink()?>">
                                        <h6><?php the_title()?> </h6>
                                    </a>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink()?>" class="">Read more</a>
                                </div>
                                <!-- <div class="post-meta">
                                    <a href="#"><i class="fa fa-share-alt"></i></a>
                                    <a href="#"><i class="fa fa-comment"></i>20</a>
                                    <a href="#"><i class="fa fa-heart"></i>65</a>
                                </div> -->
                            </div>
                        </div>
                        <?php 
                    }
                    ?>

                        
                    </div>
                    <hr class="hr transparent">
                    <!-- page pagination -->
                    <div class="pagination">
                        <nav>
                            <!-- <ul class="pagination pagination-lg">
                                <li><a class="previous" href="#" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a class="next" href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
                            </ul> -->
                             <?php 
                                the_posts_pagination( array(
                                    "screen_reader_text" => ' ',
                                    'prev_text' => __( 'Back', 'green' ),
                                    'next_text' => __( 'next', 'green' ),
                                ));
                                ?>
                        </nav>
                    </div>
                    <!-- end -->
                    
                </div>
                <div class="col-md-3 sidebar">

                   

                    <!-- Categories -->
                    <!-- <div class="rex-widget">
                        <h4 class="title">Categories</h4>
                        <div class="rex-archive">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  Media (7)</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  Photography (4)</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  Wordpress (8)</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  Programming (3)</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  UI/UX Design (5)</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>  Typography (2)</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- End Categories -->

              
                   <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish' // Show only the published posts
                    )); ?>
                   


                    <!-- Recent Categories -->
                    <div class="rex-widget recent-post">
                        <h4 class="title">Recent Post</h4>
                        <!-- Recent Categories list -->

                        <?php 
                         foreach($recent_posts as $post) : ?>
                        

                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo get_permalink($post['ID']) ?>">
                                    <?php  $test_thumb_img = get_the_post_thumbnail_url($post['ID']);?>
                                    
					                <img class="media-object recent-post-img"  alt="" src="<?php echo $test_thumb_img;?>">
				                </a>
                            </div>
                            <div class="media-body">
                                <a href="<?php echo get_permalink($post['ID']) ?>">
                                    <h6 class="media-heading"><?php echo $post['post_title'] ?> </h6>
                                </a>
                                <span class="sub-title">23 Jan <span class="update-year"></span></span>
                            </div>
                        </div>


                        <?php endforeach; wp_reset_query(); ?>
                    </div>
                    <!-- End Categories -->

                    <!-- Video Categories -->
                    

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

    <?php wp_footer(  )?>