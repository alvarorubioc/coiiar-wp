<div id="socialshare" class="row center-xs">
      
      <div class="col-xs-12 mt-4 mb-1"><p class="text-h4"><?php esc_html_e( 'Compartir', 'coiiar' );?></p></div>

      <ul class="social">
            <li>
                  <a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">    
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#facebook" />
                        </svg>
                  </a>
            </li>
            <li>
                  <a rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?>&via=COIIAR" data-via="COIIAR" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#twitter" />
                        </svg>
                  </a>
            </li>
            <li>
                  <a rel="nofollow" href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#linkedin" />
                        </svg>
                  </a>
            </li>
      </ul>

</div>  