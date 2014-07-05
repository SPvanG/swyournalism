 <div class="project-info-wrapper">
                <div class="project-info">
                      <h3><?php echo $project_currency_sign; echo number_format(round((int)$funded_amount), 0, '.', ','); ?> <br>
                    <span><?php _e("raised of", 'funding'); ?>  <?php echo $project_currency_sign; print number_format(round((int)$target), 0, '.', ',');?></span></h3>
                  <h3>
                        <?php

                    if(!$project_expired) : ?>
                        <strong><?php print F_Controller::timesince(time(), strtotime($project_settings['date']), 1, ''); ?></strong>
                        <span><?php _e('days to go', 'funding') ?></span>

                    <?php endif; ?>
                  </h3>
                   <div class="progress progress-striped active bar-green"><div style="width: <?php printf(__('%u%', 'funding'), round($funded_amount/$target*100), $project_currency_sign, round($target)) ?>%" class="bar"></div></div>
                  <div class="funding-info"><?php _e("This project will only be funded if at least ", 'funding'); ?> <?php print $project_currency_sign.round($target);?> <?php _e("is raised by", 'funding'); ?> <?php print $project_settings['date']; ?></div>
                    <?php if(!$project_expired) : ?>
                   <div class="funding-minimum">
                        <h3><a class="edit-button button-small button-green" href="<?php print add_query_arg('step', 1) ?>"><?php _e('Fund This Project', 'funding') ?></a></h3>
                        <?php if($funding_minimum == ""){ ?>
                        <?php }else{ ?>
                        <small><?php printf(__("%s minimum", 'funding'),$project_currency_sign.$funding_minimum) ?></small>
                        <?php } ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class="clear"></div>
              </div>
              <!-- project-info-wrapper -->

              <div class="author"> <?php echo get_avatar( get_the_author_meta('ID'), 250 ); ?>
                <div class="author-info"> <?php _e("Project sponsor", 'funding'); ?> <br>
                  <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php  if ( get_the_author_meta('first_name', get_the_author_meta( 'ID' )) ) {echo get_the_author_meta('first_name',get_the_author_meta( 'ID' )); }?>
                      <?php  if ( get_the_author_meta('last_name', get_the_author_meta( 'ID' )) ) {echo get_the_author_meta('last_name',get_the_author_meta( 'ID' )); }?></a>
                  <p><?php echo usercountry_name_display(get_the_author_meta( 'ID' ));  ?></p>
                </div>
                <div class="clear"></div>
              </div>
              <!-- author -->
               <ul class="perks-wrapper">
                <?php foreach($rewards as $reward) : ?>
                    <?php
                        $reward_funding_amount = get_post_meta($reward->ID, 'funding_amount', true);
                        $reward_available = get_post_meta($reward->ID, 'available', true);
                        $funders2 = get_posts(array(
                            'numberposts'     => -1,
                            'post_type' => 'funder',
                            'post_parent' => $reward->ID,
                            'post_status' => 'publish'
                        ));
                    ?>
                    <li class="perk">
                        <?php if(!$project_expired && (empty($reward_available) || count($funders2) < $reward_available)) : ?>
                            <?php $url = add_query_arg(array('step' => 1, 'chosen_reward' => $reward->ID, 'amount' => $reward_funding_amount)); ?>
                           <h4><?php print $reward->post_title ?>   <span>  <?php if(!empty($reward_available)) : ?>
                            <div class="available">(<?php printf(__('%d of %d available', 'funding'), $reward_available - count($funders2), $reward_available) ?>)</div>
                        <?php endif; ?></span></h4>
                          <p><?php print $reward->post_content ?></p>
                            <a href="<?php print $url ?>"><div class="min-amount"> <input type="button" value="<?php printf('Fund %s%s or more', $project_currency_sign, number_format(round((int)$reward_funding_amount), 0, '.', ','));?>" class="button-green button-medium button-contribute "></div></a>

                        <?php else : ?>
                            <h4><?php print $reward->post_title ?></h4>
                             <p><?php print $reward->post_content ?></p>


                        <?php endif; ?>

                    </li>
                <?php endforeach ?>
            </ul>
