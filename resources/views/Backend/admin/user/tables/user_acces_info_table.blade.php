<table class="table">
    <thead>
        <tr>
            <th>Ip</th>
            <th>Device</th>
            <th>Type of user</th>
            <th>User Info</th>
            <th>Accessing Type</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($user_acces_data as $key=>$data)
           
        <tr>
            <td><a href="#">{{$data->ip}}</a> <br> {{$data->created_at}} </td>
            <td style="width: 50%">
                {{$data->device}} <br>
                @php
                    $server_info = json_decode($data->description);
                @endphp
                <p>Server request uri:  {{isset($server_info->server)?$server_info->server:''}} </p>
                <p>Http Ref: {{isset($server_info->http_ref)?$server_info->http_ref:''}}</p>
                
            </td>
            <td>{{$data->user_type}}</td>
            <td>
                @if ($data->type_of_user_id)
                    <p>{{$data->user($data->type_of_user_id,$data->user_type)}}</p>
                @endif
            </td>
            <td>{{$data->access_type }}-{{$data->app_type}}</td>
            {{-- <td class="text-center">
                <div class="d-inline-flex">
                    <div class="dropdown">
                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                            <i class="ph-list"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{route('admin.store.edit', $data->id)}}" class="dropdown-item text-primary">
                                <i class="ph-pen me-2"></i>
                                Edit
                            </a>
                            
                            <button type="button" 
                                data-url="/admin/store/delete/{{$data->id}}" 
                                data-header="{{$data->id}}"
                                data-body="{{$data->id}}"
                            class="dropdown-item text-danger delete_modal ">
                                <i class="ph-trash me-2"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </td> --}}
        </tr>
        @endforeach
        
    </tbody>
</table>

<x-table.pagination-components :contents="$user_acces_data" />

<script type="text/javascript">
$(document).ready(function() {
$('ul.pagination li a').on('click', function(e) {
e.preventDefault();
openLink($(this).attr('href'));
})
});

function openLink(link) {
$.ajax({
url: link,
type: 'GET',
}).done(function(res) {
$('.store_list').html(res);
});
}
</script>
