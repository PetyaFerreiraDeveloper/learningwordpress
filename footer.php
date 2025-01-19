    <footer class="site-footer">
        <?php 
        $args = array(
            "theme_location" => "footer"
        )
        ?>

        <nav class="site-nav"> <?php wp_nav_menu($args); ?></nav>
        <p>
            <span>
                <?php bloginfo('name'); ?>
            </span>
            <span>&copy;</span>
            <span><?php echo date('Y'); ?></span>
        </p>
    </footer>

    </div> <!-- /container -->
    <?php wp_footer(); ?>
    </body>

    </html>