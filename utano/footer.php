    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright"><?php if(get_option( 'copy' )) { echo get_option( 'copy' ); } else { ?>Copyright &copy; <?php bloginfo ( 'name' ); echo " " . date('Y'); } ?></span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <?php if(get_option( 'twitter' )) { ?><li class="list-inline-item">
                <a href="<?php echo get_option( 'twitter' ); ?>">
                  <i class="fa fa-twitter"></i>
                </a>
              </li><?php } ?>
              <?php if(get_option( 'facebook' )) { ?><li class="list-inline-item">
                <a href="<?php echo get_option( 'facebook' ); ?>">
                  <i class="fa fa-facebook"></i>
                </a>
              </li><?php } ?>
              <?php if(get_option( 'linkedin' )) { ?><li class="list-inline-item">
                <a href="<?php echo get_option( 'linkedin' ); ?>">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li><?php } ?>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a class="privacy" <?php if(get_option( 'privacy' )) {?> target="_blank" href="<?php echo get_option( 'privacy' );?>" <?php } else { ?> data-toggle="modal" href="#PrivacyPolicy" <?php } ?> >Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a class="terms" <?php if(get_option( 'terms' )) {?> target="_blank" href="<?php echo get_option( 'terms' );?>" <?php } else { ?> data-toggle="modal" href="#TermsOfUse" <?php } ?> >Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>




<?php wp_footer(); ?>

</body>
</html>
