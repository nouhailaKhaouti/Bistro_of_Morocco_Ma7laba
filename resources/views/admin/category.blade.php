@include('admin.head')

<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <br>
                   <h3><strong>Add Category</strong></h3>
                   <br>
                   <div id="add_category">
                        <button class="btn button" type="submit" onclick="createCategory(`{{url('category_create')}}`)"> Add category</button>
                    </div>
                   <br>
                   <br>
                   <br>
                    @include('admin.category_table')
                </div>
            </main>
            @include('admin.categoryModal')
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>

</html>