<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('blog_assets/img/favicon.png') }}"/>
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/slippry.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/style.css') }}">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=1295987843866278&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->

	<div id="preloader-container">
    	<div id="preloader-wrap">
    		<div id="preloader"></div>
    	</div>
    </div>

    
    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** --> 

    <header class="tada-container">
    
    
    	<!-- LOGO -->    
    	<div class="logo-container">
        	<a href="index.html"><img src="{{ asset('blog_assets/img/logo.png') }}" alt="logo" ></a>
            <div class="tada-social">
            	<a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>
        
        
    	<!-- MENU DESKTOP -->
    	<nav class="menu-desktop menu-sticky">
    
            <ul class="tada-menu">
                     <li><a href="{{ asset('blog/home') }}" class="active">HOME </a>
                        {{-- <ul class="submenu">
                        	<li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index.html" class="active">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul> --}}
                    </li>
                    <li><a href="#">CATEGORIES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            @foreach ($categories as $category)
                                <li><a href="{{ asset('blog/category/') }}{{'/'.$category->slug}}">{{$category->name}}</a></li>
                            @endforeach
                            {{-- <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li> 
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li> --}}                                                                                            
                        </ul>                
                    </li>                                     
                    {{-- <li><a href="#">BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>                            
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>                                                                      
                        </ul>                
                    </li>  --}}
                    <li><a href="{{ asset('blog/login') }}">Sign In</a></li>
                    <li><a href="{{ asset('blog/register') }}">Register</a></li>
                    <li>
                      <a href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-xs btn-default btn-flat">Sign out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
            </ul>
        
        </nav>
        
        
        <!-- MENU MOBILE -->  
        <div class="menu-responsive-container"> 
            <div class="open-menu-responsive">|||</div> 
            <div class="close-menu-responsive">|</div>              
            <div class="menu-responsive">   
                <ul class="tada-menu">
                     <li><a href="#" class="active">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index.html" class="active">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul>
                    </li>
                    <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li> 
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>                                                                                            
                        </ul>                
                    </li>                                     
                    <li><a href="#">BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>                            
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>                                                                      
                        </ul>                
                    </li> 
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>                        
            </div>
        </div> <!-- # menu responsive container -->
        
        
        <!-- SEARCH -->
        <div class="tada-search">
			<form>
            	<div class="form-group-search">
              		<input type="search" class="search-field" placeholder="Search and hit enter...">
              		<button type="submit" class="search-btn"><i class="icon-search4"></i></button>
            	</div>
          	</form>
        </div>
        
        
        <!-- SLIDER -->
        <div class="tada-slider">
			<ul id="tada-slider">
				<li>
                	<img src="{{ asset('blog_assets/img/image-slider-1.jpg') }}" alt="image slider 1">
                	<div class="pattern"></div>
                	<div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
				<li>
                	<img src="{{ asset('blog_assets/img/image-slider-2.jpg') }}" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>MAECENAS CONSECTETUR</h1>
                        <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                        <span class="button"><a href="#">READ ME</a></span>
                    </div>
                </li>
				<li>
                	<img src="{{ asset('blog_assets/img/image-slider-3.jpg') }}" alt="image slider 3">
                	<div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
                <li>
                	<img src="{{ asset('blog_assets/img/image-slider-4.jpg') }}" alt="image slider 4">
                	<div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
			</ul>
            
        </div><!-- #SLIDER -->
                
                
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
	<section class="tada-container content-posts">
    
    
    	<!-- CONTENT -->
    	<div class="content col-xs-8">
        
        
        	<!-- ARTICLE 1 -->       
        	<!-- <article>
                            <div class="post-image">
                                <img src="img/img-post-1.jpg" alt="post image 1">
                                <div class="category"><a href="#">IMG</a></div>
                            </div>
                            <div class="post-text">
                                <span class="date">07 Jun 2016</span>
                                <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                                Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                                Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                                <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                            </div>
                            <div class="post-info">
                                <div class="post-by">Post By <a href="#">AD-Theme</a></div>
                                <div class="extra-info">
                                    <a href="#"><i class="icon-facebook5"></i></a>
                                    <a href="#"><i class="icon-twitter4"></i></a>
                                    <a href="#"><i class="icon-google-plus"></i></a>
                                    <span class="comments">25 <i class="icon-bubble2"></i></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article> -->
            @yield('content')
                  
        
        
        	<!-- NAVIGATION -->
        	<div class="navigation">
            	<a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top: 50px;" class="fb-comments" data-href="http://tungdeptrai.org/blog/home" data-width="715" data-numposts="5"></div>
        
        </div>
        
        
        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">
        	
            
            <!-- ABOUT ME -->                    
            <div class="widget about-me">
            	<div class="ab-image">
                	<img src="{{ asset('blog_assets/img/about-me.jpg') }}" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                	<p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="{{ asset('blog_assets/img/signing.png') }}" alt="signing"></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                             
            <div class="widget latest-posts">
            	<h3 class="widget-title">
                	Older Posts
                </h3>
                <div class="posts-container">
                    @yield('newest_posts')
                	{{-- <div class="item">
                    	<img src="{{ asset('blog_assets/img/latest-posts-1.jpg') }}" alt="post 1" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">MAECENAS <br> CONSECTETUR</a></h5>
                        	<span class="date">07 JUNE 2016</span>	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="{{ asset('blog_assets/img/latest-posts-2.jpg') }}" alt="post 2" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">MAURIS SIT AMET</a></h5>
                        	<span class="date">06 JUNE 2016</span>                       	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="{{ asset('blog_assets/img/latest-posts-3.jpg') }}" alt="post 3" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">NAM EGET <br> PULVINAR ANTE</a></h5>
                        	<span class="date">05 JUNE 2016</span>                        	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="{{ asset('blog_assets/img/latest-posts-4.jpg') }}" alt="post 4" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">VIVAMUS ET TURPIS LACINIA</a></h5>
                        	<span class="date">04 JUNE 2016</span>                     	
                        </div>    
                        <div class="clearfix"></div>
                    </div> --}}
                    
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- FOLLOW US -->                             
            <div class="widget follow-us">
            	<h3 class="widget-title">
                	Follow Us
                </h3>
            	<div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                
                </div>
            	<div class="clearfix"></div>
            </div>            


            <!-- TAGS -->                            
            <div class="widget tags">
            	<h3 class="widget-title">
                	Tags
                </h3>
            	<div class="tags-container">
                    <a href="#">Audio</a>
                    <a href="#">Travel</a>
                    <a href="#">Food</a>
                    <a href="#">Event</a>
                    <a href="#">Wordpress</a>
                    <a href="#">Video</a>
                    <a href="#">Design</a>
                    <a href="#">Sport</a>
                    <a href="#">Blog</a>
                    <a href="#">Post</a> 
                    <a href="#">Img</a>
                    <a href="#">Masonry</a>                                    
                </div>
            	<div class="clearfix"></div>
            </div> 


            <!-- ADVERTISING -->                           
            <div class="widget advertising">
				<div class="advertising-container">
                	<img src="{{ asset('blog_assets/img/350x300.png') }}" alt="banner 350x300">
                </div>
			</div>


            <!-- NEWSLETTER -->                          
            <div class="widget newsletter">
            	<h3 class="widget-title">
                	Newsletter
                </h3>
            	<div class="newsletter-container">
					<h4>DO NOT MISS OUR NEWS</h4>
                    <p>Sign up and receive the <br> latest news of our company</p> 
                    <form>
                       <input type="email" class="newsletter-email" placeholder="Your email address...">
                       <button type="submit" class="newsletter-btn">Send</button>
                  	</form>                                  
                </div>
            	<div class="clearfix"></div>
            </div>  
            
        </div> <!-- #SIDEBAR -->
        
   		<div class="clearfix"></div>
        
        
    </section>

    
    <!-- *****************************************************************
    ** Footer ************************************************************
    ****************************************************************** -->    
    
    <footer class="tada-container">
    
    
    	<!-- INSTAGRAM -->    
    	<div class="widget widget-gallery">
    		<h3 class="widget-title">INSTAGRAM</h3>
    		<div class="image">
            	<a href="#"><img src="{{ asset('blog_assets/img/img-gallery-1.jpg') }}" alt="image gallery 1"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-2.jpg') }}" alt="image gallery 2"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-3.jpg') }}" alt="image gallery 3"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-4.jpg') }}" alt="image gallery 4"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-5.jpg') }}" alt="image gallery 5"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-6.jpg') }}" alt="image gallery 6"></a>
            </div>
            <div class="clearfix"></div>
    	</div>
        
        
        <!-- FOOTER BOTTOM -->        
        <div class="footer-bottom">
        	<span class="copyright">Theme Created by <a href="#">AD-Theme</a> Copyright © 2016. All Rights Reserved</span>
        	<span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>
        
        
    </footer>
    
    
    <!-- *****************************************************************
    ** Script ************************************************************
    ****************************************************************** -->	
	
	<script src="{{ asset('blog_assets/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('blog_assets/js/slippry.js') }}"></script>
    <script src="{{ asset('blog_assets/js/main.js') }}"></script>
    @yield('js')
</body>
</html>
