
@include('layouts.adminheader')

	<!-- Wrapper -->
	<div id="wrapper">

        {{-- Nav Header  --}}
        @include('layouts.adminnavheader')

        {{-- Menu  --}}
        {{-- @include('layouts.adminnavheader') --}}

        {{-- Main Post  --}}
        <div id="main">

           @yield('feed')
        </div>


        {{-- Sidebar  --}}
        @yield('sidebar')
        {{-- @include('layouts.adminsidebar') --}}

	</div>


@include('layouts.adminfooter')






