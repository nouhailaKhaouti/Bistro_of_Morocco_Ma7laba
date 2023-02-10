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
                    <h3><strong>Add Product</strong></h3>
                    <br>
                    <div id="add_product">
                        <button class="btn button" type="submit" onclick="createProduct(`{{url('product_create')}}`)"> Add product</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    @include('admin.Product_table')
                </div>
            </main>
            @include('admin.ProductModal')
            @include('admin.footer')
        </div>
    </div>
    
    @include('admin.script')
</body>

</html>