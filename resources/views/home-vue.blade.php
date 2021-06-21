
<!DOCTYPE html>
<html lang="en" dir="">

@include('adminlayouts.header')

<body class="text-left">

    <div id="app" >
        
       {{-- nav bar --}}
       <router-view> </router-view>
       {{-- side bar --}}
        <!-- =============== Left side End ================-->
        {{-- admin home --}}
    </div>
    <!-- ============ Search UI Start ============= -->
    {{-- search ui --}}
    <!-- ============ Search UI End ============= -->
     

        {{-- <script src="{{asset('js/app.js')}}"> </script> --}}
        <script src="{{mix('js/app.js')}}"> </script>
        @include('adminlayouts.scripts')

</body>

<script>
    
</script>
</html>