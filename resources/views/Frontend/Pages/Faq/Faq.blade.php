@extends('Frontend.Layout.app')
@section('content')
            <section style="background:{{$page_data[0]->background_color}}" class="page-header page-header-modern page-header-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <h1 class="font-weight-bold text-white">{{$page_data[0]->page_title}}</h1>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center">
                                <li><a class="banner-btn" href="#">Home</a></li>
                                <li class="active text-white">Pages</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-default border-0">
            <h3 class="text-center">HOW TO PLACE A CALL IN 3 STEPS </h3>
                    <div class="divider divider-solid divider-style-4">
                        <i class="fas fa-chevron-down"></i>
					</div>
					<div class="container">
						<div class="row">
							<div class="col">
								<h4 class="mb-3">1. Dial the access number:</h4>
								<p class="mb-0">(800) 961-1992 (costs 4.4cents/min extra) or select any other number available here with no extra cost: https://www.universal-call.com/home/numbers   
                                </p>

                                <h4 class="mb-3 mt-5">2. Enter your 12-digit PIN number:</h4>
								<p class="mb-0">ACCOUNT PIN: 137600001486 This step is not needed if you have purchased a PINLESS account and calling from the phone that is entered in this calling card account.
                                </p>

                                <h4 class="mb-3 mt-5">3. Enter the destination number:</h4>
								<p class="mb-0">For domestic, dial:<br>

                                1 + area code + 7 digit number<br>

                                For international, dial:<br>
                                Country code+ city code + number <br>
                                You may also login and save your frequently dialed destination numbers under 1-digit speed dial, to place <br>any call by pressing that 1-digit when prompted for the destination number. 

                                To recharge by phone 24/7, simply press STAR (*) POUND (#), when asked for the destination and follow the voice prompt. 

                                </p>
							</div>
						</div>
					</div>
			</section>

            

            <!-- <div class="container-fluid">
					
					<div class="row">
						<div class="col-lg-6 order-2 order-lg-1 p-0">
							<div class="h-400px m-0">
								<div class="row m-0">
									<div class="col-half-section col-half-section-right py-5 ms-auto">
										<div class="p-3">
											<h4 class="mb-3">How to Use a Calling Card</h4>
											<p class="mb-0">Pre-paid calling cards can be used domestically, and can help you stay in touch when traveling abroad. Using a calling card isn't difficult, but there are some things to consider when purchasing them. Some cards have hidden fees that you may not notice when buying the card. Take some time to compare cards before deciding on which one to buy.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 order-1 order-lg-2 p-0">
							<section class="parallax section section-background bg-size-cover h-400px m-0" style="background-image: url('images/blog1.jpg');">
								<div class="container">
									<div class="row">
										<div class="col">

										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
			</div>
                
<div class="container container-xl-custom">

<div class="row mt-5 pt-3">
    <div class="col-md-1 col-lg-1"></div>
    <div class="col-md-9">
        <div class="blog-posts">

            <article class="post post-large">
                
                <div class="post-image">
                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">1</span>
                    <span class="month border-radius-0 text-1 bg-color-dark">Part</span>
                </div>
                <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">Using Your Calling Card</a></h2>
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog_1.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">1</span>
                </div>

                <div class="post-content">

                    
                    <p><strong>Buy your card</strong>  You can buy calling cards at most convenience stores and grocery stores, or you can shop online. Pay attention to how many minutes you have available on your card before making a call</p>

                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>  If you are buying your card from a store, the clerk will have to activate the card for you before you can use it.</li>
						<li> When you buy a calling card online you may not receive a physical card. Once you make your payment, you will receive an access number and your PIN.</li>
					</ul>

                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog3.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">2</span>
                </div>

                <div class="post-content">
                    <p><strong>Dial the access number </strong> Each card comes with an access number that you must dial before you can place your call. The access number could be a toll-free number, or a local access number.</p>

                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog_3.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">3</span>
                </div>

                <div class="post-content">
                    <p><string>Enter your PIN </string> Each card will provide you with a PIN, or personal identification number. Once you have dialed the access number, you will receive a prompt to enter your PIN</p>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog4.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">4</span>
                </div>

                <div class="post-content">
                    <p><string>
                        Dial the number you are trying to call.</string> When your call is connected, you will you start using the minutes on your pre-paid calling card. The card should give you an update on the number of minutes remaining before the call is connected.
                    </p>
                </div>
            </article>
            <article class="post post-large">

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">5</span>
                </div>

                <div class="post-content">
                    <p><string>Hang up when you're finished with the call</string> After your call has been connected, you can talk as long as you have minutes. When you're finished with your call, just hang up
                    </p>
                </div>
            </article>



            <article class="post post-large">
                
                <div class="post-image">
                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">2</span>
                    <span class="month border-radius-0 text-1 bg-color-dark">Part</span>
                </div>
                <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">Buying a Calling Card</a></h2>
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog_part_2.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-1.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">1</span>
                </div>

                <div class="post-content">
                    <p><strong>Pay attention to the details</strong> 
                    When shopping for a calling card, it's easy to get overwhelmed. You can find cards intended for a particular region, or cards that are for general international calls. Some cards are only good for one phone call, while others will allow you to make several
                    </p>

                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>Most calling cards have disclaimers on the back of the card. Some of these disclaimers can be quite long, and the print can be small. However, it's worth it to read the disclaimer to find out exactly how the calling card will function.</li>
					</ul>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-2.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">2</span>
                </div>

                <div class="post-content">
                    <p><strong>Look out for hidden fees </strong> 
                    Some calling cards have a fee for everything. You may find that there is a weekly maintenance fee, a connection fee, a post-call fee, and in some cases, a dialing fee
                    </p>

                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>If you end up using your card for a single phone call, fees may not be much of an issue for you. But, if you plan on using your card for multiple calls, be careful. You may end up losing your minutes to fees.</li>
                        <li>
                        Post-call fees can be up to $1 after the first call, or $1 for each week you have the card. Other cards charge a 35% surcharge for having the card.
                        </li>
                        <li>Most cards have a fee for calling from a pay phone. This fee can be anywhere between 59 cents and $1.35. You might also end up paying a fee for using a toll-free number instead of a local access number.</li>
                        <li>
                        Some cards charge a maintenance fee when you use the card to check your minutes, but don't actually place a call. Be wary of cards that do this, as you might use all your minutes checking rates.
                        </li>
                        <li>
                        Before you settle on a card, do some research and make sure you're getting what you pay for. In some cases, you may only get the full amount of minutes if you only use your card for a single phone call.
                        </li>
					</ul>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-3.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">3</span>
                </div>

                <div class="post-content">
                    <p><strong>Compare rates.</strong> 
                    Calling card rates can vary depending on where you are trying to call, and what kind of card you have. For example, the rates to call Mexico City could be between 2/10 of a cent to 40 cents. To call Guatemala City, you could pay between 7-49 cents. These rates are liable to increase if you are calling a mobile number
                    </p>

                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>Check the packaging or the company website for international rates by country.</li>
					</ul>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-4.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">4</span>
                </div>

                <div class="post-content">
                    <p><strong>Check the calling card policy of your destination</strong>If you are buying a calling card for travel abroad, make sure you will be allowed to use it. Some countries restrict the use of calling cards.[18] Read traveler's guides for to learn the best ways to make calls in the country you are visiting.
                    </p>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-5.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">5</span>
                </div>

                <div class="post-content">
                    <p><strong>Be wary of misinformation</strong>There is a lot of conflicting information in the calling card industry. Sometimes the advertised rate on the card doesn't match up with the rate you actually receive. In some cases the rate is lower, but it's just as likely to receive a higher rate.
                    </p>
                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>Buy a card that has a customer service number, that way if you have any problems, or find any inconsistencies, you can report it. If you end up with a card that doesn't have a functional customer service line, you may want to alert the Federal Trade Commission</li>
					</ul>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-6.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">6</span>
                </div>

                <div class="post-content">
                    <p><strong>Check the expiration date.</strong>
                    Some cards are only good for a certain length of time, and the countdown to expiration may start as soon as you activate your card.
                    </p>
                    <ul class="list list-icons list-icons-style-3 list-icons-sm list-icons-check">
						<li>Avoid buying too many cards at once. Rather, buy calling cards as you need them.</li>
					</ul>
                </div>
            </article>

            <article class="post post-large">
                <div class="post-image">
                    <a href="blog-post.html">
                        <img src="{{asset('images/blog2-7.jpg')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                    </a>
                </div>

                <div class="post-date text-1">
                    <span class="day border-radius-0 text-10 text-dark">7</span>
                </div>

                <div class="post-content">
                    <p><strong>Consider buying a card you can recharge.</strong>
                    The packaging of your card will indicate whether or not it can be recharged. If you can recharge your card, follow the instructions on the packaging or visit the company website to do so. Beware of recharging fees, which are not uncommon. Call the company if you are not sure whether you will be charged a fee for adding money to your card.
                    </p>
                </div>
            </article>
        </div>
    </div>
    
</div>

</div> -->

            <div class="container py-4">

                <div class="row">
                    <div class="col">

                        <h2 class="font-weight-normal text-7 mb-2">Frequently Asked <strong class="font-weight-extra-bold">Questions</strong></h2>
                        

                        <hr class="solid my-5">

                        <div class="toggle toggle-primary m-0" data-plugin-toggle>
                            <!-- <section class="toggle active">
                                <a class="toggle-title">Will PayPhone Calling Card work from Pay Phones at Rehab Centers, Hospitals, Land Lines or Cell Phone?</a>
                                <div class="toggle-content">
                                    <p>Yes, it comes with 12 digit Calling Card PIN that you enter after dialing the access number 800-961-1992, for Alaska residents: (866) 978-0731, followed by your destination number.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">I'm calling domestic number and call doesn't go through. What do I do?</a>
                                <div class="toggle-content">
                                    <p>You MUST dial a 1 (ONE) before the area code and destination number even though it is a local number for calls to go through.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">I need to add money to my Calling Card, but I forgot my login ID & password, what do I do?</a>
                                <div class="toggle-content">
                                    <p>The easiest way to add money is:
                                        - Dial 800-961-1992, for Alaska residents: (866) 978-0731 and enter your 12 digit calling card number
                                        - Press STAR (*) POUND (#) to add money to your calling card by phone 24/7 and follow voice prompt.
                                        You can also click FORGOT PASSWORD in the login box, enter the email address on file to reset and new password be emailed to you.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">I forgot the login ID to my PINLESS accout; so I signed up for a new one; but the amount I just purchased did not add to my phone and it says I have few cents left (which is old balance) when trying to place a call. Where is my money?</a>
                                <div class="toggle-content">
                                    <p>Computer does not allow same phone number registered under two or more PINLESS accounts. Since you attempted to create another PINLESS account for same phone number, computer converted it into a new PIN account to avoid conflict with the old PINLESS account your phone number is already assigned to. Please call customer service to transfer fund from the new duplicate account to the old PINLESS account; you may also RECHARGE your account by phone (dial any Access Number and press * # when account balance is announced and follow the voice prompt) and ask for a full refund from the incorrect transaction for duplicate account.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">Should I enter '1' in front of my own phone number while registering?</a>
                                <div class="toggle-content">
                                    <p>No. Entering '1' in front of your phone number will not work as PINLESS. You only enter '1' in front destination number while dialing any domestic/Canadian (or any other 1+) phone number.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">Is there any promotional/discount rate for calling to Bangladesh? Please let me know how to get the special rate?</a>
                                <div class="toggle-content">
                                    <p>To get the promotional economy rate, simply add 9 in front of Bangladesh country code; so, it will be 98801 or 01198801 instead of 8801 or 0118801. This will get you 2.9c/min to any Bangladesh mobile phones 24/7 (limited time offer, first come first serve, subject to availability). This promotion is for Bangladesh Mobile phones only, Land Line (T&T) phone numbers are not included in this special discount.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">I set up 1-digit calls home/speed dial numbers for calling back to the US from London, by prepending the US number with "1", the US country code. (Gets confusing when that number is more commonly associated with US domestic long distance.) ?</a>
                                <div class="toggle-content">
                                    <p>'1' is actually the country code for USA/Canada (and few others) and we are required to use it for domestic as well.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">What is the difference between SPEED DIAL entry and ALLOW PHONES TO CALL FROM entry ?</a>
                                <div class="toggle-content">
                                    <p>'SPEED DIAL' is to pre-program where to call to (the DESTINATION number ) ... input country code, city code and number; for US/Canada (or any 1plus destinations), put 1 plus the 10 digit number, without any hyphen, space or parenthesis and 'ALLOW PHONES TO CALL FROM' is to pre-program where to call from ( the ORIGINATION number) ... input country code, city code and number; for US/Canada (or any 1plus destinations), DO NOT put 1, simply 10digit area code plus number without any hyphen, space or parenthesis.</p>
                                </div>
                            </section>

                            <section class="toggle">
                                <a class="toggle-title">Can I use your service for domestic long-distance from my land-line as a dial-around number. Your rate is less than my current inter-state rate and less than half of my intra-state rate! Plus you don't charge any monthly fee ?</a>
                                <div class="toggle-content">
                                    <p>Many uses our service as domestic long distance alternative; please note, we do not support FAX capability.</p>
                                </div>
                            </section>


                            <section class="toggle">
                                <a class="toggle-title">Can I place phone calls from overseas (UK, for example) using my PIN for the account or add my overseas phone number under 'ALLOW PHONES TO CALL FROM' to use it as PINLESS?</a>
                                <div class="toggle-content">
                                    <p>Absolutely, any PINLESS account works both ways:
                                        a) as PIN (activation required), as long as you can reach any of our access numbers, while calling from a phone (which is not listed under "allow phones to call from").
                                        b) as PINLESS, by adding your overseas phone number under "allow phones to call from"; be sure to include the complete phone number (country, city code & number). For country code 1 (such as Canada, Dominican Republic etc.), DO NOT put 1, simply 10digit area code without any hyphen, space or parenthesis.</p>
                                </div>
                            </section>
                            <section class="toggle">
                                <a class="toggle-title">On your website, you recommend using speed dial for international calls from cell phones to avoid pressing "send" and consequently using the cell-phone carrier's network instead of your service. Having '#' sign after the international number results in using your service and the warning is primarily for those who might be inclined to or inadvertently use the send key, am I right? Is there a hardware/software limitation which makes speed-dial necessary when calling international from a cell phone, i.e., the # doesn't have the same effect as with a land-line phone, is that correct?</a>
                                <div class="toggle-content">
                                    <p>Unless you are using another VoIP technology on your phone, there is no hardware or software limitation from our end dictating Speed Dial usage. It merely eliminate the need for entering long destination numbers. Also, inadvertent pressing of 'send' button after entering complete destination number may throw the call over your cellphone network, not Universal-Call; whereas speed dial entry usage eliminates your unwanted/mistaken 'send' entries over cell phone network, as single digit doesn't mean any destination number to them. '#' (pound, hash or number) sign to calling card industry is like a 'period' in English sentence... it tells the server that all digits in a destination number has been entered; so, it saves you about 2 to 3sec waiting time before it sends the destination number to place a call.</p>
                                </div>
                            </section>
                            <section class="toggle">
                                <a class="toggle-title">Can I use your service for domestic long-distance from my land-line as a dial-around number. Your rate is less than my current inter-state rate and less than half of my intra-state rate! Plus you don't charge any monthly fee ?</a>
                                <div class="toggle-content">
                                    <p>Many uses our service as domestic long distance alternative; please note, we do not support FAX capability.</p>
                                </div>
                            </section> -->
                            {!! $data[0]->content_text !!}
                        </div>
                        <!-- {!! $data[0]->content_text !!} -->

                    </div>

                </div>

            </div>
@endsection