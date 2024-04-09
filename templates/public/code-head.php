<?php /* @var string $gtm_id */ ?>

<?php if ( ! empty( $gtm_id ) ): ?>
<!-- Google Tag Manager - added by WP Modo GTM plugin -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo $gtm_id; ?>');</script>
<!-- End Google Tag Manager - added by WP Modo GTM plugin -->
<?php endif; ?>

