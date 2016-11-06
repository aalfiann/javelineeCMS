<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt"><strong>Tripid Travel</strong></h2>
								<p>We are Tour and Travel Agency in Jakarta Indonesia</p>
								<p>Reservation Hotel, Online Airline Ticket, <br />
								Rent a car, Shuttle Airport, <br/>
								and many more ...</p>

							</header>
							
							<footer>
								
							<a href="javascript:$zopim.livechat.window.toggle()" class="button"><i class="fa fa-wechat"></i> Chat with Us Now!</a>
							</footer>
							<a href="#about" style='text-decoration:none;' class="scrolly"><span class="fa fa-angle-down fa-3x"></span></a>
						</div>
					</section>

				

				<!-- About Me -->
					<section id="about" class="two">
						<div class="container">

							<header>
								<h2>About Us</h2>
							</header>

							<a href="#" class="image featured"><img src="<?php theme::url('images/pic08.jpg')?>" alt="" /></a>
							
							<p>Tripid Travel is a tour and travel agency that offers You the very cheap price for Reservation Hotel, Airline ticket, Rent a car and Shuttle Airport in Jakarta Indonesia. 
							We also have special tour for You who want to travel in safety, reliability, comfort, and have fun moment when visit to Indonesia.</p>
						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="three">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>Our office is located at Bentengan Mas 1 No.6-7 street, Sunter, North Jakarta, Indonesia.</p>
							
							<?php contact::mail()?>

						</div>
					</section>


				<!-- Portfolio -->
					<section id="gallery" class="four">
						<div class="container">
					
							<header>
								<h2>Our Vechiles Gallery</h2>
							</header>
							
							<p>Best comfortable, clean, and new vechiles is our services for You.</p>
						
							<div class="row">
								<div class="12u">
			    					<?php portfolio::Load($loadmore);?>
            					</div>
            				</div><!-- /row -->
            
            				

						</div>
					</section>


			
			</div>