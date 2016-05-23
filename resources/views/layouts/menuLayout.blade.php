@extends('layouts.mainlayout')

@section('menu')

            <header class="page-row">
                <nav>
                    <div class='top-bar'>
                        <a href='http://getv.no' style='float:left;'>
                            <img src='http://getv.no/assets/media/images/ge-tv-logo.png' alt='Logo: GE-TV' style='width:90px; height: 22px;' class='logo-tv'>
                        </a>
                        <div id='container'>
                            <div class='clear -col-right'>
                                {!! $menu["topMenu"] !!}
                            </div>
                        </div>
                    </div>    
                    <div class="branding-bar">
                        <div id="container" style="max-width: 60em;">
                            <div class="clear branding-bar-content">
                                {!! $menu["middleMenu"] !!}
                            </div>
                        </div>
                    </div>
                </nav>
                <nav>
                    <div id="container" style="max-width: 60em;">
                        <div class="category-bar category-toggle">
                            
                            <ul class="category-list js-menu category-collapsed">
                                {!! $menu["bottomMenu"] !!}
                               <div class="btn-primary category-open-all" id="btn-more-power">Se alle</div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>             
    <?php echo $content; ?>
@stop