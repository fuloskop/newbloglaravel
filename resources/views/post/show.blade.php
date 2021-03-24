@extends('layouts')


@section('content')

    <div>
        <div class="card" >
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>

                <p class="card-text">{{$post->content}}</p>

                <div class="card-footer">

                    <p>@if($post->user->avatar_adress!=null)
                            <img src="http://127.0.0.1:8000/images/{{$post->user->avatar_adress}}"  width="35" height="35">
                        @endif Created By <strong> {{ $post->user->username }}</strong> at {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                </div>
            </div>
        </div>


    </div>
    <script>
        $('textarea').autoResize();
    </script>
@endsection
