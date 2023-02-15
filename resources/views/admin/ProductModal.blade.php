<div class="modal fade" id="ModalProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype='multipart/form-data' action="" id="Form">
                    @csrf
                    <input type="text" name="name" id="name" class="form-control">
                    <input type="number" name="price" id="price"  class="form-control">
                    <select class="form-select form-select-sm cart shadow-sm" name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->label}}</option>
                    @endforeach
                    </select>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    <div id="show_item">
                        <div class="d-flex flex-column pe-5 mt-2 mb-2 bg-light ">
                            <div class="ps-5" id="remove">
                                <label for="exampleInputEmail1" class="form-label">icon</label>
                                <input type="file" class="form-control" id="icon" name="image[]">
                            </div>
                            </br>
                            <div class="ps-5 pb-3">
                                <button class="btn btn-success add_item_btn">Add More</button>
                            </div>
                        </div>
                    </div>
                    <div id="hidden"></div>
                    <div style="padding: 15px;" id="product_crud">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>