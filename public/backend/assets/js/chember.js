let childElements = `<div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label"> Chember name:</label>
                                    <input type="text" id="chamber_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label"> Address</label>
                                    <input type="text" id="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Select Time</label>
                                    <select type="text" id="time" class="form-control">
                                        <option>9:00 am - 1:00 pm</option>
                                        <option>3:00 pm - 6:00 pm</option>
                                        <option>7:00 pm - 10:00 pm</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button id="chamberSaveBtn" class="btn btn-primary">save</button>
                                <button id="chamberCancelBtn" class="btn btn-danger chamberCancelBtn">cancel</button>
                            </div>`;
 let parentElement = document.getElementById("ChemberContainer");
 let Chamber_list = document.getElementById("cham_list");
$(document).ready(function(){
    $("#chemberAddBtn").on("click", function(){
        $(this).addClass("d-none");
        parentElement.innerHTML = childElements;
    }); 
    
    $(document).on("click", "#chamberCancelBtn", function(){
        console.log("I am listening");
        // Optional: Remove the form or reset the visibility of the add button
        $("#chemberAddBtn").removeClass("d-none");
        parentElement.innerHTML = '';
    });

    $(document).on("click", "#chamberSaveBtn", function(){
        let name = $("#chamber_name").val();
        let address = $("#address").val();
        let time = $("#time").val();

        $.ajax({
            type: 'POST',
            url: "/doctor/insert-chamber",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { name:name,address:address,time:time },
            dataType: 'json',
            success: function (response) {
                $("#chemberAddBtn").removeClass("d-none");
                parentElement.innerHTML = '';
                let new_chamber = `<li><strong>${response.data.name}</strong> <p>${response.data.address}, ${response.data.time}</p></li>`;
                Chamber_list.insertAdjacentHTML('beforeend', new_chamber);
            },
            error:function(error){
                console.log(error);
            }
        });
    })
});