@extends('layouts.admin')

@section('css')
<link href="{{asset('assets/plugins/gridgallery/css/component.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
  @include('admin.partial.flash')
  <div id="grid-gallery" class="grid-gallery">
      <section class="grid-wrap">
          <ul class="grid">
              <li class="grid-sizer"></li>
              @if(isset($photos))
                @foreach($photos as $photo)
              <li>
                  <figure>
                      <img src="{!!asset($photo->file)!!}" alt="img01"/>
                      <figcaption><h3>Created at: {{$photo->created_at->diffForHumans()}}</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
                  </figure>
              </li>
              @endforeach
            @endif
          </ul>
      </section>
</div>
@endsection

@section('script')
<script src="{{asset('assets/plugins/gridgallery/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/plugins/gridgallery/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets/plugins/gridgallery/js/classie.js')}}"></script>
<script src="{{asset('assets/plugins/gridgallery/js/cbpgridgallery.js')}}"></script>
@endsection
