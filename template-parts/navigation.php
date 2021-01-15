<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white py-3">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
    <div class="pl-4 flex items-center">
        <?php if ( has_custom_logo() ) { ?>
            <a href="<?php echo get_bloginfo( 'url' ); ?>">
                <?php the_custom_logo(); ?>
            </a>
        <?php } else { ?>
            <div class="text-lg uppercase">
                <a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-primary text-lg uppercase">
                    <?php echo get_bloginfo( 'name' ); ?>
                </a>
            </div>

            <p class="text-sm font-light text-gray-600">
                <?php echo get_bloginfo( 'description' ); ?>
            </p>

        <?php } ?>
    </div>
    <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
        </button>
    </div>
    <?php
        wp_nav_menu(
            array(
                'container_id'    => 'primary-menu',
                'container_class' => 'w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20',
                'menu_class'      => 'list-reset lg:flex justify-end flex-1 items-center',
                'theme_location'  => 'primary',
                'li_class'        => 'p-2 mr-3',
                'fallback_cb'     => false,
            )
        );
    ?>
    
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>