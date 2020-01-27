<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
$datasheets = get_field( 'datasheets' );

if( ! empty( $datasheets ) ) { ?>
	<div class="datasheets">
		<?php
		foreach( $datasheets as $datasheet ) { ?>
		<div class="datasheet">

		<?php
			if( ! empty( $datasheet[ 'datasheet-heading' ] ) ) {  ?>
				<h3 class="block-heading text-align-center">
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

			if( ! empty( $datasheet['datasheet-table'] ) ) { ?>
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
							if ( ! empty( $datasheet['datasheet-table'][ 'body' ] ) ) {
								$body_data = $datasheet['datasheet-table']['body'];


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
		</div>
			<?php
			}
		} ?>
	</div>
<?php
}
