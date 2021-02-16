<?php
/* ACF */

if(function_exists('acf_register_block')) {
    add_action('acf/init','feh_custom_blocks');
}
function feh_custom_blocks() {
    if(function_exists('acf_register_block')) {
        acf_register_block (
            array (
                'name' => 'recent_posts',
                'title' => __('Recent Posts'),
                'description' => __('Recent Post Block'),
                'render_callback' => 'feh_recent_posts_callback',
                'category' => 'feh',
                'keywords' => array('feh', 'recent', 'posts')
            )
        );
    }
}

function feh_category($categories, $post) {
    return array_merge (
        $categories, array (
            array(
               'slug' => 'feh',
               'title' => __('FEH Blocks', 'feh'),
            ),
        )
    );
}
add_action('block_categories','feh_category', 10, 2);

function feh_recent_posts_callback($block) {
    $align_class = $block['align'] ? 'align' . $block['align'] : ''; 
    $class_name = isset($block['className']) ? $class_name : ""; ?>

    <section id="recent_posts" class="<?php echo $class_name . ' ' . $align_class ?>">
        <?php
        $heading = get_field('heading');
        $how_many_posts_to_show = get_field('how_many_posts_to_show');
        $include_image = get_field('include_image');
        ?>
        <?php if($heading) {
            echo '<h3>' . $heading . '</h3>';
        } ?>
        <div class="grid grid-cols-1 md:grid-cols-<?php echo $how_many_posts_to_show ?> gap-3">

            <?php 
                $args = array(
                    'post_type' => "post",
                    'posts_per_page' => $how_many_posts_to_show
                );
                $recent_posts = new WP_Query($args);
                while($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <div class="<?php post_class(); ?>">
                        <article class="overflow-hidden rounded-lg shadow-lg">
                            <?php if($include_image) { ?>
                                <?php the_post_thumbnail(); ?>
                            <?php } ?>
                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h4 class="text-primary text-lg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>    
                                <span class="date text-grey-darker text-sm"><?php echo get_the_date(); ?></span>
                            </header>
                            <div class="p-2 md:p-4">
                                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                                <a class="no-underline hover:underline text-pink-600" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                            </article>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); // reset the query ?>
        </div>
    </section>
<?php } ?>