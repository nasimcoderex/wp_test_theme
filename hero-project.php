<?php 
/*
 * Description: banner section for project
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
                            <h1><span>Projects</span></h1>
                </div>
            </div>
</div>
</header>