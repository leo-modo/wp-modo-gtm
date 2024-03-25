<div class="wrap">
    <h2>Réglages GTM</h2>

    <p>
		<?php echo wp_admin_notice( "Assurez vous d'avoir les hooks <b>wp_head</b> et <b>wp_body_open</b> dans votre thème.", [ 'type' => 'warning' ] ); ?>
    </p>

    <form method="post" action="options.php">
		<?php
		settings_fields( 'wp_modo_gtm_group' );
		do_settings_sections( 'wp-modo-gtm-settings' );
		submit_button( 'Enregistrer le code' );
		?>
    </form>
</div>