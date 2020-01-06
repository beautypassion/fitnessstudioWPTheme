<?php 
/*Template Name: Front Page*/
get_header(); ?>

<?php the_post(); ?>
<?php the_content(); ?>


  <!-- Advantages -->
    <section id="advantages">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
           
			<?php 
			
			query_posts( 'post_type=posts_titles&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php 
			if(get_post_meta($post -> ID, 'title_id', 1) == 1) { ?>
			<h2 class="section-heading text-uppercase"><?php the_title(); ?></h2>
			<h3 class="section-subheading text-muted"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
          </div>
        </div>
        <div class="row text-center">
		

		
		<?php 
			global $query_string;
			
			
			query_posts( 'post_type=advantages&posts_per_page=-1' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post();
			
			?>
			
			
          <div class="col-md-4">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="<?php echo get_post_meta($post -> ID, 'icon_class', 1); ?> fa-stack-1x fa-inverse"></i>
            </span>
			
            <h4 class="service-heading"><?php the_title(); ?></h4>
            <p class="text-muted"><?php echo get_post_meta($post -> ID, 'adv_desc', 1); ?></p>
          </div>
		  
		  <?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
		  
        </div>
      </div>
    </section>
	
	
	<!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
		
		<div class="col-lg-12 text-center">
           
			<?php 
			
			query_posts( 'post_type=posts_titles&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php 
			if(get_post_meta($post -> ID, 'title_id', 1) == 2) { ?>
			<h2 class="section-heading text-uppercase"><?php the_title(); ?></h2>
			<h3 class="section-subheading text-muted"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
          </div>
		
		<?php 
			
			query_posts( 'post_type=about&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); 
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'full');
			?>
			
          <div class="col-md-6">
		  <div class="about-item">
		  
		 <?php if($image_url[0]) { ?><img class="img-fluid" src="<?php echo $image_url[0] ; ?>" alt="" ><?php } ?>
		  
		 </div>
		 </div>
		 
		 <div class="col-md-6">
		 <div class="about-item">
		  <p><?php echo get_post_meta($post -> ID, 'about', 1); ?></p>
		 </div>
		 </div>
		 <?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
      </div>
	 </div>
    </section> 
		  

    <!-- Classes Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
			<?php 
			
			query_posts( 'post_type=posts_titles&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php 
			if(get_post_meta($post -> ID, 'title_id', 1) == 3) { ?>
			<h2 class="section-heading text-uppercase"><?php the_title(); ?></h2>
			<h3 class="section-subheading text-muted"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			<?php $dumbbell = get_post_meta($post -> ID, 'add_sect_txt', 1); ?>
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
          </div>
        </div>
		<div class="row">
		<?php 
			global $query_string;
			$s = 0;
			query_posts( 'post_type=classes&posts_per_page=9' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post(); $s++;
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, array(250,250));

			?>
		
          <div class="col-md-4 col-sm-6 portfolio-item" id="p-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo $s; ?>">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  
				  <i class="<?php echo $dumbbell; ?> fa-3x"></i>
				  
                </div>
              </div>
			  
			  <?php if($image_url[0]) { ?><img class="img-fluid" src="<?php echo $image_url[0] ; ?>" alt="" width="400px" height="300px" ><?php } else { the_title(); } ?>
			  
            </a>
            <div class="portfolio-caption">
              <h4><?php the_title(); ?></h4>
              <p class="text-muted"><?php echo get_post_meta($post -> ID, 'class_desc', 1); ?></p>
            </div>
          </div>
		
		<?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
		
		</div>
      </div>
    </section>

    <!-- Memberships -->
	
	<?php
	query_posts( 'post_type=posts_titles&posts_per_page=9' );
	if(have_posts()) : while (have_posts()) : the_post();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	?>
	
	<?php if(get_post_meta($post -> ID, 'title_id', 1) == 4) { ?>
	
    <section id="memberships" style="background-image:url(<?php echo $image_url[0] ; ?>)">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
			<h2 class="section-heading text-uppercase"><?php the_title(); ?></h2>
			<h3 class="section-subheading text-muted"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			
          </div>
        </div>
        <div class="row">
		
		<?php 
			global $query_string;
			
			
			query_posts( 'post_type=memberships&posts_per_page=-1' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post();
			
			?>
		
        <div class="col-sm-4">
            <div class="team-member">
            <div class="aboblock">
              <h4><?php the_title(); ?></h4>
              <p class="text-abo"><?php echo get_post_meta($post -> ID, 'memb_short_desc', 1); ?></p>
			  <p><?php echo get_post_meta($post -> ID, 'memb_full_desc', 1); ?></p>
			  <h5><?php echo get_post_meta($post -> ID, 'price', 1); ?></h5>
			  </div>
			   </div>
			    </div>
			  
			  <?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			  
			 </div>
			 
			 
			 <?php
	query_posts( 'post_type=posts_titles&posts_per_page=9' );
	if(have_posts()) : while (have_posts()) : the_post();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	?>
	
			<?php if(get_post_meta($post -> ID, 'title_id', 1) == 4) { ?>
				<div class="col-lg-12 text-center">
				
				<a href="#contact"><h3 id="start"><?php echo get_post_meta($post -> ID, 'add_sect_txt', 1); ?></h3></a>
				
				</div>
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
		
     </div>
    </section>
	<?php
			}
			?>
	<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
			<?php 
			
			query_posts( 'post_type=posts_titles&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php 
			if(get_post_meta($post -> ID, 'title_id', 1) == 5) { ?>
			<h2 class="section-heading text-uppercase"><?php the_title(); ?></h2>
			<h3 class="section-subheading text-muted"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
			
          </div>
        </div>
        <div class="row">
		
		<?php 
			global $query_string;
			
			query_posts( 'post_type=team&posts_per_page=12' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post();
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'full');

			?>
		
          <div class="col-sm-4">
            <div class="team-member">
			  <h4><?php the_title(); ?></h4>
              <p class="text-muted"><?php echo get_post_meta($post -> ID, 'spec', 1); ?></p>
              <?php if($image_url[0]) { ?><img class="img-fluid" src="<?php echo $image_url[0] ; ?>" alt="" width="400px" height="300px" ><?php } else { the_title(); } ?>
			  <p><?php echo get_post_meta($post -> ID, 'about_coach', 1); ?></p>
              <ul class="list-inline social-buttons">
                
				<?php if(get_post_meta($post -> ID, 'linkedin', 1)) { ?>
			  <li class="list-inline-item">
			  <a href="<?php echo get_post_meta($post -> ID, 'linkedin', 1); ?>" target="_blank">
			  <i class="fa fa-linkedin"></i>
			  </a>
			  </li>
			  <?php } ?>
			  
			  <?php if(get_post_meta($post -> ID, 'facebook', 1)) { ?>
			  <li class="list-inline-item">
			  <a href="<?php echo get_post_meta($post -> ID, 'facebook', 1); ?>" target="_blank">
			  <i class="fa fa-facebook"></i>
			  </a>
			  </li>
			  <?php } ?>
			  
			  <?php if(get_post_meta($post -> ID, 'twitter', 1)) { ?>
			  <li class="list-inline-item">
			  <a href="<?php echo get_post_meta($post -> ID, 'twitter', 1); ?>" target="_blank">
			  <i class="fa fa-twitter"></i>
			  </a>
			  </li>
			  <?php } ?>
			  
              </ul>
            </div>
          </div>
		
		  
		  <?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
		  
        </div>
        <div class="row">
		  
		  <?php 
			
			query_posts( 'post_type=posts_titles&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); 
			
			 ?>
			 
			 <?php 
			if(get_post_meta($post -> ID, 'title_id', 1) == 5) { ?>
			
				<div class="col-lg-8 mx-auto text-center">
				
				<p class="large text-muted"><?php echo get_post_meta($post -> ID, 'add_sect_txt', 1); ?></p>
				
				</div>
				
			<?php
			}
			?>
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
        </div>
      </div>
    </section>

    <!-- Clients -->
    <section class="py-5">
      <div class="container">
        <div class="row">
		
		<?php 
			global $query_string;
			
			query_posts( 'post_type=partners&posts_per_page=8' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post();
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'full');

			?>
			
          <div class="col-md-3 col-sm-6">
            <a href="<?php echo get_post_meta($post -> ID, 'link', 1); ?>" target="_blank">
              <?php if($image_url[0]) { ?><img class="img-fluid d-block mx-auto" id="partnerlogo" src="<?php echo $image_url[0] ; ?>" alt="" width="200px" height="50px" ><?php } else { ?> <h3 style="color:#4286f4;text-align:center"> <?php the_title(); ?> </h3> <?php } ?>
            </a>
          </div>
		  
		  <?php 
			endwhile;
			endif;
			wp_reset_query();
			?>
			
        </div>
      </div>
    </section>

    <!-- Contact -->
    <?php
	query_posts( 'post_type=posts_titles&posts_per_page=9' );
	if(have_posts()) : while (have_posts()) : the_post();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	?>
	
	<?php if(get_post_meta($post -> ID, 'title_id', 1) == 6) { ?>
	 <section id="contact" style="background-image:url(<?php echo $image_url[0] ; ?>)">
	 
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
			<h2 class="section-heading text-uppercase" id="contact-form"><?php the_title(); ?></h2>
			<h3 class="section-subheading"><?php echo get_post_meta($post -> ID, 'main_post_desc', 1); ?></h3>
			<div style="text-align:right">
			<h3><?php echo get_post_meta($post -> ID, 'add_sect_txt', 1); ?></h3>
			</div>
			  </div>
			</div>
		  <br/><br/>
        <div class="row">
          <div class="col-lg-12">
		  
            <form id="contactForm" name="sentMessage" action="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/contact_me.php" method="post" novalidate="novalidate">
              <div class="row">
			  
			  <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
			  
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone" >
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
			
   </div>	
	</div>
     </div>
	 
    </section>
		<?php
			}
			?>
	
			<?php
			
			endwhile;
			endif;
			wp_reset_query();
			
			?>
			
	<!-- Portfolio Modals -->

    <!-- Modal 1 -->
	
	<?php $k = 0; while($k < 9) : $k++; ?>  
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $k; ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
			
			<?php 
			global $query_string;
		
			query_posts( 'post_type=classes&posts_per_page=9' . "&order=ASC" );
			if(have_posts()) : while (have_posts()) : the_post();
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, array(250,250));
		
			?>
			
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Class Details Go Here -->
                  
                  <?php if(get_post_meta($post -> ID, 'class_add_inf', 1) && get_post_meta($post -> ID, 'class_id', 1) == $k) { ?> <p> <?php echo get_post_meta($post -> ID, 'class_add_inf', 1); ?></p>
				  
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button> <?php } ?>
                </div>
              </div>
			 
			  <?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
			  
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php endwhile; ?>

    

<!--Privacy Policy-->
<div class="portfolio-modal modal fade" id="PrivacyPolicy" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
			
			<?php 
			
			query_posts( 'post_type=privacy_policy&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
			
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
					<div class="p-p">

				  <h3><?php the_title(); ?></h3>
				  <p><?php echo get_post_meta($post -> ID, 'prv_plc', 1) ?></p>
				  </div>
				  <h6>Last updated: <?php the_date(); ?></h6>
                  <h6>Website owner: <?php bloginfo('name'); ?></h6>
                  <h6>e-mail: <?php echo get_option( 'c_email' ); ?></h6><br/>
               
                  <button class="btn btn-primary comment" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
			
			<?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
			
			</div>
          </div>
        </div>
      </div>
    </div>

<!--Terms of Use-->
<div class="portfolio-modal modal fade" id="TermsOfUse" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
			
			<?php 
			
			query_posts( 'post_type=terms_of_use&posts_per_page=9' );
			if(have_posts()) : while (have_posts()) : the_post(); ?>
			
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
			<div class="p-p">

				  <h3><?php the_title(); ?></h3>
				  <p><?php echo get_post_meta($post -> ID, 'trms_of_use', 1) ?></p>
				</div>
                    <h6>Last updated: <?php the_date(); ?></h6>
                    <h6>Website owner: <?php bloginfo('name'); ?></h6>
                    <h6>e-mail: <?php echo get_option( 'c_email' ); ?></h6><br/>
               
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
			  </div>
			  
			  <?php 
		  
			endwhile;
			endif;
			wp_reset_query();
		
			?>
			  
            </div>
          </div>
        </div>
      </div>
    </div>	
				
	
	<?php get_footer(); ?>
