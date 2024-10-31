@extends('Frontend.Layout.app')
@section('content')
    <section class="banner-section">
        <div class="banner-container">
            <h1 class="text-center title">ডাক্তার খুজুন</h1>
            <div class="banner-content">
                <div class="items">
                    <div class="item">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">ডাক্তার
                        বিশেষজ্ঞ</button>
                    </div>
                    <div class="item">
                        <input id="searchBox" placeholder="ডাক্তার খুজুন" class="form-control">
                        <ul class="search_list"></ul>
                    </div>   
                </div>    
            </div>
        </div>
    </section>
    <!-- Modal sectoin start -->

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ডাক্তার বিশেষজ্ঞর তালিকা</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($specialists as $specialist)
                            <li><a href="">{{ $specialist->bangla_title }}</a></li>
                        @endforeach
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
             </div>
        </div>
    </div>
    <!-- Modal section end -->
@endsection

@section('js_connect')
    <script>
        let siteUrl = "{{ config('app.url') }}";
        console.log({
           siteUrl: siteUrl
        });

        $(document).ready(function(){
            $("#searchBox").on("keyup", function(){
                let searchList = $(".search_list");
                let searchVal = $(this).val();
                $.ajax({
                        type: 'get',
                        url: "/search",
                        data: { search:searchVal },
                        dataType: 'json',
                        success: function (response) {
                            const data = response.data;
                            console.log(data)
                            if(data.length > 0){
                                searchList.empty(); // Clear the list before appending new items
                                data.forEach(function(e){
                                    searchList.append(`<li><a href="doctor-details/${e.id}/${e.name}-details">${e.name}</a></li>`);                                });
                            }else if(data.length == 0){
                                searchList.html(`<li>Doctor not found</li>`);
                            }else{
                                searchList.empty(); 
                            }
                        },
                        error:function(error){
                                console.log(error);
                        }
                });
            })
        })
    </script>
@endsection
