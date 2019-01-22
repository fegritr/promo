

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>


  </body>

</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>
<script>
      function copyButton(element){
      
      var copyText = document.getElementById(element);
      copyText.select();
      document.execCommand("copy");

      }
</script>
         <script>  
         $(function(){  
          $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
          });
         });
         </script>
