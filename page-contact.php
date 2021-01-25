<?php 
/* Template Name: Contact 
 * Description: For showing Conatct information 
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>

<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero" ) ?>


<div class="contact_main">
    <!--touch_section start -->
    <?php 
        $contact_title = get_field('about_section_title');
        $contact_description = get_field('about_description');
    ?>
    <div class="touch_section">
        <div class="container">
            <?php if($contact_title): ?>
            <h1 class="touch_text"><?php echo $contact_title?></h1>
            <?php endif;?>
        </div>
    </div>

    <div class="lets_touch_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php if($contact_description): ?>
                <p class="lorem_text"><?php echo $contact_description?></p>
                <?php endif;?>     
                </div>
                <div class="col-md-6">
                    <div class="input_main">
                       <div class="container">
                             <form class="contact-forms" action="<?php echo site_url();?>" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="cn_name" placeholder="Name" required>
												</div>
												<div class="form-group">
													<input type="email" class="form-control" name="cn_email" placeholder="Email" required>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="cn_phone" placeholder="Phone" required>
												</div>
											</div>
											<div class="col-md-6">
												<textarea class="form-control" rows="6" name="cn_message" placeholder="Message" required></textarea>
											</div>
										</div>
									
									<div class="contact-btn">
										<button class="btn btn-default rex-primary-btn-effect-No dark-color"type="reset"  role="button"><span>Cancel</span></button>
										<button class="btn btn-default rex-primary-btn-effect" type="submit" name="cn_send" role="button">Send</button>
									</div>
							</form>
                       </div> 
                                      
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    <!--touch_section end -->
    <!--Contact_section start -->
    <div class="contact_main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="touch_text">Contact Us</h1>
                </div>
            </div>
        </div>
        <?php 
            $about_page = get_field("about_info");
           
        ?>
        <div class="contact_section_2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="map_icon">
                            <i class="fa fa-map-marker place_icon" aria-hidden="true"></i>
                            <p class="email-text"><a href="#"><?php echo $about_page['about_address']?></a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="map_icon">
                        <i class="fa fa-phone place_icon" aria-hidden="true"></i>
                            <p class="email-text"><a href="#"><?php echo $about_page['about_phone']?></a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="map_icon">
                            <i class="fa fa-envelope place_icon" aria-hidden="true"></i>
                            <p class="email-text"><a href="#"><?php echo $about_page['about_email']?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<section >
          
          <footer>
              <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <p>&copy; Copyright <span class="update-year"></span> CodeRex</p>
                  </div>
              </div>
              </div>
          </footer>
   
</section>            

<?php wp_footer() ?>
</body>
</html>