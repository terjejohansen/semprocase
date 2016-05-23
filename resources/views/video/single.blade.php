<?php setlocale(LC_TIME, "no_NO"); ?>
@section('content')
    <div class="embed-responsive embed-responsive-16by9">
    
        <div style="background-color: black; color: white;" class="embed-responsive-item" src="{{ $videos->ytVideoLink }}?&amp;modestbranding=1&amp;autoplay=1&amp;showinfo=0&amp;rel=0" allowfullscreen="">
            Her skulle det kommet film, men sliter med Header problematikk grunnet X-Frame-Options : DENY
        </div>
    </div>
    <article class="video-container">
        <div class="video-content">
            <h1 class="video-title h4">{{ $videos->ytTitle }}</h1>
            <div class="video-published">
                <img src="/assets/media/calendar.png" class="icon-published-video" />
                <span>{{ strftime('%d. %B %Y', strtotime($videos->created_at)) }} </span>
            </div>
            <div class="video-categories">
                                <span class="video-categories-title">Kategorier:</span>
                                @foreach($videos->categories as $category)
										<span class="video-category">
                                            <a href="/markedskommentar">{{ $category->caName}}</a>
										</span>
                                @endforeach
                                        
                        </div>
            <p class="lead">{{ $videos->ytDescription}}</p>

        </div>
    </article>
    
    
@stop 
