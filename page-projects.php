<?php 
/* Template Name: Project
 * Description: For showing all projects 
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>
<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-project" ) ?>
<section class="main blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 select-blog-list">
                    <div class="row">

                        <?php 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $the_query = new WP_Query( array( 'paged' => $paged, 'post_type' => 'projects', 'posts_per_page' => 10 ) ); 
                    while($the_query->have_posts()){
                        $the_query->the_post();
                    ?>
                        <div class="col-sm-6 col-md-6" style="height:500px;" <?php post_class() ?>>
                            <div class="thumbnail rex-blog-section">
                            <?php 
                                if(has_post_thumbnail( )){
                                    $thub = get_the_post_thumbnail_url(null,"large");
                                    ?>
                                    <a href="<?php  the_permalink( $post->ID )?>"><img style="height:250px;" src="<?php echo $thub?>" alt="<?php the_title()?>"></a>
                                    <?php
                                }
                            ?>
                                <div class="rex-caption">
                                    <a href="<?php the_permalink()?>">
                                        <h6><?php the_title()?> </h6>
                                    </a>
                                    <?php 
                                     $meta_box_value = get_post_meta( get_the_ID()); 
                                     $project_description = $meta_box_value['project_description'][0];
                             
                                    $description_excerpt = substr($project_description, 0, 150);
                                    ?>
                                    <p><?php echo $description_excerpt ?></p>
                                   
                                    <a href="<?php the_permalink()?>" class="">Read more</a>
                                </div>
                               
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
                       
                             <?php 
                            
                                    previous_posts_link( 'Previous' ); 
                                 
                                     next_posts_link( 'Next', $the_query->max_num_pages );
                                   
                                ?>
                        </nav>
                    </div>
                    <!-- end -->
                    
                </div>
                <div class="col-md-3 sidebar">

                   <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'post_type'=>'projects',
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish' // Show only the published posts
                    )); ?>
                   


                    <!-- Recent Categories -->
                    <div class="rex-widget recent-post">
                        <h4 class="title">Recent Projects</h4>
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

    <?php wp_footer()?>