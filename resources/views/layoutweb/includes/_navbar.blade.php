<header id="header">
				<div class="header-top">
					<div class="container">
			  		<div class="row align-items-center">
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-left">
			  				<ul>
			  					<li><a href="#">Visit Us</a></li>
			  					<li><a href="#">Buy Tickets</a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
							<div class="header-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
			  			</div>
			  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="{{asset('img/logo.png')}}" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				        	@if($active=='home')
					          <li><a href="/" class="menu-active">Home</a></li>
				          	@else
					          <li><a href="/" class="">Home</a></li>
				          	@endif
				          	@if($active=='about')
					          <li><a href="/about" class="menu-active">About</a></li>
					        @else
						       <li><a href="/about">About</a></li>
					        @endif
					        @if($active=='packages')
						        <li><a href="/packages" class="menu-active">Packages</a></li>
					        @else
					          <li><a href="/packages">Packages</a></li>
					        @endif
					        @if($active=='insurance')
						        <li><a href="/insurance" class="menu-active">Insurence</a></li>
					        @else
					          	<li><a href="/insurance">Insurence</a></li>
					        @endif
					        @if($active=='contact')
						        <li><a href="/contact" class="menu-active">Contact</a></li>
					        @else
					          	<li><a href="/contact">Contact</a></li>
					        @endif
					        @if(Auth::check())
					        	@if($active=='yourbooking')
							        <li><a href="/yourbooking" class="menu-active">Your Booking</a></li>
						        @endif
						        <li><a href="/yourbooking">Your Booking</a></li>
					          	<li><a href="/logout">Logout</a></li>
					          	<li style="color: #f8b600">{{auth()->user()->name}}</li>
					        @else
						        @if($active=='login')
								        <li><a href="/login" class="menu-active">Login</a></li>
							        @else
							          <li><a href="/login">Login</a></li>
							    @endif
							@endif
					        
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->