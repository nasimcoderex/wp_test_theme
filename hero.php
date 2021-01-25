<?php 
/*
 * Description: General banner section
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>
<?php $featured_img = get_the_post_thumbnail_url( null, "large" )?>

<div class="hero">
		<div class="hero-inner">
	    <a href="" class="hero-logo"><img src="<?php echo $featured_img?>" alt="Logo Image"></a>
			<div class="hero-copy">
				<?php if( get_field('title') ): ?>
						<h1><span><?php the_field('title');?></span></h1>
				<?php endif; ?>

				<?php if( get_field('sub_title') ): ?>
						<h6><?php the_field('sub_title');?></h6>
				<?php endif; ?>


				<!-- <div class="media-link">
					<a href="#"><i class="fa fa-twitter-square"></i></a>
					<a href="#"><i class="fa fa-facebook-square"></i></a>
					<a href="#"><i class="fa fa-linkedin-square"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-google-plus-square"></i></a>
				</div> -->
			</div>
        </div>
</div>
</header>