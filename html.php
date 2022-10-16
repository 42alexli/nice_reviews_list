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
            <div class="d-flex align-items-center row g-4 row-cols-1 row-cols-lg-3 items-data">

                <div class="item p-2 col-md-6 col-lg-3">
                    <a href="/49211">
                        <div class="item__first text-center py-4">
                            <img src="https://picsum.photos/195/75" alt="party-casino-paypal">
                        </div>
                        <div class="item__second text-center">
                            Review
                        </div>
                    </a>
                </div>

                <div class="item p-2 col-md-6 col-lg-3">
                    <div class="item__first">
                        <div class="rating-result text-center py-3">
                            <span class="active"></span><span class="active"></span><span class="active"></span><span class=""></span><span class=""></span>                            </div>
                    </div>
                    <div class="item__second text-center px-5">
                        <p>Free $10 + 100% deposit bonus up to $600</p>
                    </div>
                </div>
                <div class="item p-2 col-md-6 col-lg-3">
                    <div class="item__first text-center">
                        <ul>
                            <li>Several limited promos</li>
                            <li>$100 no deposit bonus</li>
                            <li>App for android &amp; iOS</li>
                        </ul>
                    </div>
                </div>

                <div class="item p-2 col-md-6 col-lg-3">
                    <div class="item__first text-center pb-3">
                        <a class="btn btn-lg btn-block btn-primary px-5" href="https://example.com/wow-the-perfect-casino">Play now</a>
                    </div>
                    <div class="item__second text-center">
                        <p class="terms_and_conditions">18+ | <a href="https://generator.lorem-ipsum.info/terms-and-conditions">T&amp;CS Apply</a> | Gamble Responsibly</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>