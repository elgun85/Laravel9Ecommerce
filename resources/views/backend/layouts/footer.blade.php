<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('admin/')}}/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('admin/')}}/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('admin/')}}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('admin/')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin/')}}/js/off-canvas.js"></script>
<script src="{{asset('admin/')}}/js/hoverable-collapse.js"></script>
<script src="{{asset('admin/')}}/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin/')}}/js/dashboard.js"></script>
<script src="{{asset('admin/')}}/js/data-table.js"></script>
<script src="{{asset('admin/')}}/js/jquery.dataTables.js"></script>
<script src="{{asset('admin/')}}/js/dataTables.bootstrap4.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
<!-- End custom js for this page-->
@yield('toastr_js')
@yield('summernote_js')
@yield('prod_color')



<script src="{{asset('admin/')}}/js/jquery.cookie.js" type="text/javascript"></script>


@livewireScripts

@stack('script')

</body>

</html>

