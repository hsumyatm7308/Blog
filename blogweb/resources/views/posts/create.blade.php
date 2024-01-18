@extends('layouts.adminindex')



<!DOCTYPE html>
<html>
    <head>
        <title>Create Post</title>
    </head>
    <body>


        {{-- create post  --}}
        <section > 
            <div  class="w-[100%] bg-[#f4f4f4]">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="md:flex md:justify-flex">
                    @csrf
                    @method('POST')

                      <div class="w-full px-10 py-5  mt-10">
                        <div class="border-2 border-gray-300 border-dashed  p-6 relative">

                            <input type="file" id="file" name="image" class="w-full h-full absolute inset-0 z-50 opacity-0" onchange="fileview(event)" />
                            <div class="text-center">
                                <img id="preview" src="{{asset('images/logo.jpg')}}" class="w-20 h-20 object-cover  mx-auto" />
                                <h3 class="text-gray-900 font-medium mt-2">
                                    <label for="file" class="">
                                        <span>Click here to upload your</span>
                                        <span class="text-indigo-600">file</span>
                                    </label>
                                </h3>
                                <span class="text-gray-500 text-xs mt-1">JPG,PNG,GIT,ICO</span>
                            </div>

                        </div>
                      </div>
                
                   <div class="w-full h-full px-10  mt-10" >
                    <div class="md:grid md:grid-cols-2 md:gap-3">
                        <div class="w-full mb-3 me-10">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="w-full" placeholder="Enter your title">
                        </div>
                        <div class="w-full mb-3 ">
                            <label for="tag_id">Tag</label>
                            <input type="text" name="tag_id" name="tag_id" id="tag_id" class="w-full" placeholder="Tag">
                        </div>
                        <div class="md:col-span-2 w-full mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="w-full" placeholder="Description">
                        </div>
                        <div class="md:col-span-2 w-full mb-3" >
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="w-full" cols="30" rows="10"></textarea>
                        </div>

                        <div class="md:col-span-2 w-full mb-3 text-end space-x-2" >
                           <button type="button" class=""> Cancle</button>
                           <button type="subbmit" class="bg-gray-300"> Submit</button>
                        </div>
                    </div>




                   </div>
                </form>
                
            </div>
        </section>
        
    </body>
</html>


@section('script')

 <script>

function fileview(event){
        // console.log(event);
        const getinput = event.target;
        // console.log(getinput);

        const getpreview = document.getElementById('preview');
        // console.log(getpreview.src);

        // var filereader = new FileReader();  //object 
        // filereader.readAsDataURL(getinput.files[0]); //method

        // console.log(getinput.files);
        // console.log(getinput.files[0]);
        // console.log(getinput.files[0].size);

       //object // URL.createObjectURL()//create temporarity file / binary code change
        // console.log(URL.createObjectURL(getinput.files[0]));

        getpreview.src = URL.createObjectURL(getinput.files[0]);


    }
 </script>
@endsection