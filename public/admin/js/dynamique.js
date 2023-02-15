$(document).ready(function () {
    $(".add_item_btn").click(function (e) {
        e.preventDefault();
        $("#show_item").prepend(
            `        
         <div class="d-flex flex-column mt-2 mb-2 pe-5 bg-light append_item">
         <div class="ps-5" id="remove">
         <label for="exampleInputEmail1" class="form-label">icon</label>
         <input type="file" class="form-control" id="icon" name="image[]">
     </div>
        </br>
        <div class="ps-5 pb-3">
            <button class="btn btn-danger remove_item_btn">Remove</button>
        </div>
    </div>
  `
        );
    });
    $(document).on("click", ".remove_item_btn", function (e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
    });
});

var btn = document.getElementById("product_crud");
var name = document.getElementById("ModalLabel");
var name1 = document.getElementById("ModalLabel1");
var form = document.getElementById("Form");
var form1 = document.getElementById("Form1");
function createProduct(action) {
    console.log("is in product");
    // initialiser task form
    //   initTaskForm();
    form.action = action;
    form.reset();
    document.getElementById("hidden").innerHTML = ``;
    // Afficher le boutton save
    name.innerHTML = `Create`;
    btn.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="save" id="hide" class="btn high shadow-sm " >Save changes</button>`;
    // Ouvrir modal form
    $("#ModalProduct").modal("show");
}

function editProduct(id, name, price, description,category, action) {
    document.getElementById("name").value = name;
    document.getElementById("price").value = price;
    document.getElementById("description").value = description;
    document.getElementById("category").value = category;
    form.action = action;
    document.getElementById(
        "hidden"
    ).innerHTML = `<input type="hidden" name="id" value="${id}">`;
    name.innerHTML = `Update`;
    btn.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="save" id="hide" class="btn high shadow-sm " >Update changes</button>`;
    // Ouvrir Modal form
    $("#ModalProduct").modal("show");
}

var btn2 = document.getElementById("category_crud");

function createCategory(action) {
    console.log("is in category");

    console.log(btn2);
    // initialiser task form
    form1.action = action;
    //   initTaskForm();
    document.getElementById("hidden1").innerHTML = ``;
    name1.innerHTML = `Create`;
    // Afficher le boutton save
    btn2.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="save_Category" id="hide" class="btn high shadow-sm " >Save changes</button>`;
    // Ouvrir modal form
    $("#ModalCategory").modal("show");
}

function editCategory(id, label, action) {
    console.log(id + "  " + label);
    name1.innerHTML = `Update`;
    form1.action = action;
    document.getElementById("label").value = label;
    document.getElementById(
        "hidden1"
    ).innerHTML = `<input type="hidden" name="category_id" value="${id}">`;
    // // Définir l’index en entrée cachée pour l’utiliser en Update et Delete
    // Definir FORM INPUTS
    btn2.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="update_Category" onClick="updateCategory()" id="update" class="btn high shadow-sm " >Update</button>`;
    // Ouvrir Modal form
    $("#ModalCategory").modal("show");
}

function editProfile(name,email) {
  console.log('hii');
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    // Ouvrir Modal form

}

