<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>
              Hi {{ Auth::user()->name}}
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
                @if( count($brands) > 0 )
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Brands</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $brand->id }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;" alt="Brand Image"></td>
                                        <td>
                                            @if($brand->updated_at != NULL)
                                            {{ $brand->updated_at->diffForHumans() }}
                                            @else
                                            <span>No data available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/brand/edit/{{ $brand->id }}"><button class="btn btn-info">Edit</button></a>
                                            <a href="/brand/delete/{{ $brand->id }}"><button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- paginate link --}}
                            {{ $brands->links() }}
                        </div>
                        </div>
                    </div>
                    @else
                        <div class="col-md-8">
                            <span>No items available</span>
                        </div>
                    @endif
                        <div class="col-md-4">
                            <div class="card">
                            <div class="card-header">Add Brands</div>
                            <div class="card-body">
                                    <form method="POST" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                        <label for="brandName">Brands</label>
                                        <input type="text" name="brand_name" class="form-control" id="brandName" placeholder="Enter brand Name">
                                        @error('brand_name')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="brandImage">Brand Image</label>
                                            <input type="file" name="brand_image" class="form-control" id="brandImage">
                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Add brand</button>
                                    </form>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</x-app-layout>
