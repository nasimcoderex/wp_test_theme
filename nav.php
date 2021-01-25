


<?php 
/* 
 * Description: For showing navbar information 
 * @package WordPress
 * @subpackage test
 * @since test 1.0.0
*/ 
?>
<!-- Add your site or application content here -->

  <header class="header-two">
  <!-- nav section -->
  <div class="main-menu nav-tow">
  <div id="rex-sticky">
      <div class="container">
          <div class="row">
              <div class="col-md-12 menu-section">
                  <div class="navigation" role="banner">
                      <div class="navigation-wrapper">
                       
                                      <nav>
                                            <ul  id="navigation-menu" data-breakpoint="992" class="flexnav one-page">
                                                          <?php 
                                                              wp_nav_menu(
                                                                  array(
                                                                      'theme_location' => 'top-menu',
                                                                      'menu_id' => 'top-menu',
                                                                      'menu_class' => 'list-inline text-center',
                                                                  )
                                                              );
                                                          ?>
                                            </ul>
                                      </nav>

                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
</div>