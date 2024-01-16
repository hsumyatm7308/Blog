@extends('layouts.adminindex')


<!DOCTYPE html>
<html>
    <head>
        <title>Create Post</title>
    </head>
    <body>


        {{-- create post  --}}
        <section>
            <div  class="w-[100%] h-[100%] bg-[#f4f4f4] flex justify-center items-center">
                <form action="">
                    <div>
                    
                        <div class="border-2 border-gray-300 border-dashed rounded-lg p-6 relative">

                            <input type="file" id="file" class="w-full h-full absolute inset-0 z-50 opacity-0" onchange="fileview(event)" />
        
                            <div class="text-center">
        
                                <img id="preview" src="img/upload1.png" class="w-20 h-20 object-cover rounded-full mx-auto" />
        
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
                    <div class="">
                        <input type="text" class="" placeholder="Title">
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