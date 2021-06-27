{{-- <script src="{{ url('gull/dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script> --}}
{{-- <script src="{{ url('gull/dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script> --}}
<script src="{{ url('gull/dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/script.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/sidebar.large.script.min.js')}}"></script>
{{-- <script src="{{ url('gull/dist-assets/js/plugins/echarts.min.js')}}"></script> --}}
{{-- <script src="{{ url('gull/dist-assets/js/scripts/echart.options.min.js')}}"></script> --}}
<script src="{{ url('gull/dist-assets/js/plugins/datatables.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/dashboard.v4.script.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/widgets-statistics.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/plugins/apexcharts.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/apexSparklineChart.script.min.js')}}"></script>
<script src="{{ url('gull/dist-assets/js/scripts/customizer.script.min.js')}}"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<script>
    $(document).ready(function(){
      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
    
          // Store hash
          var hash = this.hash;
    
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function(){
       
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
      
      $(window).scroll(function() {
        $(".slideanim").each(function(){
          var pos = $(this).offset().top;
    
          var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
              $(this).addClass("slide");
            }
        });
      });
      
    })
    </script>