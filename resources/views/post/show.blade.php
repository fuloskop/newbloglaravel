@extends('layouts')


@section('content')

    <div>
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <h2 class="card-title col-sm-8">{{$post->title}}</h2>
                    <div class="col-sm-4">
                    <button id="like" class="btn btn-success  m-2 like-but" >
                        <i class="fas fa-thumbs-up"></i> Like  (<b id="likevalue">{{$post->likes['likes'] }}</b>) </button>
                    <button id="dislike" class="btn btn-danger m-2 like-but">
                        <i class="fas fa-thumbs-down"></i> Dislike  (<b id="dislikevalue">{{$post->likes['dislikes']}}</b>)  </button>
                    </div>
                </div>
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





        $(".like-but").click(function(event){
            event.preventDefault();

            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    status:this.id,
                    post_id:{{$post->id}},
                    user_id:{{ Auth::user()->id }},
                    "_token": "{{ csrf_token() }}"
                },
                success:function(response){

                    $("#likevalue").text(response['likes']);
                    $("#dislikevalue").text(response['dislikes']);
                },
            });
        });
    </script>
@endsection
