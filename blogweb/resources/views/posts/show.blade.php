@extends('layouts.adminindex')
@section('feed')

        <!-- Post -->
	<article class="post pb-10 ">

       
		<header>
			<div class="title">
              
                    <h2><a href="single.html">{{$post->title}}</a></h2>
                    <p class="mt-2">{{$post->description}}</p>

			        <div class="mt-3 text-xs text-[#2ebaae]">
						<p>{{$post->status->name}}</p>
					</div>

               
			</div>

        

			<div class="meta">

                <div id="edit_btn" class="flex items-center hover:text-[#2ebaae] relative">
                    <a href="javascript:void(0)" class="w-full flex justify-end border-none ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>   
                    </a>


					{{-- edit modal box  --}}
 
			 
					<div id="edit_modal" class="w-52 bg-[#f4f4f4] text-start absolute right-0 top-7 px-2 py-3 hidden">
						<ul class="links">
							<li class="mb-3">
								<a href="{{route('posts.edit',$post->id)}}">
									<span><i class="far fa-edit"></i>Edit post</span>
								</a>
							</li>
							<li class="">
								<a href="#">
									<span class="text-red-500 delete-btns" data-idx="{{$post -> id}}"><i class="far fa-trash-alt"></i> Delete</span>
								</a>

								<form id="formdelete-{{$post -> id}}" action="{{route('posts.destroy',$post -> id)}}" method="POST">
									@csrf 
									@method('DELETE')
								   
								</form>
							</li>
								
								</ul>
							</div>

					{{-- edit modal box  --}}
                </div>
    
              
				<time class="published" datetime="2015-11-01">{{date('d F Y')}}</time>
				<a href="#" class="author"><span class="name">{{$post->user['name']}}</span>   
                <img src="{{ asset('assets/img/posts/165a9264302f38photo_2024-01-09_21-56-02.jpg') }}" alt="Post Image">




			</div>

          
   
		</header>
		<a href="" class="image featured"><img src="{{asset($post -> image)}}" alt="" /></a>
		<p>{{$post->content}}</p>

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
				<li><a href="#" class="icon solid fa-comment">{{$post->comments->count()}}</a></li>
			</ul>
		</footer>


	

	

	</article>

		
                <!--start message box-->
                <div class="">
                    <div class="">

						<div class="card-body  border-bottom">
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf

                                <div class="col-md-12 d-flex justify-content-between">

                                    <textarea name="description" id="description"
                                        class="form-control border-0 rounded-0 " placeholder="Comment Here..." rows="1"
                                        style="resize:none;"></textarea>

                                    <button type="submit" class="btn btn-info btn-sm text-white ms-3 bg-blue-500"><i
                                            class="fas fa-paper-plane"></i></button>

                                </div>

                                <!--start hidden field-->
                                <input type="hidden" name="commentable_id" id="commentable_id" value="{{$post->id}}" />

                                <input type="hidden" name="commentable_type" id="commentable_type "
                                    value="App\Models\Post" />
                                <!--end hidden field-->

                            </form>
                        </div>

                        <div class="card-body border-t bg-[#f4f4f4] ">
                            <ul class="list-group chat-box border-b">
                                @foreach($comments as $comment)
                                <li class="bg-[#ffff]  flex justify-between  items-center relative mt-2 mb-2 px-3 py-3 ">
								
                                    <div>
										<div class="mb-2">
										    <p>	{{ucwords($comment -> user['name'])}} </p>

											<p class="text-xs">{{$comment -> created_at -> diffForHumans()}}<p>
										</div>
                                       <div class="self-end">
										<p>{{$comment -> description}}</p>
									
										

									   </div>

                                    </div>


                                    <div class="self-end relative">
                                        
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
											  </svg>
											  
										  


										{{-- edit modal box  --}}
					
								
										<div id="edit_comment_modal" data-comment="{{$comment->id}}" class="w-32 bg-[#dddd] text-start absolute right-0 bottom-7 px-2 py-3 edit_comment_modal">
											<ul class="links space-y-3">
												<li class="">
													<a href="">
														<a href="javascript:void(0);" class="text-primary editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{ $comment->id }}"><i class="fas fa-pen"></i></a>
													</a>
												</li>
												<li class="">
													<a href="#" class="">
														<span class="text-red-500 delete-btns" data-idx="{{$post -> id}}"><i class="far fa-trash-alt"></i> Delete</span>
													</a>

													<form id="formdelete-{{$post -> id}}" action="{{route('posts.destroy',$post -> id)}}" method="POST" class="hidden">
														@csrf 
														@method('DELETE')
													
													</form>
												</li>
													
											</ul>
										</div>

										{{-- edit modal box  --}}
                                 


                                    </div>


                                </li>
                                @endforeach

								
                            </ul>
                        </div>

                    
                    </div>
                </div>
                <!--end message box-->



				 <!--Start edit model-->
 <div id="editmodal" class=" fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">

            <div class="modal-header">
                <h6 class="modal-title">Edit Form</h6>
                <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formaction" action="" method="POST" enctype="multipart/form-data">
           
                    {{csrf_field()}}
                    {{method_field('PUT')}}
            
                   <div class="row align-items-end">
                    

                    <div class="col-md-7 form-group">
                        <label for="editclassdate"> Class Date <span class="text-danger">*</span></label>

    
                        <input type="date" name="editclassdate" id="editclassdate" class="form-control-sm">

                       </div>


                       <div class="col-md-7 form-group">
                        <label for="editpost_id"> Class <span class="text-danger">*</span></label>

                        {{-- <select name="editpost_id" id="editpost_id" class="form-control form-control-sm rounded-0">
                            @foreach($posts as $id=>$post)
                            <option value="{{$id}}">{{$post->title}}</option>
                        @endforeach --}}
                        

                           
                            
                        </select>

                       </div>

                       <div class="col-md-12 form-group">
                        <label for="editurl"> Class <span class="text-danger">*</span></label>

                        <input type="text" name="editurl" id="editurl" class="form-control">
                       </div>


                    
                    </div>
               
                       <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm rounded-0">Update</button>                             
                       </div>                  
                   </div>
    
               </form>
            </div>
        </div>
    </div>
</div>
<!--End edit model-->






@endsection

@section('script')
    <script>
		var getedit_btn = document.getElementById('edit_btn');
		var getedit_modal = document.getElementById('edit_modal');

		getedit_btn.addEventListener('click',function(){
            getedit_modal.classList.toggle('hidden');
		});

		$(document).ready(function(){
			$(".delete-btns").click(function(){
				var getidx = $(this).data('idx');
				if(confirm(`Are you sure , You want to delete ${getidx}?`)){
					$("#formdelete-"+getidx).submit();
					return true;
				}else{
					return false;
				}
		    });

			$(".edit_comment_modal").click(function(){
				var getcommentid = $(this).data('comment');
				console.log('hi'+getcommentid)
			})





			
        });


		//start edit form 
$(document).on('click','.editform',function(e){
    // console.log($(this).attr('data-name'),$(this).attr('data-id'))

    $("#editclassdate").val($(this).data('classdate'));
    $("#editpost_id").val($(this).data('post'));
    $("#editurl").val($(this).data('url'));
    

    const getid = $(this).attr('data-id');
            
    $("#formaction").attr("action",`/edulinks/${getid}`);

    e.preventDefault();
});
//end edit form

    

	


	</script>
@endsection

