@include('admin.head')
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            @include('admin.body')
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>

</html>