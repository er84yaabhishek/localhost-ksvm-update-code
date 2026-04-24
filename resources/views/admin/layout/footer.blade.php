

</div>
</div>
{{-- <script>
    "use strict";
    var mainurl = "https://codecanyon8.kreativdev.com/superv/demo";
    var imgupload = "https://codecanyon8.kreativdev.com/superv/demo/admin/summernote/upload";
    var storeUrl = "";
    var removeUrl = "";
    var rmvdbUrl = "";
    var loadImgs = "";
    var audio = new Audio("https://codecanyon8.kreativdev.com/superv/demo/public_assets/front/files/new-order-notification.mp3");
    var waiterCallAudio = new Audio("https://codecanyon8.kreativdev.com/superv/demo/public_assets/front/files/call-waiter.mp3");
    var pusherAppKey = "bd457a6ed0c247922b06";
    var pusherCluster = "ap2";
</script> --}}
<!--   Core JS Files   -->
<!-- Core JS -->
<script src="{{ public_asset('admin/assets/admin/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ public_asset('admin/assets/admin/js/plugin/vue/vue.js') }}"></script>
<script src="{{ public_asset('admin/assets/admin/js/plugin/vue/axios.js') }}"></script>
<script src="{{ public_asset('admin/assets/admin/js/core/popper.min.js') }}"></script>
<script src="{{ public_asset('admin/assets/admin/js/core/bootstrap.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ public_asset('admin/assets/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<!-- Datatable -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- jQuery Timepicker -->
<script src="{{ public_asset('admin/assets/front/js/jquery.timepicker.min.js') }}"></script>
<!-- Material Timepicker -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/mdtimepicker/mdtimepicker.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/select2/select2.min.js') }}"></script>
<!-- jQuery Scrollbar -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Bootstrap Notify -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<!-- Bootstrap Tag Input -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<!-- Dropzone JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/dropzone/jquery.dropzone.min.js') }}"></script>
<!-- DM Uploader JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/jquery.dm-uploader/jquery.dm-uploader.min.js') }}"></script>
<!-- Summernote JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/summernote/summernote-bs4.js') }}"></script>
<!-- JS color JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/jscolor/jscolor.js') }}"></script>
<!-- Atlantis JS -->
<script src="{{ public_asset('admin/assets/admin/js/atlantis.min.js') }}"></script>
<!-- Fontawesome Icon Picker JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/fontawesome-iconpicker/fontawesome-iconpicker.min.js') }}">
</script>
<!-- Lazyload JS -->
<script src="{{ public_asset('admin/assets/admin/js/plugin/lazyload.min.js') }}"></script>
<!-- Pusher JS -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<!-- Custom JS -->
<script src="{{ public_asset('admin/assets/admin/js/custom.js') }}"></script>
<!-- Misc JS -->
<script src="{{ public_asset('admin/assets/admin/js/misc.js') }}"></script>

<div class="request-loader">
    <img src="https://codecanyon8.kreativdev.com/superv/demo/assets/admin/img/loader.gif" alt="">
</div>
<script>

    $('#description').summernote({
    height: 200,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture']]
    ]
});

    // bootstrap notify start
    function bootnotify(message, title, type) {
        var content = {};
        content.message = message;
        content.title = title;
        content.icon = 'fa fa-bell';
        $.notify(content, {
            type: type,
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            allow_dismiss: true,
            delay: 4000
        });
    }
    // bootstrap notify end
    /*****************************************************
    ==========Demo code ==========
    ******************************************************/
    // $.ajaxSetup({
    //     beforeSend: function(jqXHR, settings, event) {
    //         // /table/qrgenerate
    //         if (settings.type == 'POST' && settings.url.indexOf('admin/qr-code/generate') == -1 && settings.url.indexOf('admin/table/qrgenerate') == -1) {
    //             if ($(".request-loader").length > 0) {
    //                 $(".request-loader").removeClass('show');
    //             }
    //             if ($(".modal").length > 0) {
    //                 $(".modal").modal('hide');
    //             }
    //             if ($("button[disabled='disabled']").length > 0) {
    //                 $("button[disabled='disabled']").removeAttr('disabled');
    //             }
    //             bootnotify('This is demo version. You cannot change anything here!', 'Demo Version', 'warning')
    //             jqXHR.abort(event);
    //         }
    //     },
    //     complete: function() {
    //         // hide progress spinner
    //     }
    // });
    /*****************************************************
    ==========Demo code end==========
    ******************************************************/
    function loadWindow() {
        setTimeout(function() {
            location.reload(); // Reloads the current page
        }, 2000); // 2000 milliseconds = 2 seconds
    }

    function loadWindowRedirect(url) {
        setTimeout(function() {
            location.href = url; // Redirects to the provided URL
        }, 2000); // 2000 milliseconds = 2 seconds
    }
</script>

@stack('scripts')

</body>

</html>
