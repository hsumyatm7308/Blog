


<!-- Header -->
    <header id="header">

        <nav class="main">
            <ul>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
                <li class="search ">
                    <form method="get" action="" class="px-3">
                        <input type="search" name="nav_search" id="search_btn" class="outline-none px-2"  placeholder="Search" />
                    </form>
                </li>
               
            </ul>
        </nav>

      
        <nav class="links flex justify-end">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="#">Following</a></li>
                <li><a href="{{route('posts.index')}}">Post</a></li>
                <li><a href="#">Save</a></li>
                <li><span>
                    <i class="far fa-bell"></i>    
                </span></li>
            </ul>
        </nav>
        <h1><a href="index.html" class="flex justify-center items-center space-x-2">
            <div class="w-8 h-8 bg-gray-300 flex justify-center item-center rounded-full overflow-hidden">
               <img src="{{asset('./images/avatar.jpg')}}" />    
            </div>

           <div class="text-muted small me-2"> {{ Auth::user()->name }} </div>
       </a></h1>
     
    </header>
	<!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="get" action="#">
                <input type="text"  name="query" placeholder="Search" />
            </form>
        </section>

        <!-- Links -->
        <section>
            <ul class="links">
                <li>
                    <a href="{{route('posts.create')}}">
                        <h3>Create Post</h3>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Dolor sit amet</h3>
                        <p>Sed vitae justo condimentum</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Feugiat veroeros</h3>
                        <p>Phasellus sed ultricies mi congue</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Etiam sed consequat</h3>
                        <p>Porta lectus amet ultricies</p>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions stacked">
                <li><a href="#" class="button large fit">Log In</a></li>
            </ul>
        </section>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var getsearchbtn = document.querySelectorAll('#search_btn');
           console.log(getsearchbtn)
        });
    </script>
    



