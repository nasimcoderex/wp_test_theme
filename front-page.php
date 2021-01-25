
<?php 
/* Template Name: Home 
 * Description: Front page
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 

?>
<?php get_header()?>
<body <?php body_class() ?> class="single">
<?php get_template_part( "nav" ) ?>
<?php get_template_part( "hero" ) ?>
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about">
						<div id="about">
	<div class="active-section">
		<br>
		<br>
		<div class="about-section">
			<div class="row">
				<div class="col-md-6">
					<?php if( get_field('omb_about') ): ?>
						<h4><?php the_field('omb_about'); ?></h4>
					<?php endif; ?>
					
					<div class="about-content">
						<!-- <span class="active-color">Hello, I am Jordan Doe, Photographer, Web Designer, Speaker and Writer</span>
						<p>Aenean nonummy hendrerit mauris. Donec sit Phasellus portFusce suscipit varius mium 
						sociis natoque penatibus et magnis dis parturent montes, nascetur ridiculus mus. Nulla
						dui.Fusce feugiat malesuada odiMorbi nunc odio, gravida at, cursus nec, luctus.</p>
						<span class="border-dashed"></span> -->
						<?php if( get_field('about_description') ): ?>
							<p><?php the_field('about_description'); ?></p>
						<?php endif; ?>
						<img src="img/signature.png" alt="">
					</div>
				</div>

				<?php 
					if(have_rows('basic_info')){
						
					}
				
				?>
				<div class="col-md-5 col-md-offset-1">
					<h4>Basic Information</h4>
					<ul class="list-group">

					<?php 
						$info = get_field('basic_info');
						$loc = get_field('omb_location');
						
						if( $info ){ 

				       
							$address = $info['address'];
							$dob = $info['date_of_birth'];
							$pob = $info['place_of_birth'];
							$language = $info['language'];
							$gender = $info['gender'];
					
						}
					?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Address:</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $address ?></p>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Country:</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $loc ?></p>
								</div>
							</div>
						</li>


						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Date of Birth:</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $dob ?></p>
								</div>
							</div>
						</li>


						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Place of Birth:</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $pob ?></p>
								</div>
							</div>
						</li>


						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Language</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $language ?> </p>
								</div>
							</div>
						</li>


						<li class="list-group-item">
							<div class="row">
								<div class="col-md-4">
									<h6>Gender</h6>
								</div>
								<div class="col-md-8">
									<p><?php echo $gender ?></p>
								</div>
							</div>
						</li>


					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
					</div>

					<br>
					<br>
					<!-- skill-section -->
							<div id="skills" class="active-section">
	<div class="section-block skill-section">
		<div class="row">
			<div class="col-md-6">
				<div class="skill-content">
					<h4 class="title">Skills</h4>

					
                    <?php 
						if( have_rows('skill') ):
							while ( have_rows('skill') ) : the_row();?>
								<h6><?php the_sub_field('skill_title');?> (<?php the_sub_field('skill_percentage');?> %)</h6>
								
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php the_sub_field('skill_percentage');?>%">
									<span class="sr-only"></span>
									</div>
								</div>
								
							<?php	
							endwhile;
						endif;
					?>
				</div>
			</div>
			<div class="col-md-6">
				
				<?php 
					$image = get_field('skill_image');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="height:490px"/>
				<?php endif; ?>
			</div>
		</div>
	</div>
	</div>
					<br>
					<br>

					<!-- experience-section -->
						<div id="experience" class="active-section">
	<div class="section-block experience">
		<h4 class="title">Work Experience</h4>
		<div class="row">
			<div id="rex-experience-slider">

			<?php 
			if(have_rows('work_experience')){ 
				while ( have_rows('work_experience') ) : the_row();?>
				
				<div class="listing-content">
					<div class="col-md-2 list-img">

						<div class="experience-date">
							<h6><?php the_sub_field('date_from');?> - <br><?php if( the_sub_field('date_to') == ""){ 
							echo "Present";
							}else{ the_sub_field('date_to');	 }
							?>
							</h6>
						</div>
						<span class="angle"></span>
					</div>
					<div class="col-md-10 list-description">
						<h6><?php the_sub_field('title') ?> <span>/ <?php the_sub_field('company_name') ?></span></h6>
						<p><?php the_sub_field('description') ?></p>
					</div>
				</div>
				
			<?php endwhile; } ?>
			</div>
		</div>
	</div>
</div>	

					<br>
					<br>

					<!-- education-section -->
					<div id="education" class="active-section">
						<div class="section-block education">
							<h4 class="title">Education</h4>
							<div class="row">
								<div id="rex-education-slider">

								<?php 
								if( have_rows('education') ){
									while ( have_rows('education') ) { the_row();?>
									

									<div class="listing-content">
										<div class="col-md-2 list-img">
											<?php $image = get_sub_field('image'); if(!empty( $image )){ 
												?>
											    <img src="<?php echo $image['url']; ?>" style="height:100%" alt=" ">
												
											<?php  }else{ ?>
												<img src="http://placehold.it/145x135" alt="">
											<?php } ?> 
										</div>
										<div class="col-md-10 list-description">
											<h6><?php the_sub_field('degree'); ?></h6>
											<span><?php the_sub_field('institute') ?></span><br>
											<span>Faculty of <?php the_sub_field('faculty'); ?>, <?php the_sub_field('year_from'); ?> - <?php if(the_sub_field('year_to') ) { the_sub_field('year_to'); }?></span>
											<p><?php the_sub_field('description') ?></p>
										</div>
									</div>
								<?php } } ?>
								
								</div>
							</div>
						</div>
					</div>

					<br>
					<br>
					
					<!-- Work-section -->
						<div class="active-section" id="work">
	<div class="portfolio-section box-border rex-works-showcase">
	      <div class="row rex-portfolio-showcase">
	          <h4 class="title">Work</h4>
	        
			  <?php
					$wr = get_field('work');				
				?>
	          <figure class="row rex-featured-portfolio" role="tabpanel" id="portfolio-intro">
					<div class="rex-featured">
						<div class="col-md-12">
							<div class="display-flax featured-box">
								<div class="col-md-6">
									<img class="img-responsive" src="<?php echo $wr[0]['image']['url']?>" alt="">
								</div>
								<div class="col-md-6">
									<div class="rex-featured-description">
										<h6><?php echo $wr[0]['name'];?></h6>
									
										<p><?php echo $wr[0]['description'];?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
	          </figure>
			
	       
	          <div class="row rex-portfolios" role="tabpanel" id="rex-portfolios">
	         <?php if(have_rows('work')){ 
				
				 ?>
			    
				<?php while( have_rows('work') ){
					
					the_row();?>
	            <figure class="identity col-lg-4 col-sm-6 rex-portfolio-item">
					<div class="work-img">
						<?php $image = get_sub_field('image'); if(!empty( $image )){ 
												?>
						<img src="<?php echo $image['url']; ?>" alt="" class="img-thumbnail">
						<?php }else{
							?>
							<img src="http://placehold.it/315x242" alt="" class="img-thumbnail">
							<?php 
						} ?>
					</div>
					<figcaption class="rex-featured-description">
						<div class="rex-portfolios-title">
							<h6><?php the_sub_field('name');?></h6>
							
						</div>
						<p><?php the_sub_field('description');?></p>
					</figcaption>
	            </figure>
            <?php } }?>
			
	            
	          </div>
	      </div>
	</div>
</div>



					<br>
					<br>
					<div class="active-section" id="blog">
	<section class="section-block">
		<h4 class="title">Projects</h4>
		<div class="row">
			<div class="col-md-12">
				<div id="rex-blog-slider">

				<?php 
					 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					 $the_query = new WP_Query( array( 'paged' => $paged, 'post_type' => 'projects', 'posts_per_page' => 3 ) ); 
					while ($the_query -> have_posts()) : $the_query -> the_post();?>
                       
                    
					<div class="col-sm-6 col-md-4" <?php post_class() ?>>
						<div class="thumbnail rex-blog-section">
                            <?php 
                                if(has_post_thumbnail( )){
                                    $thub = get_the_post_thumbnail_url(null,"large");
                                    ?>
                                    <a href="<?php the_permalink()?>"><img src="<?php echo $thub?>" alt="<?php the_title()?>"></a>
                                    <?php
								}
								$content = get_the_content();

								
                            ?>
							<?php 
                                     $meta_box_value = get_post_meta( get_the_ID()); 
                                     $project_description = $meta_box_value['project_description'][0];
                             
                                    $description_excerpt = substr($project_description, 0, 150);
                            ?>
							
							<div class="rex-caption">
								<a href="<?php the_permalink()?>"><h6><?php the_title()?> </h6></a>
								<p><?php echo $description_excerpt; ?></p>
								<a href="<?php the_permalink()?>" class="front_read_more">Read more</a>
							</div>
							
						</div>
                    </div>
                    
                    <?php 
                	endwhile;
                    ?>
					
				</div>
            </div>
            <div class="col-md-12 mx-auto text-center">
                <a href="/page-projects" class="btn btn-info">View more</a>
            </div>
		</div>
	</section>
</div>
					<br>
					<br>
					
<div class="active-section" id="blog">
	<section class="section-block">
		<h4 class="title">Blog Post</h4>
		<div class="row">
			<div class="col-md-12">
				<div id="rex-blog-slider">

				<?php 
					 $the_query = new WP_Query( 'posts_per_page=3' ); 
					while ($the_query -> have_posts()) : $the_query -> the_post();?>
                       
                    
					<div class="col-sm-6 col-md-4" <?php post_class() ?>>
						<div class="thumbnail rex-blog-section">
                            <?php 
                                if(has_post_thumbnail( )){
                                    $thub = get_the_post_thumbnail_url(null,"large");
                                    ?>
                                    <a href="<?php the_permalink()?>"><img src="<?php echo $thub?>" alt="<?php the_title()?>"></a>
                                    <?php
								}
								$content = get_the_content();

								
                            ?>
							
							<div class="rex-caption">
								<a href="<?php the_permalink()?>"><h6><?php the_title()?> </h6></a>
								<p><?php echo substr($content, 0, 100); ?></p>
								<a href="<?php the_permalink()?>"  class="front_read_more">Read more</a>
							</div>
							
						</div>
                    </div>
                    
                    <?php 
                	endwhile;
                    ?>
					
				</div>
            </div>
            <div class="col-md-12 mx-auto text-center">
                <a href="/blog" class="btn btn-info">View more</a>
            </div>
		</div>
	</section>
</div>

					<br>
					<br>

					<!-- Reference-section -->
					<div class="active-section" id="contact">
					<section class="section-block">
						<h4 class="title">Contact Information</h4>
						<div class="row">
							<div class="col-md-6">
							<?php 
								$contact_info = get_field('about_info');
								if( $contact_info ){ 

				                    
									$address = $contact_info['about_address'];
									$email = $contact_info['about_email'];
									$phone = $contact_info['about_phone'];
									
								var_dump($contact_info);
							    
								}?>
								<div class="address ">
									<ul class="list-group">
										<li class="list-group-item">
											<h6>Address</h6>
											<p>Mohonpur Road, Shaymoli , Dhaka</p>
										</li>
										<li class="list-group-item">
											<h6>Phone</h6>
											<p>01761823565</p>
										</li>
										<li class="list-group-item">
											<h6>Email</h6>
											<p>asmnasim@hotmail.com</p>
										</li>
									</ul>
								</div>
								
							</div>
							<div class="col-md-6">
								<div>
									<h4 class="title">Feel Free To Contact Me</h4>
									<form class="contact-forms" action="" method="post">
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
						<br>
						<br>
						
					</section>
					</div>
<?php 
		global $wpdb;
		if(isset($_POST['cn_send'])){
			
			if( isset($_POST['cn_name']) && isset($_POST['cn_phone']) && isset($_POST['cn_email']) && isset($_POST['cn_message']) ){

				$name = $_POST['cn_name'];
				$email = $_POST['cn_email'];
				$phone = $_POST['cn_phone'];
				$message = $_POST['cn_message'];

				// echo $name." ".$email;
				
				$sql = $wpdb->insert("wp_contact",array("name"=>$name,"email"=>$email,"phone"=>$phone,"message"=>$message));
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
	
    <?php wp_footer() ?>
  </body>
</html>

