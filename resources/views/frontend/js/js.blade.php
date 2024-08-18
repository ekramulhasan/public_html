<script src="{{ asset('assets') }}/js/jquery-1.12.4.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/chosen.min.js"></script>
<script src="{{ asset('assets') }}/js/countdown.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.scrollbar.min.js"></script>
<script src="{{ asset('assets') }}/js/lightbox.min.js"></script>
<script src="{{ asset('assets') }}/js/magnific-popup.min.js"></script>
<script src="{{ asset('assets') }}/js/slick.js"></script>
<script src="{{ asset('assets') }}/js/jquery.zoom.min.js"></script>
<script src="{{ asset('assets') }}/js/threesixty.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery-ui.min.js"></script>
<script src="{{ asset('assets') }}/js/mobilemenu.js"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
<script src="{{ asset('assets') }}/js/functions.js"></script>

{{-- toaster js --}}
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



@stack('frontend_js')
