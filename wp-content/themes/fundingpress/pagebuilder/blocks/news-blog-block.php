<?php/** A simple text block **/class News_Blog_Style_Block extends Block {    //set and create block    function __construct() {        $block_options = array(            'name' => __('News Block - Blog Style', 'funding'),            'size' => 'span3',        );        //create the block        parent::__construct('News_Blog_Style_Block', $block_options);    }    function form($instance) {        $defaults = array(            'title' => '',            'newscats' => '',            'projnumber'=> ''        );        $instance = wp_parse_args($instance, $defaults);        extract($instance);        ?>        <p class="description">            <label for="<?php echo $this->get_field_id('newscats') ?>">                <?php _e("Enter posts categories you want to exclude(comma separated) - Leave blank to show all. Ex: 47,32", 'funding'); ?>                <?php echo field_input('newscats', $block_id, $newscats, $size = 'full') ?>            </label>        </p>           <p class="description">            <label for="<?php echo $this->get_field_id('projnumber') ?>">            <?php _e("Number of posts to show", 'funding'); ?>                <?php echo field_input('projnumber', $block_id, $projnumber, $size = 'full') ?>            </label>        </p>        <?php    }    function pbblock($instance) {        extract($instance);       ?>	<div class="container blog">  <div class="row">    <div class="span8">        <?php        $myArray = explode(',',  $newscats);        foreach ($myArray as &$value)$value *= (-1);        $value = implode(',',  $myArray);        $category_id = $value;        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;        $new_query = new WP_Query();        $new_query->query( 'showposts='.$projnumber.'&cat='.$category_id.'&paged='.$paged );       ?>        <?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>    <div class="blog-list">            <?php if ( has_post_thumbnail() ) { ?>              <div class="blog-pdate green-bg"><?php the_time('M'); ?><br /><?php the_time('d'); ?></div>              <div class="blog-thumb-wrapper"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('category-thumb');  ?></a></div>              <?php }else{?>              <div class="blog-pdate-noimg green-bg"><?php the_time('M'); ?><br /><?php the_time('d'); ?></div>              <?php } ?>            <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>            <p> <?php the_excerpt(); ?></p>            <div class="clear"></div>            <div class="blog-pinfo-wrapper">                <div class="post-pinfo"><?php _e("By ", 'funding'); ?><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" rel="tooltip" data-original-title="<?php _e("View all posts by ", 'funding'); ?><?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></a> | <a rel="tooltip" title="<?php comments_number( 'No comments', 'One comment', '% comments' ); ?> in this post" href="<?php echo the_permalink(); ?>#comments"> <?php comments_number( 'No comments', 'One comment', '% comments' ); ?></a></div>                <a class="button-green button-small" href="<?php the_permalink(); ?>">Read more</a>                <div class="clear"></div>            </div>        </div>        <!-- /.blog-post -->        <?php endwhile; endif; ?>            <ul id="pager">              <li>                <?php            $additional_loop = new WP_Query('showposts='.$projnumber.'&cat='.$category_id.'&paged='.$paged);            $page=$additional_loop->max_num_pages;            echo kriesi_pagination($additional_loop->max_num_pages);            ?>            <?php wp_reset_query(); ?>              </li>            </ul>        <div class="clear"></div>    </div>    <!-- /.span8 -->    <div class="span4 ">            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer widgets') ) : ?>                <?php dynamic_sidebar('two'); ?>           <?php endif; ?>    </div>    <!-- /.span4 -->  </div>  <!-- /.row --></div><!-- /.container --><?php}}?>