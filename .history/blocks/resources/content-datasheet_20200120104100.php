<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
$heading = get_field( 'datasheet-heading' );
$description = get_field( 'datasheet-description' );
$datatable   = get_field( 'datasheet-table' );
 ?>
<div class="content-block datasheet-block">
	<?php if ( ! empty( $heading ) ): ?>
		<h3 class="heading">
			<?php echo esc_html( $heading ); ?>
		</h3>
	<?php endif; ?>

	<?php if ( ! empty( $description ) ): ?>
		<p class="description">
			<?php esc_html( $description ); ?>
		</p>
	<?php endif;

	if ( ! empty( $datatable ) ): ?>
		<table class="datatable">
			<?php
				if ( ! empty( $datatable['header'] ) ) {
					$headers = wp_list_pluck( $datatable['header'], 'c' );

					if ( ! empty( $headers ) ) { ?>
						<thead>
							<tr>
								<?php
									foreach ( $headers as $header ) { ?>
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
					if ( ! empty( $datatable[ 'body' ] ) ) {
						$body_data = $datatable['body']; ?>
						<tbody>
							<?php
							foreach ($body_data as $row):
								$row_data = wp_list_pluck( $row, 'c' );

								if (empty($row_data)) {
									continue;
								}
								?>
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
					}
					?>
			</tbody>
		</table>
	<?php } ?>
</div>
