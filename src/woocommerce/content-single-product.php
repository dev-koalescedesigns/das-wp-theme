<?php
/**
 * Template Name: Single Product Content
 * description: Content for the "single-product" page
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 */
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-12">
            <div class="tile">
                <div class="product-img tile is-parent">
                    <article class="tile is-child">
                        <?php
                            /**
                             * Hook: woocommerce_before_single_product_summary.
                             *
                             * @hooked woocommerce_show_product_sale_flash - 10
                             * @hooked woocommerce_show_product_images - 20
                             */
                            do_action( 'woocommerce_before_single_product_summary' );
                        ?>
                    </article>
                </div>
                <div class="product-details tile is-parent is-vertical">
                    <article class="tile is-child">
                        <?php
                            /**
                             * Hook: woocommerce_single_product_summary.
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             * @hooked WC_Structured_Data::generate_product_data() - 60
                             */
                           
                            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
                            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

                            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 8 );
                            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 50 );

                            do_action( 'woocommerce_single_product_summary' );
                        ?>

                    </article>
                    <hr/>
                    <article class="tile is-child">
                        <?php
                            /**
                             * Hook: woocommerce_after_single_product_summary.
                             *
                             * @hooked woocommerce_output_product_data_tabs - 10
                             * @hooked woocommerce_upsell_display - 15
                             * @hooked woocommerce_output_related_products - 20
                             */
                            //remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
                            //remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
                            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

                            do_action( 'woocommerce_after_single_product_summary' );
                            
                        ?>
                    </article>
                </div>
            </div>

            <div class="tile is-parent">
                <article class="tile is-child">
                    <hr>
                    <?php
                        echo do_shortcode( '[related_products per_page="4"]' );
                    ?>
                    <hr>
                </article>
            </div>
        </div>
    </div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>