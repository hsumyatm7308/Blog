@extends('layouts.adminindex')
@section('feed')

        <!-- Post -->
	<article class="post pb-10">

       
		<header>
			<div class="title">
              
                    <h2><a href="single.html">{{$post->title}}</a></h2>
                    <p class="mt-2">{{$post->description}}</p>

			        <div class="mt-3 text-xs text-[#2ebaae]">
						<p>{{$post->status->name}}</p>
					</div>

               
			</div>

        

			<div class="meta">

                <div class="flex items-center hover:text-[#2ebaae]">
                    <a href="{{route('posts.edit',$post->id)}}" class="w-full flex justify-end border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>   
                    </a>
                </div>
    
              
				<time class="published" datetime="2015-11-01">{{date('d F Y')}}</time>
				<a href="#" class="author"><span class="name">{{$post->user['name']}}</span>   
                <img src="{{ asset('assets/img/posts/165a9264302f38photo_2024-01-09_21-56-02.jpg') }}" alt="Post Image">



			</div>

          
   
		</header>
		<a href="" class="image featured"><img src="{{asset($post -> image)}}" alt="" /></a>
		<p>{{!!$post->content!!}}</p>

		{{-- tag  --}}
		<div class="mt-5 mb-5 space-x-2">
			<span>Tags</span>
				
			<a class="bg-gray-100 rounded-full text-center px-2 py-1">{{$post->tag_id}}</a>
			<a class="bg-gray-100 rounded-full text-center px-2 py-1">{{$post->tag_id}}</a>
		</div>


		<footer class="mt-4">
			<ul class="actions">
				<li><a href="{{route('posts.index')}}" class="button large">Back</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">General</a></li>
				<li><a href="#" class="icon solid fa-heart">28</a></li>
				<li><a href="#" class="icon solid fa-comment">128</a></li>
			</ul>
		</footer>
	</article>





@endsection

