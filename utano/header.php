<!DOCTYPE html>
<html <?php language_attributes(); ?>>


  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<style>
   header {
    background-image: url( <?php header_image(); ?> );
   }
  </style>


    <!-- Custom fonts for this template -->
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <?php wp_head(); ?>

  </head>

  <body id="page-top" <?php body_class(); ?> >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
       
		<?php if(!has_custom_logo()) { ?>
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><?php bloginfo('name'); ?></a>
	<?php	} else {
		echo the_custom_logo();
		} ?>
				
		
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
		
		<?php 

			wp_nav_menu( array (
					'menu' => 'menu-1',
				    'container' => 'ul',
					'container_class' => 'navbar-nav text-uppercase ml-auto nav-link js-scroll-trigger nav-item',
					'container_id' => '',
					'menu_class' => 'navbar-nav text-uppercase ml-auto nav-link js-scroll-trigger nav-item',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'item_spacing' => 'preserve',
					'depth' => 0,
					'walker' => '',
					'theme_location' => 'Primary' 
			
			));
		
		?>
	
		<!--<ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>-->

          
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in"><font color="<?php header_textcolor(); ?>"><?php bloginfo('description'); ?></font></div>
          <div class="intro-heading text-uppercase"><font color="<?php header_textcolor(); ?>"><?php bloginfo('name'); ?></font></div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" id="btn-head" href="#about">Read More</a>
        </div>
      </div>
    </header>


