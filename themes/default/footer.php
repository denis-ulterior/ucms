		<div class= "wrap">
	            <footer id="bottom">
	                <small>&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>.</small>
					<small>U-CMS <?php echo __('global.powered_by_anchor', VERSION); ?></small>

	                <ul role="navigation">
	                    <li><a href="<?php echo rss_url(); ?>">RSS</a></li>
	                    <?php if (twitter_account()): ?>
	                  
	                    <?php endif; ?>

	                    <li><a href="<?php echo base_url('uladmin'); ?>" title="Administer your site!">Admin</a></li>

	                    <li><a href="<?php echo base_url(); ?>" title="Return to my website.">Home</a></li>
	                </ul>
	            </footer>

	        </div>
        </div>
    </body>
</html>
