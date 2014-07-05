<?php

/**
 * This is the default template for rendering a single project page
 */

?>
<?php get_header(); the_post(); global $post; ?>


<div class="row page-title">
  <div class="container">
    <h1><?php echo get_the_title(); ?> <a>by <?php the_author_posts_link();?> </a></h1>
    <div class="breadcrumbs"><?php the_breadcrumb(); ?></div>
  </div>
</div>

<div class="container page">
  <div class="row">
      <?php if(!empty($_GET['thanks'])) : ?>
            <div class="cf-thanks">
               <div class="alert alert-success">
                    <?php _e('Thanks for committing to fund our project. We appreciate your support.', 'crowdfunding') ?>
                    <?php printf(__("We'll contact you when we reach our target of %s%s.", 'crowdfunding'), $project_currency_sign, round($project_settings['target'])) ?>
                </div>
            </div>
        <?php endif; ?>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
          <?php  global $f_currency_signs;
            $project_settings = (array) get_post_meta($post -> ID, 'settings', true);
            $project_expired = strtotime($project_settings['date']) < time();
            $project_currency_sign = $f_currency_signs[$project_settings['currency']];
            $target = $project_settings['target']; ?>
                <?php if($funded_amount == $target or $funded_amount > $target){ ?>
                  <div class="alert alert-success">
                    <strong><?php _e('Yay! This project has been successfully funded!', 'funding') ?></strong>
                 </div>
                <?php }elseif(isset($project_expired) && $project_expired == 1){ ?>

                  <div class="alert alert-error">
                      <strong><?php _e("Unfortunately this project hasn't been funded on time!", 'funding') ?></strong>
                  </div>

                <?php }?>
      <ul class="nav nav-tabs">
        <li class="active"><a class="button-small button-green" data-toggle="tab" href="#tab1">Home</a></li>
        <?php if( get_post_meta($post->ID, 'update', true) != ""){ ?>
        <li><a class="button-small button-green" data-toggle="tab" href="#tab2">Updates</a></li>
        <?php } ?>
        <li><a class="button-small button-green" data-toggle="tab" href="#tab3">Backers</a></li>
        <li><a class="button-small button-green" data-toggle="tab" href="#tab4">Comments</a></li>

      </ul>
      <div class="tab-content">
        <div id="tab1" class="tab-pane active">
          <div class="row">
            <div class="span8">
               <?php if(get_post_meta($post->ID, '_smartmeta_my-awesome-field', true) == ""){ ?>
            <?php if(!has_post_thumbnail()){ ?>
                 <div class="project-thumb-wrapper-big"><img src="<?php echo get_template_directory_uri().'/img/default-image-big.jpg'?>" /></div>
            <?php }else{ ?>
                <div class="project-thumb-wrapper-big"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full');  ?></a></div>
            <?php } ?>
               <?php }else{ echo get_post_meta($post->ID, '_smartmeta_my-awesome-field', true);} ?>
              <div class="project-social"> <span class='st_sharethis_hcount' displayText='ShareThis'></span> <span class='st_facebook_hcount' displayText='Facebook'></span> <span class='st_twitter_hcount' displayText='Tweet'></span> <span class='st_email_hcount' displayText='Email'></span> </div>
              <div class="project-content">
                  <?php the_content(); ?>
              </div>
              <!-- project-content -->
            </div>
            <!-- /.span8 -->
             <?php
                global $post;
                global $f_currency_signs;
                $project_settings = (array) get_post_meta($post->ID, 'settings', true);
                $project_expired = strtotime($project_settings['date']) < time();
                $project_currency_sign = $f_currency_signs[$project_settings['currency']];
                $target= $project_settings['target'];
                if(!empty($rewards)){
                $keys = array_keys($rewards);
                $lowest_reward = $keys[0];
                $funding_minimum = get_post_meta($lowest_reward, 'funding_amount', true);}else{
                $lowest_reward = 0;
                $funding_minimum = get_post_meta($lowest_reward, 'funding_amount', true);}

                $rewards = get_children(array(
                'post_parent' => $post->ID,
                'post_type' => 'reward',

                'order' => 'ASC',
                'orderby' => 'meta_value_num',
                'meta_key' => 'funding_amount',
            ));

            $funders = array();
            $funded_amount = 0;
            $chosen_reward = null;

            foreach($rewards as $this_reward){
                $these_funders = get_children(array(
                    'post_parent' => $this_reward->ID,
                    'post_type' => 'funder',
                    'post_status' => 'publish'
                ));
                foreach($these_funders as $this_funder){
                    $funding_amount = get_post_meta($this_funder->ID, 'funding_amount', true);
                    $funders[] = $this_funder;
                    $funded_amount += $funding_amount;
                }

            }?>
            <div class="span4">
                <?php include('side.php'); ?>
            </div>
            <!-- /.span4 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- project info tab end -->
        <?php if( get_post_meta($post->ID, 'update', false) != ""){ ?>
        <div id="tab2" class="tab-pane">
          <div class="row">
            <div class="span8">
             <p><?php _e("Last update: ", 'funding'); ?> <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></p>
             <?php $updates = get_post_meta($post->ID, 'update', false);
               foreach ( $updates as $update ) { ?>
              <div class="project-update">
                <div class="project-update-info">
                  <div class="project-update-avatar">   <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('ID'), 250 ); ?></a> </div>
                  <h4><?php the_author_posts_link();?> on <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a> </h4>
                  <div class="clear"></div>
                </div>
                <p><?php echo $update; ?></p>
              </div>
              <!-- project-update -->
             <?php } ?>
            </div>
            <!-- /.span8 -->

           <div class="span4">
                <?php include('side.php'); ?>
            </div>
            <!-- /.span4 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- update tab end -->
        <?php } ?>
        <div id="tab3" class="tab-pane">
          <div class="row">
            <div class="span8">
                <div id="project-funders">
                    <?php foreach($funders as $funder) : ?>
                        <?php
                            $funder_info = get_post_meta($funder->ID, 'funder', true);
                            $amount = get_post_meta($funder->ID, 'funding_amount', true);
                            $reward = get_post($funder->post_parent);
                            $charged = get_post_meta($funder->ID, 'charged', true);
                        ?>

                        <div class="project-backer row">
                            <div class="span3">
                                <a href="mailto:<?php print $funder_info['email'] ?>" title="<?php printf(__('Email %s', 'funding'), $funder_info['name']) ?>">
                                    <?php print get_avatar($funder_info['email'], 85) ?>
                                </a>
                                 <div class="name"><a href="mailto:<?php print $funder_info['email'] ?>" title="<?php printf(__('Email %s', 'funding'), $funder_info['name']) ?>"><?php print $funder_info['name'] ?></a>

                                 </div>

                                <div class="loader"></div>
                            </div>

                            <div class="span4">
                                <span class="amount"><?php print $project_currency_sign.$amount ?></span> -
                                <span class="reward"><?php print $reward->post_title ?></span>
                            </div>

                            <?php if(!empty($charged)) : ?>
                                <div class="icon charged"></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="clear"></div>
                </div>
             </div>
            <!-- /.span8 -->

         <div class="span4">
                <?php include('side.php'); ?>
            </div>
            <!-- /.span4 -->
          </div>
          <!-- /.row -->

        </div>
        <!-- backer tab end -->

        <div id="tab4" class="tab-pane">
          <div class="row">
            <div class="span8">
              <?php comments_template('/short-comments.php'); ?>
              <?php wp_list_comments('type=comment&callback=custom_comments'); ?>
            </div>
            <!-- /.span8 -->

         <div class="span4">
                <?php include('side.php'); ?>
            </div>
            <!-- /.span4 -->
          </div>
        </div>
        <!-- comments end -->

      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>