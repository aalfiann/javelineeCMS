<!-- Main -->
                <div id="main">

                    <!-- One -->
                        <section id="one">
                            <section id="about">
                            <div class="container">
                                <header class="major">
                                    <h2>ID Rent Car</h2>
                                    <p>Very Cheap Car Rental Agency in Jakarta Indonesia</p>
                                </header>
                                <p>ID Rent Car is Car Rental Agency that offers You the very cheap rent a car in Jakarta Indonesia. We have service for handling VIP guests, business visits, conference, weddings and other special occasions and events. We also have special tour for You who want to travel in safety, reliability, comfort, and have fun moment when visit to Indonesia.</p>
                            </div>
                            </section>
                        </section>
                        
                    <!-- Two -->
                        <section id="why-choose-us">
                            <div class="container">
                                <h3>Why choose us?</h3>
                                <p>Why You should choose us as Your rental agency? Here is our best services for You.</p>
                                <ul class="feature-icons">
                                    <li class="fa-check">The Cost is very Cheap</li>
                                    <li class="fa-check">Simple to book the Car</li>
                                    <li class="fa-check">All is New Vechiles</li>
                                    <li class="fa-check">Short or Long Term Rent</li>
                                    <li class="fa-check">Special Tour or Trip</li>
                                    <li class="fa-check">Nice experience in Location</li>
                                    <li class="fa-check">Friendly in Communication</li>
                                    <li class="fa-check">Our driver is good in English</li>
                                </ul>
                            </div>
                        </section>

                        <!-- Galerry -->
                        <section id="our-vechiles-gallery">
                            <div class="container hidden-xs hidden-sm">
                                    <h4>Our Vechiles Gallery</h4>
                                    <p>Best comfortable, clean, and new vechiles is our services for You</p>
                                    <?php portfolio::Load($loadmore)?>
                                    
                            </div>
                        </section>
                        
                    <!-- Three -->
                        <section id="special-tour">
                            <div class="container">
                                <h3>Special Tour or Trip</h3>
                                <p>Don't know about Indonesia or want to know more about Indonesia? Don't worry, because we have a nice special tour or trip to go to beautiful, historical, cultural, natural or comfortable place in Indonesia. Here is our best place to go for You.</p>
                                <div class="features">
                                    <article>
                                        <a href="#" class="image"><img src="<?=$host.'/theme/'.$site['theme'] ?>/images/Situ-Gede.jpg" alt="Situ Gede Lake" /></a>
                                        <div class="inner">
                                            <h4>Situ Gede Lake</h4>
                                            <p>Situ Gede is a lake with an area of approximately 6 acres located in the city of Bogor. Favorite activities are carried out in Situ Gede is fishing, take a walk in the woods, play boat, and other water attractions at the edge of the Forest Dramaga.</p>
                                        </div>
                                    </article>
                                    <article>
                                        <a href="#" class="image"><img src="<?=$host.'/theme/'.$site['theme'] ?>/images/The-Jungle.jpg" alt="The Jungle" /></a>
                                        <div class="inner">
                                            <h4>The Jungle</h4>
                                            <p>The Jungle is one of the most water rides in Bogor complete with an area of approximately 3.6 hectares. Types of rides and facilities in The Jungle is a children's pool, waterslide long, relaxing pool, lazy river, water area futsal, cinema 4D, haunted house, dining area, garden birds, non-water play areas, rest areas, shops souvenir, snow rides, paintball, karting, and flying fox.</p>
                                        </div>
                                    </article>
                                    <article>
                                        <a href="#" class="image"><img src="<?=$host.'/theme/'.$site['theme'] ?>/images/Kepulauan-Seribu.jpg" alt="Thousand Islands" /></a>
                                        <div class="inner">
                                            <h4>Thousand Islands</h4>
                                            <p>Thousand Islands is a tourist spot around Jakarta's most favorite. Thousand Islands has many islands, such as Angel Island, Tidung Island, Princess Island, Ayer Island, Sepa Island, Pantara Island, and others.</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </section>

                    <!-- Four -->
                        <section id="contact-us">
                            <div class="container">
                                <h3><i class="fa fa-envelope"></i> Contact US <small><?=$site['email']?></small></h3>
                                <p>Our office is located at Bentengan Mas 1 No.6-7 street, Sunter, North Jakarta, Indonesia. <br />
                                <?php include 'form-contact.php'?>
                            </div>
                        </section>

                    