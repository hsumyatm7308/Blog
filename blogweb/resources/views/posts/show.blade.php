@extends('layouts.adminindex')
@section('feed')

        <!-- Post -->
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="single.html">{{$post->title}}</a></h2>
				<p class="mt-2">{{$post->description}}</p>
			</div>
			<div class="meta">
				<time class="published" datetime="2015-11-01">{{date('d F Y')}}</time>
				<a href="#" class="author"><span class="name">Jane Doe</span>   
                <img src="{{ asset('assets/img/posts/165a9264302f38photo_2024-01-09_21-56-02.jpg') }}" alt="Post Image">

			</div>
		</header>
		<a href="" class="image featured"><img src="{{asset($post -> image)}}" alt="" /></a>
		<p>{{$post->content }}</p>
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

