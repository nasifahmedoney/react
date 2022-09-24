<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>
                {{ Auth::user()->name}}
            </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-header">Edit Brands</div>
                            <div class="card-body">
                                <form method="POST" action="/brand/edit/{{$brand->id }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="existing_image" value="{{$brand->brand_image}}"/>
                                    <div class="form-group">
                                    <label for="brandName">Update Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="brandName" placeholder="{{$brand->brand_name}}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brandImage">Update Brand Image</label>
                                        <input type="file" name="brand_image" class="form-control" id="brandImage" placeholder="{{$brand->brand_image}}">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="mt-2">
                                            <span>Existing Image</span>
                                            <img src="{{ asset($brand->brand_image) }}" alt="Brand Image" style="height:200px; width:400px;"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
