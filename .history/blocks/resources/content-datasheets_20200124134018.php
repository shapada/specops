<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
$heading = get_field( 'datasheet-heading' );
$description = get_field( 'datasheet-description' );
$datatable   = get_field( 'datasheet-table' );
$bgcolor 	 = get_field( 'datasheet-bgcolor' );

$datasheets = get_field( 'datasheets' );

if( ! empty( $datasheets ) ) { ?>
	<div class="datasheets">
		<?php
		foreach( $datasheets as $datasheet ) {
			if( ! empty( $datasheet[ 'datasheet-heading' ] ) ) {  ?>
				<h3 class="content-block-heading text-align-center">
					<?php echo esc_html( $datasheet['datasheet-heading' ] ); ?>
				</h3>
			<?php
			}

			if( ! empty( $datasheet['datasheet-description'] ) ) { ?>
				<p class="content-block-description">
					<?php echo esc_html( $datasheet['datasheet-description'] ); ?>
				</p>
			<?php
			}

			if( ! empty( $datasheet['datasheet-table'] ) ) { echo '<pre>'; var_dump( $datasheet[ 'datasheet-table' ] ); ?>
				<table class="datatable tablesaw tablesaw-stack" data-tablesaw-mode="stack">
					<?php
						if ( ! empty( $datasheet['datasheet-table']['header'] ) ) {
							$headers = wp_list_pluck( $datasheet['datasheet-table']['header'], 'c' );

							if ( ! empty( $headers ) ) { ?>
								<thead>
									<tr>
										<?php
											$priority = 0;
											foreach ( $headers as $header ) { ?>
												<th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="<?php echo 0 === $priority ? 'persist' : esc_attr( $priority ); ?>">
													<?php echo ! empty( $header ) ? esc_html( $header ) : ''; ?>
												</th>
											<?php
											$priority++;
										} ?>
									</tr>
								</thead>
							<?php
							}
						}
						?>
						<?php
							if ( ! empty( $datatable['datasheet-table'][ 'body' ] ) ) {
								$body_data = $datatable['datasheet-table']['body'];


								?>
								<tbody>
									<?php
									foreach ($body_data as $row) {
										$row_data = wp_list_pluck( $row, 'c' );

										if (empty($row_data)) {
											continue;
										}
										?>
										<tr>
											<?php
												foreach ($row_data as $column) { ?>
													<td>
														<?php echo ! empty( $column ) ? esc_html($column) : ''; ?>
													</td>
												<?php
											}
											?>
										</tr>
										<?php
										}
											?>
								</tbody>
							<?php
							}
						?>
					</tbody>
				</table>
			<?php
			}
		} ?>
	</div>
<?php
}
