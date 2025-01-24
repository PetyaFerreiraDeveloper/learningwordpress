    <footer class="site-footer">
        <?php
        $args = array(
            "theme_location" => "footer"
        )
        ?>
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer1')): ?>
                <div>
                    <?php dynamic_sidebar('footer1') ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer2')): ?>
                <div>
                    <?php dynamic_sidebar('footer2') ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer3')): ?>
                <div>
                    <?php dynamic_sidebar('footer3') ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer4')): ?>
                <div>
                    <?php dynamic_sidebar('footer4') ?>
                </div>
            <?php endif; ?>
        </div>
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