<?php 
/* Template Name: Single project 
 *  Description: For showing single project  
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>
<?php get_header()?>
<body <?php body_class() ?>>
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero-project" ) ?>>

<section class="main single-blog single-blog-right">
        <div class="container">
            <div class="row">

                <?php 
                 $the_query = new WP_Query( array( 'post_type' => 'projects') ); 
                // while($the_query->have_posts()){
                //     $the_query->the_post();

                ?>
                <?php while ( have_posts() ) { the_post(); ?>
                <div class="col-md-9 select-blog-list" <?php post_class() ?>>
                    
                        <?php 
                         $meta_box_value = get_post_meta( get_the_ID()); 
                         $project_description = $meta_box_value['project_description'][0];
                         $project_start_date_string = $meta_box_value['project_start_date'][0];
                         $project_end_date_string = $meta_box_value['project_end_date'][0];
                        $project_start_date = date('jS F, Y',strtotime($project_start_date_string));
                        $project_end_date = date('jS F, Y',strtotime($project_end_date_string));
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
                        <div class="text-center single_project_cat_date">
                        <?php 
                        
                            $cats = array();
                            $terms = get_the_terms( $post->ID , 'Categories' );
                            foreach ( $terms as $term ) {
                            array_push($cats, $term->name);
                            }
                            if(sizeof($cats) > 0){
                                $post_categories = implode(', ', $cats);
                            }else {
                                    $post_categories = 'Not Assigned';
                            }
                           
                        ?>
                              <span><b>Category: </b></span> <span> <?php echo $post_categories ?></span>
                              <span><b>Start date: </b></span> <span> <?php echo $project_start_date ?></span>
                              <span><b>End date: </b></span>  <span> <?php echo $project_end_date ?></span>
                        </div>
                        <p class="single-blog-description" >
                        
                                 <?php 
                                    
                                     echo $project_description;
                                    ?>
                        </p>
                        <div class="row">
                        
                        <?php 
                       
                        $meta_box_value = get_post_meta( get_the_ID()); 
                        $img = $meta_box_value['gallery_data'];
                
                           
                       
                        $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
                        if($gallery_data['image_url'][0] != ''){
                        ?>
                        <h3 class="col-md-12">Gallery</h3>
                        <?php
                            for($i=0; $i< sizeof($gallery_data['image_url']) ;$i++){
                                ?>
                                <div class="col-md-4">
                                
                                <img src="<?php echo esc_html_e( $gallery_data['image_url'][$i] )?>" style="height:200px;width:100%;margin-bottom:25px" alt="">
                                </div>
                                <?php
                            
                            }
                        }
                        ?>
                        </div>
                        
                    </div>

                    <div class="single-blog-list" style="margin-top:50px;">
                        <div class="row">
                            <h4 class="col-md-12">Make a request to buy</h4>
                        </div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="request_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="request_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="budget">Budget</label>
                                <input type="number" name="request_budget" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="budget">Message</label>
                                <textarea name="request_message" id="" cols="30"class="form-control" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                            <button class="btn btn-default rex-primary-btn-effect-No dark-color"type="reset"  role="button"><span>Cancel</span></button>
										<button class="btn btn-default rex-primary-btn-effect" type="submit" name="request_submit" role="button">Submit request</button>
                            </div>


                        </form>
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

                <?php 
                    global $wpdb;
                    if(isset($_POST['request_submit'])){
                        
                        if( isset($_POST['request_email']) && isset($_POST['request_name']) && isset($_POST['request_budget']) && isset($_POST['request_message']) ){
            
                            $name = $_POST['request_name'];
                            $email = $_POST['request_email'];
                            $budget = $_POST['request_budget'];
                            $message = $_POST['request_message'];
                            $post_id = $post->ID;
     
                            $sql = $wpdb->insert("wp_request",array("name"=>$name,"email"=>$email,"budget"=>$budget,"message"=>$message,"post_id"=>$post_id));

                            if($sql){
                                ?>
                                <script>
                                    
                                        ;(function($){
                                            $(document).ready(function(){
                                                Swal.fire(
                                                    'Message has been sent',
                                                    'You clicked the button!',
                                                    'success'
                                                    );
                                            })
                                        
                                        })(jQuery);
                                </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    ;(function($){
                                            $(document).ready(function(){
                                                Swal.fire(
                                                    'Message has not been sent',
                                                    'You clicked the button!',
                                                    'error'
                                                    );
                                            })
                                        
                                        })(jQuery);
                                </script>
                                <?php
                            }
                        }
                    }
                ?>

                <div class="col-md-3 sidebar">

                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish', // Show only the published posts
                        'post_type'=>'projects'
                    )); ?>
                   
                    <!-- Recent post -->
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
                                <span class="sub-title"><?php echo get_the_date();?> <span class="update-year"></span></span>
                            </div>
                        </div>


                        <?php endforeach; wp_reset_query(); ?>
                        
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