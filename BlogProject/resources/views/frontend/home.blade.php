
@extends('base')

@section('content')

@include('frontend/header')
<style>


.post-block {
	background: #fff;
	padding: 25px;
	margin-bottom: 25px;
	border-radius: 5px;
	overflow: hidden;
	box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
	transition: all 0.2s;
}
.post-block img.author-img {
	height: 45px;
	width: 45px;
	border-radius: 45px;
}
.post-block img.author-img.author-img--small {
	height: 30px;
	width: 30px;
}
.post-block__content img,
.post-block__content video,
.post-block__content audio {
	max-width: 100%;
	border-radius: 5px;
}
.post-block .comment-view-box__comment {
	border-radius: 5px;
	background: #f5f5f5;
	padding: 15px;
}

</style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card" style="border-radius: 0px">
                    <div class="card-body d-flex flex-column align-items-center">
                        @if ($user->image)
                        <img
                            src="{{ asset('public/Image/'.$user->image) }}" alt="Profile"  width="150px" height="150px">    
                        @else
                        <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnBFM8UJX8hK5mHqhOs8B7ntumfzVf1N5i_XmeBzE-uQ&usqp=CAU&ec=48600112" alt="Profile"  width="150px" height="150px">

                        @endif
                        <h5 class="mt-3">{{ $user->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card" style="border-radius: 0px">
                    <div class="card-body">
                        <form action="{{ route('home') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea name="content" placeholder="Write a Blog" id="" cols="30" rows="5" class="form-control"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="d-flex mt-3">
                                <input type="submit"  value="Post Blog" class="btn btn-success ">
                                <label for="file" class="ms-3" style="cursor: pointer">
                                    Attach Image
                                </label>
                                <input type="file" name="image" style="display:none" id="file">
                            </div>

                        </form>
                    </div>
                </div>

               @foreach ($blog as $item)
               <div class="post-block mt-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex mb-3">
                        <div class="mr-2">
                            <a href="#!" class="text-dark">   
                                 @if ($item->user->image)
                                <img
                                    src="{{ asset('public/Image/'.$item->user->image) }}" alt="Profile" class="author-img" >    
                                @else
                                <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnBFM8UJX8hK5mHqhOs8B7ntumfzVf1N5i_XmeBzE-uQ&usqp=CAU&ec=48600112" alt="Profile"  class="author-img">
        
                                @endif</a>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0"><a href="#!" class="text-dark">{{ $item->user->name }}</a></h5>
                            <p class="mb-0 text-muted">5m</p>
                        </div>
                    </div>
                   
                </div>
                <div class="post-block__content mb-2">
                    <p>{{ $item->content }}</p>
                    @if ($item->image)
                    <img src="{{ asset('public/BlogImage/'.$item->image) }}" height="200px"  alt="Content img">
                  
                    @endif
                </div>
              
               
            </div>
               @endforeach
            </div>
        </div>
    </div>

@endsection
