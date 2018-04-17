<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tada & Blog - Post Full Width</title>
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
    <style type="text/css" media="screen">
        .post-text.text-content .text img{
            display: block;
            margin: 20px auto;

        }
        .post-text.text-content .text .PhotoCMS_Caption{
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>


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
        
    <header class="tada-container no-slider">
    
    
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
                    <li><a href="blog/login">Sign In</a></li>
                    <li><a href="blog/register">Register</a></li>
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
                     <li><a href="#">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index.html">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul>
                    </li>
                    <li><a href="#" class="active">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html" class="active">Post Full Width</a></li>
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
        
        
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
    <section class="tada-container content-posts post post-full-width">


        <!-- CONTENT -->
        <div class="content col-xs-12">

        
            <!-- ARTICLE 1 -->        
            <article>
                <div class="post-image">
                    <img src="{{$post->thumbnail}}" alt="post image 1"> 
                </div>
                <div class="category">
                    <a href="{{ asset('blog/category/') }}{{'/'.$post->category->slug}}">{{ $post->category->name }}</a>
                </div>
                <div class="post-text">
                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                    <h2>{{$post->title}}</h2>
                </div>                 
                <div class="post-text text-content">
                    <div class="post-by">Post By <a href="#">{{$post->user->name}}</a></div>                    
                    <div class="text">
                        {!!$post->content!!}
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="social-post">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                  
                </div>
                
            
                <!-- NAVIGATION POST -->
                <div class="navigation-post">
                    @if ($previousPost!=null)
                        <div class="prev-post">
                            <img style="height: 60px;" src="{{$previousPost->thumbnail}}">
                            <a href="{{ asset('blog/post/') }}{{'/'.$previousPost->slug}}" class="prev">
                                <i class="icon-arrow-left8"></i> Previous Posts
                                <span class="name-post">{{ str_limit($previousPost->title, 40) }}</span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    @endif
                    @if ($nextPost!=null)
                        <div class="next-post">                 
                            <a href="{{ asset('blog/post/') }}{{'/'.$nextPost->slug}}" class="next">
                                    Next Posts <i class="icon-arrow-right8"></i>                
                                    <span class="name-post">{{ str_limit($nextPost->title, 40) }}</span>
                            </a> 
                            <img  style="height: 60px;" src="{{$nextPost->thumbnail}}"">  
                            <div class="clearfix"></div>             
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                
                
                <!-- AUTHOR POST -->
                <div class="author-post-container">
                    <div class="author-post">
                        <div class="author-image">
                            <img src="{{ asset('blog_assets/img/img-author.jpg') }}">
                        </div>
                        <div class="author-info">
                            <span class="author-name">LUCAS NEWAR</span>
                            <span class="author-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor.</span>
                            <span class="author-social">
                                <a href="#"><i class="icon-facebook5"></i></a>
                                <a href="#"><i class="icon-twitter4"></i></a>
                                <a href="#"><i class="icon-google-plus"></i></a>
                                <a href="#"><i class="icon-vimeo4"></i></a>
                                <a href="#"><i class="icon-linkedin2"></i></a>            
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                        
                </div>
                
                
                <!-- RELATED POSTS -->
                <div class="related-posts">
                        <h2>Related Article</h2>
                        <div class="related-item-container">
                            <div class="related-item">
                                <div class="related-image">
                                    <img src="{{ asset('blog_assets/img/img-related-1.jpg') }}">
                                    <span class="related-category"><a href="#">Food</a></span>
                                </div>
                                <div class="related-text">
                                    <span class="related-date">03 JUNE 2016</span>
                                    <span class="related-title"><a href="#">TINCIDUNT SIT <br> ULTRICIES AMET</a></span>
                                </div>
                                <div class="related-author">
                                    Post by <a href="#">AD-THEME</a>
                                </div>
                            </div>
    
                            <div class="related-item">
                                <div class="related-image">
                                    <img src="{{ asset('blog_assets/img/img-related-2.jpg') }}">
                                    <span class="related-category"><a href="#">TECHNOLOGY</a></span>
                                </div>
                                <div class="related-text">
                                    <span class="related-date">04 JUNE 2016</span>
                                    <span class="related-title"><a href="#">VIVAMUS ET <br> TURPIS LACINIA</a></span>
                                </div>
                                <div class="related-author">
                                    Post by <a href="#">AD-THEME</a>
                                </div>
                            </div>
                            
                            <div class="related-item">
                                <div class="related-image">
                                    <img src="{{ asset('blog_assets/img/img-related-3.jpg') }}">
                                    <span class="related-category"><a href="#">Food</a></span>
                                </div>
                                <div class="related-text">
                                    <span class="related-date">01 JUNE 2016</span>
                                    <span class="related-title"><a href="#">CRAS IN NIBH NEC <br> SAPIEN BIBENDUM</a></span>
                                </div>
                                <div class="related-author">
                                    Post by <a href="#">AD-THEME</a>
                                </div>
                            </div>                                              
                        
                            <div class="clearfix"></div>
                        
                        </div>
                  </div>      
                        
                        
                  <!-- COMMENTS -->      
                  <div class="comments">
                            <h3>3 Comments</h3>
                            <div class="comments-list">
                                <div class="main-comment">
                                    <div class="comment-image-author">
                                        <img src="{{ asset('blog_assets/img/img-author.jpg') }}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula sagittis rutrum in a felis. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="reply-comment">
                                    <span class="reply-line"></span>
                                    <div class="comment-image-author">
                                        <img src="{{ asset('blog_assets/img/img-author.jpg') }}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
    
                            <div class="comments-list">
                                <div class="main-comment">
                                    <div class="comment-image-author">
                                        <img src="{{ asset('blog_assets/img/img-author.jpg') }}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula sagittis rutrum in a felis. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        
                </div>                                  
                
                
                <!-- COMMENT FORM -->
                <div class="comment-form">
                    <h3>Leavy a Reply</h3>
                    <span class="field-name">Your Name (required)</span>
                    <input type="text" class="name">
                    <span class="field-name">Your Name (required)</span>
                    <input type="text" class="email">
                    <span class="field-name">Your Message</span>
                    <textarea class="message"></textarea>
                    
                    <button type="submit">Send Comment</button>
                
                </div>
            
            
            </article>
        
        
        </div>
        
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
