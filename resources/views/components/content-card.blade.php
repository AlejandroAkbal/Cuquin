<li class="card flex-column flex-md-row overflow-hidden">

    @if ($attributes->has('img'))

        <img src="{{$img}}"
             class="card-img-top recipe-img" style="object-fit: cover" alt="Image"/>

    @endif

    <div class="card-body">
        <h5 class="card-title font-weight-bold">{{$attributes->get('title')}}</h5>

        <p class="card-text">{{$attributes->get('text')}}</p>

        {{$slot}}
    </div>

</li>
