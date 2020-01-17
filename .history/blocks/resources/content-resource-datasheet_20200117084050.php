<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
 ?>
<div class="datasheet">
	<?php if (get_field('datasheet_heading')): ?>
		<h3 class="heading">
			<?php echo esc_html(get_field('datasheet_heading')); ?>
		</h3>
	<?php endif; ?>

	<?php if (get_field('datasheet_description')): ?>
		<p class="description">
			<?php esc_html(the_field('datasheet_description')) ?>
		</p>
	<?php endif;

	if ($datatable = get_field('datasheet_table')) { ?>
		<table class="datatable">
			<?php
				if ( ! empty( $datatable['header'] ) ) {
					$headers = wp_list_pluck($datatable['header'], 'c');

					if ( ! empty( $headers ) ) { ?>
						<thead>
							<tr>
								<?php
									foreach ( $headers as $header ) {
										if( empty( $header ) ) {
											continue;
										}
										?>
										<th>
											<?php echo ! empty( $header ) ? esc_html( $header ) : ''; ?>
										</th>
									<?php
								} ?>
							</tr>
						</thead>
					<?php
					}
				}
				?>
				<?php
					if (! empty($datatable['body'])):
						$body_data = $datatable['body']; ?>
						<tbody>
							<?php
							foreach ($body_data as $row):
								$row_data = wp_list_pluck( $row, 'c' );

								if (empty($row_data)) {
									continue;
								} ?>
								<tr>
									<?php
										foreach ($row_data as $column): ?>
											<td>
												<?php echo ! empty( $column ) ? esc_html($column) : ''; ?>
											</td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<?php
					endif; ?>
			</tbody>
		</table>
	<?php } ?>
</div>
