@if (count($breadcrumbs))

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb rounded-0 py-4 m-0 px-1 px-md-4">
                    @foreach ($breadcrumbs as $breadcrumb)
                    
                        @if ($breadcrumb->url && !$loop->last)
                            <li class="breadcrumb-item align-middle"><h4 class="font-weight-bolder"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></h4></li>
                        @else
                            <li class="breadcrumb-item align-middle active"><h4 class="font-weight-bolder">{{ $breadcrumb->title }}</h4></li>
                        @endif
            
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

@endif