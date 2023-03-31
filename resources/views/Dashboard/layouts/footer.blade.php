<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('dashboard/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/morrisscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/knob.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/ui/sortable-nestable.js')}}"></script>
<script src="{{asset('dashboard/assets/js/index.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/tables/jquery-datatable.js')}}"></script>

@yield('scripts')
<script>
    setTimeout(() => {
        $('#alert').slideUp()
    }, 3000);
</script>
