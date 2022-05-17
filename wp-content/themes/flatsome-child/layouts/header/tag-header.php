<div class="shop-page-title category-page-title page-title featured-title dark <?php flatsome_header_title_classes() ?>">

	<div class="page-title-bg fill">
		<div class="title-bg fill bg-fill" data-parallax-fade="true" data-parallax="-2" data-parallax-background data-parallax-container=".page-title"></div>
		<div class="title-overlay fill"></div>
	</div>

	<div class="page-title-inner flex-row  medium-flex-wrap container">
		<div class="flex-col flex-grow medium-text-center">
				<?php do_action('new_page_title') ;?>
		</div>

		<div class="flex-col medium-text-center  form-flat">
			<form class="woocommerce-ordering" method="get">
				<?php
						$catalog_orderby_options = apply_filters(
							'woocommerce_catalog_orderby',
							array(
								'menu_order' => __( 'Default sorting', 'woocommerce' ),
								'popularity' => __( 'Sort by popularity', 'woocommerce' ),
								'date'       => __( 'Sort by latest', 'woocommerce' ),
							)
						);
				?>
				<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
					<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
						<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="paged" value="1" />
				<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
			</form>
		</div>
	</div>
</div>
