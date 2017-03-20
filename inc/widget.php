<?php 
/**
 * ultimos_post Class
 */
class ultimos_post extends WP_Widget {
    /** constructor */
    function ultimos_post() {
        parent::WP_Widget(false, $name = 'Últimos Posts');  
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {     
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
              <?php 
                $query = array(
                    'posts_per_page'   => 5,
                    'post_type'        => 'post',
                    'order'            => 'DESC',
                    'orderby'          => 'date',
                    'cat'              => 4
                );
                $blog = new WP_Query($query);
                if($blog->have_posts())
                {
                    while($blog->have_posts()):$blog->the_post(); ?>

                        <div class="row widget_post">

                            <a href="<?php echo the_permalink(); ?> ">
                                <div class="small-6 medium-4 columns">
                                    <?php  the_post_thumbnail('img_index'); ?>
                                </div>
                                
                                <div class="small-6 medium-8 columns">
                                    <?php echo '<h3>'.get_the_title().'</h3>' ?>
                                    <?php 
                                        // $excerpt = substr(get_the_content(),0,30);
                                        // echo '<p>'.$excerpt.' ...</p>';
                                    ?>
                                </div>
                            </a>

                        </div>
                    <?php
                    endwhile;wp_reset_postdata();
                }
              ?>
                 
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {              
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // clase ultimos_post
// registrar el widget ultimos_post
add_action('widgets_init', create_function('', 'return register_widget("ultimos_post");'));