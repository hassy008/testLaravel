@extends('frontEnd.master')

@section('title')
Movie Details
@endsection

@section('mainContent')
<!-- single -->
<div class="single-page-agile-main">

<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="{{ url('/') }}">Home</a></li>
				  <li class="active">Single</li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h3>{{ $FilmById->name }} </h3>	
					</div>
						<div class="video-grid-single-page-agileits">
							<div data-video="dLmKio67pVQ" id="video"> 
								<img src="{{ asset('public/storage/film/'.$FilmById->image) }}" alt="" class="img-responsive" /> 
							</div>
							<div>
				<form>
					<td>
						<tr>Release Date: </tr>
						<tr>{{ $FilmById->release_date }}</tr>
					</td> <br>
					<td>
						<tr>Rating: </tr>
						<tr>{{ $FilmById->rating }}</tr>
					</td> <br>
				 	
					<td>Ticket Price</td> : {{ $FilmById->ticket_price }} <br>
					<td>Genre :  
						@foreach($FilmById->genres as $showGenre)
	                  		{{ $showGenre->genres_name }} |
	               		@endforeach  
               		</td> <br>
					<td>Country</td>: {{ $FilmById->country }}<br>
					<td>Description</td> : {!! $FilmById->description !!}<br>

					<iframe width="560" height="315" src="{{ $FilmById->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					
						
					
				</form>
							</div>
						</div>
					</div>
					<div class="song-grid-right">
						<div class="share">
							<h5>Share this</h5>
							<div class="single-agile-shar-buttons">
							<ul>
								<li>
									<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
								</li>
								<li>
									<div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
								</li>
								<li class="news-twitter">
									<a href="https://twitter.com/w3layouts" class="twitter-follow-button" data-show-count="false">Follow @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</li>
								<li>
									<a href="https://twitter.com/intent/tweet?screen_name=w3layouts" class="twitter-mention-button" data-show-count="false">Tweet to @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</li>
								<li>
									<!-- Place this tag where you want the +1 button to render. -->
									<div class="g-plusone" data-size="medium"></div>

									<!-- Place this tag after the last +1 button tag. -->
									<script type="text/javascript">
									  (function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/platform.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									  })();
									</script>
								</li>
							</ul>
						</div>
						</div>
					</div>
					<div class="clearfix"> </div>

					<div class="all-comments">
					@guest	
					<h4>You have to <a href="{{ url('/login') }}">Login</a> First Please</h4>
					@else
						<H3>Post Your Comments</H3>
						<div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://larafilm.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                     @endguest       
					</div>

				</div>
				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
					<div class="single-grid-right">
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m1.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m2.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views </p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m3.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m4.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m5.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/c5.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m6.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author">By <a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{ asset('public/frontEnd/') }}/images/m15.jpg" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author">By <a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>

					</div>
				</div>
				

				
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m13.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Citizen Soldier</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">X-Men</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m12.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Greater</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Light B/t Oceans</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m8.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">The BFG</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Central Intelligence</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m10.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Don't Think Twice</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Peter</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="{{ asset('public/frontEnd/') }}/images/m15.jpg" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">God’s Compass</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!--body wrapper end-->
						
							 
				</div>
				<!-- //w3l-latest-movies-grids -->			
			</div>	





</div>
	<!-- //w3l-medile-movies-grids -->

@endsection