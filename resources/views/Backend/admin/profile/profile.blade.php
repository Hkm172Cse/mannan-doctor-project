@extends('layouts.admin.master')

@section('title', 'Profile |')

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="name" name="name" value="{{Auth::user()->name}}" class="form-control" id="name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"
                                        onchange=" document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])
                                    document.getElementsByClassName('image_preview').src = window.URL.createObjectURL(this.files[0])"
                                        name="image" class="form-control" id="image" placeholder="Image">
                                </div>
                                <div class="form-group mt-4">
                                    <Button type="submit" class="btn btn-primary">Update</Button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <img src="" class="image" id="preview_image" style="height:300px" alt=""
                                srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')
@endpush
