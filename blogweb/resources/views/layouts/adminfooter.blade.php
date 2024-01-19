

<!-- Scripts -->
{{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="{{asset('assets/js/browser.min.js')}}"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
{{-- boostrap  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- custom js  --}}
<script src="{{asset('assets/js/main.js')}}"></script>

{{-- extra js  --}}
@yield('script');


</body>

</html>