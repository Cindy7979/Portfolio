@extends('layouts.app')

@section('content')
<main class="container">
    <!-- START :: Introduce -->
    <section id="intro" class="introduce">
        <div class="jumbotron">
            <h1>Hello!</h1>
            <p>...</p>
            <P>My name is Jinsuk Shin (Cindy).<br>
I would like to be considered for the position “Web Developer, Junior”.</P>
        </div>
    </section>
    <!-- END :: Introduce -->

    <!-- START :: About Me -->
    <section id="about">
        <h2>ABOUT ME</h2>
        <div class="line_thick"></div>
        <div id="sidebar">
            <div id="nav-anchor"></div>
            <nav id="stick_nav">
                <div class="profile_img thumbnail">
                    <img src="{{url(Config::get('app.configure.image'))}}/profile_img.jpg">
                </div>
                <button class="btn_download_cv">Download CV</button>
                <button class="btn_download_cv view_cv">View CV</button>
                <ul>
                    @foreach ($menus as $menu) 
                        @if ($menu->type == 2)
                            <li><a href="{{ $menu->slug }}">{{$menu->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div><!-- /sidebar -->

        <div id="content">
            <section id="cv"  class="section_cv hidden_section">
                <div class="content_bg">
                    <pre class="content_description">{!!$resume!!}</pre>
                </div>
            </section>

            <section id="introduce">
                <h3 class="sub_title">WHO I AM</h3>
                @foreach ($introduce as $intro)
                <div class="content_bg">
                    <pre class="content_description">{{$intro->description}}</pre>
                </div>
                @endforeach
            </section>
        
            <section id="career">
                <h3 class="sub_title">EXPERIENCE</h3>
                @foreach ($career as $ca)
                    <div class="content_bg">
                        <p class="job_title"><strong>{{$ca->company_name}}</strong> : {{$ca->job_title}} ( {{$ca->start_month}} to {{$ca->end_month}} )</p>
                        <p class="job_title"><strong>Main Task</strong> : </p>
                        <p class="desc_box">{{$ca->role_desc}}</p>
                    </div>
                @endforeach
            </section>

            <section id="skill">
                <h3 class="sub_title">SKILL</h3>
                <div class="content_bg">
                    @foreach ($skills as $skill)
                        <p class="desc_box">{{$skill->description}}</p>
                    @endforeach
                </div>
            </section>
        
            <section id="interest">
                <h3 class="sub_title">INTEREST</h3>
                <div class="content_bg">
                    <ul class="interest_box">
                        @foreach ($interests as $interest)
                            <li class="interest_img">
                                <div class="ch-item">              
                                    <div class="ch-info-wrap">
                                        <div class="ch-info">
                                            <div class="ch-info-front"></div>
                                            <div class="ch-info-back">
                                                <h3>{{$interest->description}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div><!-- /#content -->
    </section>
    <!-- END :: About Me -->

    <!-- START :: Portfolio -->
    <section id="portfolio">
        <h2>PORTFOLIO</h2>
        <div class="line_thick"></div>
        <ul class="container grid cs-style-3">
            @foreach ($portfolios as $portfolio)
                <li class="pf_box_size">
                    <figure>
                        <img class="pf_img" src="{{url(Config::get('app.configure.image')).$portfolio->img_name}}">
                        <figcaption>
                            <h3>{{$portfolio->title}}</h3>
                            
                            <a data-link="{{route('show', $portfolio->id)}}" class="ajaxbtn" value="{{$portfolio->id}}">VIEW</a>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
            @if($portfolios->count()%3 != 0)
                @for($i = 0; $i <= $portfolios->count()%3; $i++)
                    <li class="pf_box_size">
                        <img  class="pf_img_set" src="{{url(Config::get('app.configure.image'))}}/icons/icon_set.png">
                    </li>
                @endfor
            @endif
        </ul>

        
    </section>
    <!-- END :: Portfolio -->

    <!-- START :: Blog -->
    <!-- <section id="blog">
        <h2>BLOG</h2>
        <div class="line_thick"></div>
        
        <div class="blog_"></div>
    </section> -->
    <!-- END :: Blog -->

    <!-- START :: Contact -->
    <section id="contact">
        <h2>CONTACT</h2>
        <div class="line_thick"></div>

        <div class="contact_bg">
            <div class="contact_info">
                <h1>JINSUK SHIN :: CINDY</h1>
                <h6><i class="fa fa-map-pin" aria-hidden="true"></i>AUCKLAND / NEW ZEALAND</h6>
                <p>I am currently a student at TIA but I am available for hire, and looking for a part-time position. Feel free to contact me on <a href="mailto:cindy79.work@gmail.com">cindy79.work@gmail.com</a>.</p>
            </div>
        </div>
    </section>
    <!-- END :: Contact -->    
</main>
@endsection
