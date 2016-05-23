@section('content')
    
    
        <div class="row">
            <div class="col">
                <a class="video-list-single -featured" href="{{ $highlighted->ytShowVideoLink }}" style="background-image: url(' {{ $highlighted->ytBackgroundLink }}')">
                    <span class="video-list-title -featured">{{ $highlighted->ytTitle }} </span>
                        <img src="/assets/media/play.png" class="icon-play-video" />
                </a>
            </div>
        </div>
   
    <?php $i = 0; ?>
    @foreach($videos as $video) 
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
    @endforeach 
    <div class="row">
        <div class="col pagination-container">
            {!! $videos->render() !!}
        </div>
    </div>
@stop