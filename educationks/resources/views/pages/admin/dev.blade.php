<div class="row">
    <br>
    {!! "";$i=0  !!}
    @foreach($images as $image)
    @if($i == 0)
    <div class="row">
        @endif
        <div class='col-sm-3' style="    ">
            <div class="thumbnail" data-toggle="modal" data-target="#editImage{{ $image['id'] }}"  style="cursor: pointer; ">
                @if(isset($image['attachment']['file_name']))
                <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_MEDIUM.'/'.$image['attachment']['file_name']) }}' class='cover' style="min-height: 150px; max-height:150px;" />
                @else
                <img src='{{ $autonet_url.$image['attachment']['url'] }}' class='cover' style="min-height: 150px; max-height:150px;" />
                @endif
                <div class="caption">
                    <h4 style="word-wrap: break-word;"> 

                        @if(strlen($image['name']) >= 19)
                        {{ substr($image['name'],0,18) }}...
                        @else
                        {{ $image['name'] }}
                        @endif
                    </h4>                    
                    <small style="word-wrap: break-word;">
                        @if(isset($image['description']))
                        @if(strlen($image['description']) >= 25)                       
                        {{ substr($image['description'],0,24) }}...
                        @else
                        {{ $image['description'] }}
                        @endif
                        @else
                        &nbsp;
                        @endif
                    </small>
                    <p>
                        <span>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-dismiss="modal" data-target="#deleteImage{{ $image['id'] }}"><span class="fa fa-remove"></span></a>
                        </span>
                    </p>
                </div>
            </div>
        </div>

        {!! ""; $i++ !!}
        @if($i == 4)
        {!! ""; $i = 0 !!}
    </div>
    @endif
    @endforeach
    {!! $paginate->render() !!}
</div>