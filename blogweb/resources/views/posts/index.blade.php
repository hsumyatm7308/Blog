@extends('layouts.adminindex')
@section('feed')

        <!-- Post -->
	@foreach($posts as $id => $post)
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></h2>
				<p class="mt-2">{{$post->description}}</p>
				<div class="mt-3 text-xs text-[#2ebaae]">
					<p>{{$post->status->name}}</p>
				</div>

			</div>
			<div class="meta">
				<time class="published" datetime="2015-11-01">{{date('d F Y')}}</time>
				<a href="#" class="author"><span class="name">{{$post->user['name']}}</span>
					<img src="{{$post->image}}" alt="" />
				</a>
			</div>
		</header>
		<a href="{{route('posts.show',$post->id)}}" class="image featured"><img src="{{asset($post->image)}}" alt="" /></a>
		<p>{!! Str::limit($post->content, 400) !!}</p>
		<footer class="mt-4">
			<ul class="actions">
				<li><a href="{{route('posts.show',$post->id)}}" class="button large">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">General</a></li>
				<li><a href="#" class="icon solid fa-heart">28</a></li>
				<li><a href="#" class="icon solid fa-comment">128</a></li>
			</ul>
		</footer>
	</article>
	@endforeach


	{{$posts->links()}}
	




@endsection
