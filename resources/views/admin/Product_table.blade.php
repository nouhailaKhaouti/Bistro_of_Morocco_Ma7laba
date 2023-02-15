<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        product DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>product name</th>
                    <th>product price</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>product name</th>
                    <th>product price</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{ route('deleting',$product->id) }}"class="btn btn-sm btn-outline-danger" onclick="return confirm('are you sure ,you want to delete this product ')">delete</a>
                    </td>
                    <td> 
                        <button class="btn btn-success btn-bg btn-md m-1 rounded " onclick="editProduct(`{{$product->id}}`,`{{$product->name}}`,`{{$product->price}}`,`{{$product->description}}`,`{{$product->category_id}}`,`{{url('product_update')}}`)"><i class="bi bi-pencil"> Edit</i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>