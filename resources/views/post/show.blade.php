@extends('layouts')


@section('content')
    @if(!isset(Auth::user()->username))
        <script>
            window.location="../post";
        </script>
    @endif
    <div>
        <div class="card" >
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>

                <p class="card-text">{{$post->content}}</p>

                <div class="card-footer">
                    <p>Created By {{ $post->user->username }} at {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                </div>
            </div>
        </div>


    </div>
    <script>
        $('textarea').autoResize();
    </script>
@endsection
