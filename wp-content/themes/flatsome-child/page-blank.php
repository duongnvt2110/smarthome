<?php
/*
Template name: Page - Full Width
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div id="content" role="main" class="content-area">
    <?php global $paginateAllow; ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if( '' !== get_post()->post_content ) : ?>
            <?php the_content(); ?>
        <?php else : ?>
            <div class="page-title blog-featured-title no-overflow pb-half">
                <div class="page-title-bg fill">
                    <?php if ( has_post_thumbnail() && get_theme_mod( 'blog_single_featured_image', 1 ) ) { // check if the post has a Post Thumbnail assigned to it. ?>
                    <div class="title-bg fill bg-fill bg-top" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large'); ?>');" data-parallax-fade="true" data-parallax="-2" data-parallax-background data-parallax-container=".page-title"></div>
                    <?php } ?>
                    <div class="title-overlay fill" style="background-color: #efefef;"></div>
                </div>

                <div class="page-title-inner container  flex-row is-large">
                    <div class="flex-col flex-center">
                        <h6 class="entry-category is-xsmall green-text-color">
                            <?php echo get_the_category_list( __( ', ', 'flatsome' ) ) ?>
                        </h6>

                        <?php
                            if ( is_single() ) {
                                echo '<h1 class="entry-title text-left">' . get_the_title() . '</h1>';
                            } else {
                                echo '<h2 class="entry-title text-left"><a href="' . get_the_permalink() . '" rel="bookmark" class="green-text-color">' . get_the_title() . '</a></h2>';
                            }
                        ?>
                        <div>
                            <?php 
                                echo 
                                '<span class="entry-title text-left">
                                    <a href="' . home_url() . '" rel="bookmark" class="plain">' . get_the_title( get_option('page_on_front') ) . '</a> /
                                    <a href="' . get_the_permalink() . '" rel="bookmark" class="green-text-color">' . get_the_title() . '</a>
                                </span>'; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-center blog-custom">
                <div class="large-10 col">
                    <div class="row">
                        <div class="col medium-12 small-12 large-8 page-notfull-width">
                            <?php
                                global $post;
                                $paginateAllow = true;
                                $post_slug = $post->post_name; 
                                $categiores = get_categories([
                                    "hide_empty" => 0,
                                    "type"      => "post",      
                                    'slug' =>  $post_slug
                                ]);
                                $cat_id = $categiores[0]->cat_ID; 
                                
                            ?>
                            <div class="pt-half page-notfull-width">
                                <?php echo do_shortcode('[blog_posts style="vertical" type="row" columns="1" columns__md="1" depth="1" depth_hover="2" cat="'.$cat_id.'" posts="10" 
                                show_date="text" show_category="label" image_width="40" class="no-margin-lr" ] ') ?>
                            </div>

                        </div>
                        <div class="col medium-12 small-12 large-4 page-notfull-width pt-half">
                                <?php 
                                $paginateAllow = false;
                                echo do_shortcode('
                                [tabgroup]
                                    <br>
                                    [tab title="Tin tức"] 
                                        [blog_posts style="vertical" type="row" columns="1" columns__md="1" depth="1" depth_hover="2" cat="21" posts="12" offset="0" 
                                            excerpt="false"  show_date="text" show_category="label" image_width="40" ] 

                                        <div class="text-center">
                                            <a class="button is-link lowercase" title="Sự kiện" href="/tin-tuc">
                                                <span>Xem thêm</span>
                                                <i class="icon-angle-right"></i>
                                            </a>
                                        </div>
                                    [/tab]
                                    <br>
                                    [tab title="Công trình tiêu biểu"] 
                                        [blog_posts style="vertical" type="row" columns="1" columns__md="1" depth="2" depth_hover="2" cat="24" posts="12" offset="0" 
                                            excerpt="false"  show_date="text" show_category="label" image_width="40" ] 
                                            
                                        <div class="text-center">
                                            <a class="button is-link lowercase" title="Sự kiện" href="/cong-trinh-tieu-bieu">
                                                <span>Xem thêm</span>
                                                <i class="icon-angle-right"></i>
                                            </a>
                                        </div>
                                    [/tab]
                                    <br>
                                    [tab title="Khuyếm mại"] 
                                        [blog_posts style="vertical" type="row" columns="1" columns__md="1" depth="2" depth_hover="2" cat="25" posts="12" offset="0" 
                                            excerpt="false"  show_date="text" show_category="label" image_width="40" ] 
                                        <div class="text-center">
                                            <a class="button is-link lowercase" title="Sự kiện" href="/chuong-trinh-khuyen-mai">
                                                <span>Xem thêm</span>
                                                <i class="icon-angle-right"></i>
                                            </a>
                                        </div>
                                    [/tab]
                                    <br>
                                [/tabgroup]');
                                ?>
                            
                        </div>
                    </div>
                </div>
            <div>
        <?php endif; ?>
    <?php endwhile; // end of the loop. ?>	
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
