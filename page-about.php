<?php /* Template Name: About */ ?>

<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero" ) ?>
<div class="about_main">
    <div class="services_main">
    	<div class="container">
    		<div class="creative_taital">
                <?php 
                $about_title = get_field('about_section_title');
                $about_description = get_field('about_description');
                if($about_title):
                ?>
                <h1 class="creative_text text-center"><?php echo $about_title?></h1>
                <?php 
                endif;
                if($about_title):
                ?>
                <p style="color: #050000;" class="text-justify"><?php echo $about_description; ?></p>
                <?php 
                endif;
                ?>
    			
    		</div>    
    	</div>
    </div>
    </div>

    <!--Contact_section start -->
    <div class="contact_main">
        <div class="container">
            <div class="row contact_us_page" >
                <div class="col-sm-12 text-center">
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
    <!--Contact_section end -->
    <?php wp_footer() ?>
  </body>
</html>