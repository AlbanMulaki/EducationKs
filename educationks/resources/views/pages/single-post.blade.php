@extends('layouts.default')





@section('content')


<!-- START HEADER SINGLE POST -->


<div class="single-background">
    <div class="single-breadcrumb">
        <ul class="breadcrumb">
            <li><a href="{{ action('HomeController@getIndex') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ action('HomeController@getIndex',[$post->category['slug_'.app()->getLocale()]]) }}">{{ $post->category['name_'.app()->getLocale()] }}</a></li>
            <li class="active">{{ $post['title_'.app()->getLocale()] }}</li>
        </ul>
    </div>
    <div class="single-post-text">
        <p>{{ $post['title_'.app()->getLocale()] }}</p>
    </div>
    <!--<img src="assets/img/Autobiography_10_v1.jpg">-->
</div>
<!-- END HEADER SINGLE POST -->

<!-- START SINGLE POST -->

<div id="single-post-page" class="container">   
    <div class="col-lg-8 col-md-8 col-sm-12 popularn">
        <div class="col-lg-12 col-md-12 col-sm-12 popnews ">

            <div class="blog-single">
                <h3>{{ $post['title_'.app()->getLocale()] }}</h3>
            </div>

            <div class="middle-drawing"></div>

            <div class="blog-image">
                <div class="rectangle-single-post">
                    <div class="rectangle-date">
                        <i class="fa fa-clock-o"></i>
                        <span>{{ date("M",strtotime($post->created_at)) }}</span>
                        {{ date("d",strtotime($post->created_at)) }}
                        <span><em>/</em> {{ date("Y",strtotime($post->created_at)) }}</span>
                    </div>
                </div>
                <a class="example-image-link" href="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE."/".$post->featureImage['file_name']) }}" data-lightbox="test">
                    <img class="img-responsive" src="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE."/".$post->featureImage['file_name']) }}" alt="{{ $post['title_'.app()->getLocale()] }}"/>
                </a>
            </div>

            <div class="blog-text">
                <p>{!! $post['description_'.app()->getLocale()] !!}</p>
            </div>
            <div class="clear"></div>   

            <div>@lang('website.share'):</div>
            <div class="socialshare">
                <div class="ikonat fb">
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="ikonat tw">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
                <div class="ikonat go-p">
                    <a href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
                <div class="ikonat lk">
                    <a href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>  
                <div class="ikonat pint">
                    <a href="#">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </div>  



            </div>

            <div class="clear"></div>   

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 popnews ">
            <div class="popularnews">   
                <h2><span class="orangecolor">@lang('website.related')</span> @lang('website.news')</h2>
            </div>      

            @foreach($relatedPost as $postRelated)
            <div class="col-lg-6 col-sm-6 col-xs-6 newsposts equalh">
                <a href="{{ action('HomeController@getIndex',[$postRelated->category['slug_'.app()->getLocale()],$postRelated['slug_'.app()->getLocale()]]) }}">
                    <img class="img-responsive" src="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_THUMBNAIL."/".$postRelated->featureImage['file_name']) }}"  alt="{{ $postRelated['title_'.app()->getLocale()] }}"></a>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6 newspoststext equalh">
                <p><span class='datetext orangecolor'>{{ date("d M Y",strtotime($postRelated->created_at)) }}</span></p>
                <p>{{ $postRelated['title_'.app()->getLocale()] }}</p>
            </div>
            <div class="clear"></div>   

            @endforeach

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 popnews ">
            <div class="popularnews">   
                <h2><span class="orangecolor">@lang('website.top')</span> @lang('website.news')</h2>
            </div>
            @foreach($topNews as $postNews)
            <div class="col-lg-6 col-sm-6 col-xs-6 newsposts equalh">
                <a href="{{ action('HomeController@getIndex',[$postNews->category['slug_'.app()->getLocale()],$postNews['slug_'.app()->getLocale()]]) }}">
                    <img class="img-responsive" src="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_THUMBNAIL."/".$postNews->featureImage['file_name']) }}" alt="{{ $postNews['title_'.app()->getLocale()] }}">
                </a>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6 newspoststext equalh">
                <p><span class='datetext orangecolor'>{{ date("d M Y",strtotime($postNews->created_at)) }}</span></p>
                <p>{{ $postNews['title_'.app()->getLocale()] }}</p>
            </div>
            <div class="clear"></div>                   
            @endforeach

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 gallery">
        <div class="popularnews">
            <h2>
                <span class="orangecolor">@lang('website.post')</span> @lang('website.photos')
            </h2>
        </div>
        <div class="col-lg-12 gallery-single">

            <section class="auto-pub-gallery auto-pub-section auto-pub-section--no-padding" id="gallery1-0">
                <!-- START GALLERY IN POST -->
                <div>
                    <div class="row auto-pub-gallery-row no-gutter">
                        <!-- START SECOND EXAMPLE GALLERY POPUP -->
                        <div class="second-gallery">
                            @foreach($post->postImage as  $postImage)
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-6 auto-pub-gallery-item">
                                <a class="example-image-link" href="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE."/".$postImage->galleryImage->attachment['file_name']) }}" data-lightbox="test">
                                    <img class="cover-gallery" src="{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE."/".$postImage->galleryImage->attachment['file_name']) }}" alt="{{ $postImage->galleryImage->name }}" />
                                    <span class="icon glyphicon glyphicon-zoom-in"></span>
                                </a>
                            </div>
                            @endforeach



                        </div>
                        <!-- END SECOND EXAMPLE GALLERY POPUP -->

                    </div>
                </div>

                <div class="clearfix"></div>
                <!-- END GALLERY IN POST -->
            </section>
        </div>
        <div class="ads">

            <div class="popularnews">
                <h2>
                    <span class="orangecolor">Ads</span> Section
                </h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 banner300x250">
                @if($ads[$Enum::ADS_SIDEBAR_5]->active == $Enum::ON  && strtotime($ads[$Enum::ADS_SIDEBAR_5]->expiry_date) >= strtotime(date("Y-m-d H:i:s")))
                {!! $ads[$Enum::ADS_SIDEBAR_5]->ads_content !!}
                @endif
            </div>
            <div class="clear clearfixtablet"></div>
            <div class="col-lg-4 col-md-4 col-sm-6 banner300x250">

                @if($ads[$Enum::ADS_SIDEBAR_6]->active == $Enum::ON && strtotime($ads[$Enum::ADS_SIDEBAR_6]->expiry_date) >= strtotime(date("Y-m-d H:i:s")))
                {!! $ads[$Enum::ADS_SIDEBAR_6]->ads_content !!}
                @endif
            </div>


        </div>
    </div>

    <!-- END SINGLE POST -->
    <!-- START RIGHT SIDE -->

</div>


@stop