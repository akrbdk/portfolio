<div>
    @foreach($list as $el)
        <div>
            <h2>{{ $el->title }}</h2>
            @if($el->previewImage->exists)
                <img src="{{ $el->previewImage->relativeUrl }}" width="100" />
            @endif
            {!! $el->body !!}
        </div>
    @endforeach
</div>
