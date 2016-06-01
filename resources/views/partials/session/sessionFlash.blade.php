<script src="/js/funcionalidad/sessionFlash.js" charset="utf-8"></script>

    <script type="text/javascript">
        @if (!is_null(Session::get('message_Success')))
            toastr["success"]("{{ Session::get('message_Success') }}");
        @endif
        @if (!is_null(Session::get('message_Negative')))
            toastr["error"]("{{ Session::get('message_Negative') }}");
        @endif
    </script>