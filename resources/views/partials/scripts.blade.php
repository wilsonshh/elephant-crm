 <!-- CoreUI and necessary plugins-->
 <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
 <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('node_modules/pace-progress/pace.min.js') }}"></script>
 <script src="{{ asset('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }} "></script>
 <script src="{{ asset('node_modules/@coreui/coreui/dist/js/coreui.min.js') }}"></script>


 <!-- Plugins and scripts required by this view-->
 <script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
 <script src="{{ asset('node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
 <script src="{{ asset('js/jquery.validate.js') }}"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


 <!-- Dashboard -->
 <script src="{{ asset('js/chart.js') }}"></script>

<<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- select2-bootstrap4-theme -->
<script>
$(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});</script>
