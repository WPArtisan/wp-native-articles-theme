<?php if( ! empty( $_GET['edd-verify-success'] ) ) : ?>
<p class="edd-account-verified edd_success">
	<?php _e( 'Your account has been successfully verified!', 'easy-digital-downloads' ); ?>
</p>
<?php
endif;
/**
 * This template is used to display the purchase history of the current user.
 */
if ( is_user_logged_in() ):
	$payments = edd_get_users_purchases( get_current_user_id(), 20, true, 'any' );
	if ( $payments ) :
		do_action( 'edd_before_purchase_history' ); ?>
<div class="mv4">
	<div class="overflow-auto">
		<table id="" class="f6 w-100 mw8 b--light-gray ba bw2 br2" cellspacing="0">
			<thead>
				<tr class="">
					<?php do_action('edd_purchase_history_header_before'); ?>
					<th class="edd_purchase_id fw6 bb b--light-gray tl pa3 bg-light-gray"><?php _e('ID','easy-digital-downloads' ); ?></th>
					<th class="edd_purchase_date fw6 bb b--light-gray tl pa3 bg-light-gray"><?php _e('Date','easy-digital-downloads' ); ?></th>
					<th class="edd_purchase_amount fw6 bb b--light-gray tl pa3 bg-light-gray"><?php _e('Amount','easy-digital-downloads' ); ?></th>
					<th class="edd_purchase_details fw6 bb b--light-gray tl pa3 bg-light-gray"><?php _e('Details','easy-digital-downloads' ); ?></th>
					<?php do_action('edd_purchase_history_header_after'); ?>
				</tr>
			</thead>
			<tbody class="lh-copy">
			<?php foreach ( $payments as $payment ) : ?>
				<?php $payment = new EDD_Payment( $payment->ID ); ?>
				<tr class="edd_purchase_row">
					<?php do_action( 'edd_purchase_history_row_start', $payment->ID, $payment->payment_meta ); ?>
					<td class="edd_purchase_id pa3 bb b--light-gray">#<?php echo $payment->number ?></td>
					<td class="edd_purchase_date pa3 bb b--light-gray"><?php echo date_i18n( get_option('date_format'), strtotime( $payment->date ) ); ?></td>
					<td class="edd_purchase_amount pa3 bb b--light-gray">
						<span class="edd_purchase_amount"><?php echo edd_currency_filter( edd_format_amount( $payment->total ) ); ?></span>
					</td>
					<td class="edd_purchase_details pa3 bb b--light-gray">
						<?php if( $payment->status != 'publish' ) : ?>
							<span class="edd_purchase_status <?php echo $payment->status; ?>"><?php echo $payment->status_nicename; ?></span>
							<?php if ( $payment->is_recoverable() ) : ?>
								&mdash; <a class="link underline-hover wpna-blue" href="<?php echo $payment->get_recovery_url(); ?>"><?php _e( 'Complete Purchase', 'easy-digital-downloads' ); ?></a>
							<?php endif; ?>
						<?php else: ?>
							<a class="link underline-hover wpna-blue" href="<?php echo esc_url( add_query_arg( 'payment_key', $payment->key, edd_get_success_page_uri() ) ); ?>"><?php _e( 'View Details and Downloads', 'easy-digital-downloads' ); ?></a>
						<?php endif; ?>
					</td>
					<?php do_action( 'edd_purchase_history_row_end', $payment->ID, $payment->payment_meta ); ?>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
		<div id="edd_purchase_history_pagination" class="edd_pagination navigation">
			<?php
			$big = 999999;
			echo paginate_links( array(
				'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total'   => ceil( edd_count_purchases_of_customer() / 20 ) // 20 items per page
			) );
			?>
		</div>
		<?php do_action( 'edd_after_purchase_history' ); ?>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p class="edd-no-purchases"><?php _e('You have not made any purchases','easy-digital-downloads' ); ?></p>
	<?php endif;
endif;
