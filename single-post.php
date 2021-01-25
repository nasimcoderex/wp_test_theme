<?php 
/* Template Name: Single blog 
 * Description: For showing single post  
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 

?>
<?php get_header()?>
<body <?php body_class() ?>>
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-blog" ) ?>>

<section class="main single-blog single-blog-right">
        <div class="container">
            <div class="row">

                <?php 
                while(have_posts()){
                    the_post();
                ?>
                <div class="col-md-9 select-blog-list" <?php post_class() ?>>
                        <?php 
                                if(has_post_thumbnail( )){
                                    $thub = get_the_post_thumbnail_url(null,"large");
                                    ?>
                                    <img src="<?php echo $thub?>" alt="<?php the_title()?>" class="img-responsive" width="100%">
                                    <?php
                                }
                        ?>
                   
                    <div class="single-blog-list">
                        <div class="blog-title">
                            <h3> <?php the_title()?> </h3>
                            <span><?php echo get_the_date()?> <span class="update-year"></span>, by <?php the_author()?> 
                           
                        </span>
                        </div>
                        <p class="single-blog-description" ><?php the_content() ?></p>
                        
                    </div>
                    <!-- br section -->
                    <br>
                    <br>

                    <div class="comment_form_section">
                        <?php 
                         
                            $commenter = wp_get_current_commenter();
                            $req = get_option( 'require_name_email' );
                            $aria_req = ( $req ? " aria-required='true'" : '' );
                            $fields =  array(
                                'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required"></span>' : '' ) .
                                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
                                'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required"></span>' : '' ) .
                                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
                            );
                             
                            $comments_args = array(
                                'fields' =>  $fields,
                                'title_reply'=>'Please give us your valuable comment',
                                'label_submit' => 'Send Comment'
                            );
                             
                            comment_form($comments_args);

                            $comment_number = get_comments_number();
                            if($comment_number != 0){
                                ?>
                                <div class="comment">
                                    <h3>Comments</h3>
                                    <ul class="all-comments">
                                        <li>
                                           
                                                <?php 
                                                    $comments = get_comments(

                                                        array(
                                                            'post_id' => $post->ID,
                                                        )
                                                        );
                                                        wp_list_comments(array(
                                                            'per_page' => 15,
                                                            'walker' => null,
                                                            'reply_text' => 'Reply',
                                                            'callback' => null,
                                                            'end-callback' => null
                                                        ),$comments);
                                                ?>
                                           
                                        </li>
                                        
                                    </ul>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    
                   
                   
                </div>
                <?php } ?>


                <div class="col-md-3 sidebar">

                   
                    <!-- End Categories -->

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
                                <p>&copy; Copyright <span class="update-year"></span> CodeRex</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer()?>
</body>
</html>