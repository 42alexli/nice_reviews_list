<?php
/**
 *
 * Rendered html with data from JSON.
 * This file get data from class AlexShulhaDeveloper and render to html
 *
 **/
if ( class_exists( 'AlexShulhaDeveloper' ) ) {
	$alexshdev = new AlexShulhaDeveloper();
	?>
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center row g-4 row-cols-1 row-cols-lg-3 text-center items-title">
                <div class="item p-3 m-0 col-md-6 col-lg-3">
                    Casino
                </div>
                <div class="item p-3 m-0 col-md-6 col-lg-3">
                    Bonus
                </div>
                <div class="item p-3 m-0 col-md-6 col-lg-3">
                    Features
                </div>
                <div class="item p-3 m-0 col-md-6 col-lg-3">
                    Play
                </div>
            </div>
			<?php
			/** Assign the data array from the class to the $data variable using the getdata() method */
			$data = $alexshdev->get_data();
			if(is_array($data)):
				foreach ( $data as $item ):
					?>
                    <div class="d-flex align-items-center row g-4 row-cols-1 row-cols-lg-3 items-data">

                        <div class="item p-2 col-md-6 col-lg-3">
                            <a href="/<?php echo $item->brand_id ? $item->brand_id : ''; ?>">
                                <div class="item__first text-center py-4">
									<?php if(!empty($item->logo)): ?>
                                        <img src="<?php echo $item->logo; ?>"
                                             alt="party-casino-paypal">
									<?php endif;?>
                                </div>
                                <div class="item__second text-center">
                                    Review
                                </div>
                            </a>
                        </div>

                        <div class="item p-2 col-md-6 col-lg-3">
                            <div class="item__first">
								<?php if(!empty($item->info->rating)): ?>
                                    <div class="rating-result text-center py-3">
										<?php
										/** Creating a range from 1 to 5 and iterate through the range
										 * comparing with the rating obtained from JSON to make a rating with stars
										 */
										foreach ( range( 1, 5 ) as $number ) {
											$class = $item->info->rating >= $number ? 'active' : '';
											echo '<span class="' . $class . '"></span>';
										} ?>
                                    </div>
								<?php endif;?>
                            </div>
							<?php if(!empty($item->info->bonus) ): ?>
                                <div class="item__second text-center px-5">
                                    <p><?php echo $item->info->bonus; ?></p>
                                </div>
							<?php endif;?>
                        </div>
						<?php if(is_array($item->info->features) ): ?>
                            <div class="item p-2 col-md-6 col-lg-3">
                                <div class="item__first text-center">
                                    <ul>
										<?php foreach ( $item->info->features as $feature ) { ?>
                                            <li><?php echo $feature; ?></li>
										<?php } ?>
                                    </ul>
                                </div>
                            </div>
						<?php endif;?>

                        <div class="item p-2 col-md-6 col-lg-3">
							<?php if(!empty($item->play_url) ): ?>
                                <div class="item__first text-center pb-3">
                                    <a class="btn btn-lg btn-block btn-primary px-5" href="<?php echo $item->play_url; ?>">Play now</a>
                                </div>
							<?php endif;?>
							<?php if(!empty($item->terms_and_conditions) ): ?>
                                <div class="item__second text-center">
                                    <p class="terms_and_conditions"><?php echo $item->terms_and_conditions; ?></p>
                                </div>
							<?php endif;?>
                        </div>
                    </div>
				<?php endforeach; ?>
			<?php endif;?>

        </div>
    </div>
<?php } ?>