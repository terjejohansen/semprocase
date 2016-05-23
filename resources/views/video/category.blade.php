@section('content')

<div class="container">
    <div class="video-container">
        <div class="video-content">
            <h1 class="video-title -no-margin h4">Videoer i kategorien {{ $category->caName}}. </h1>
        </div>
    </div>
    <?php $i = 0; ?>
    
      
     @if(!$category->videos->isEmpty() )    
        @foreach($category->videos as $video)
        
        <?php if($i == 0) { ?>
            <div class="row -gutter">
        <?php } ?> 
                
        <?php if($i != 0 && $i % 3 == 0) { ?>
            </div><div class="row -gutter">
        <?php } ?>
            <div class="col -md-4">
                <a class="video-list-single" href="{{ $video->ytShowVideoLink }}" style="background-image: url('{{ $video->ytBackgroundLink }}')">
                    <span class="video-list-title">{{ $video->ytTitle }} </span>
                    <img src="/assets/media/play.png" class="icon-play-video" />
                </a>
            </div>
        <?php $i++;?>
            <div class="row">
                <div class="col pagination-container">
                    
                </div>
            </div>
        @endforeach
    @else
        <div class="video-container">
            <div class="video-content">
                <h5 class="video-title -no-margin">Det finnes ingen videoer i denne kategorien enda</h5>
            </div>
        </div>
    @endif
    
    


@stop