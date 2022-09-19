<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>
                {{ Auth::user()->name}}
            </b>
            <b style="float:right;">Total users:
                <span class="badge rounded-pill text-bg-primary">{{ count($users) }}</span>
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
                        <div class="card-header">Edit Catagory</div>
                        <div class="card-body">
                                <form method="POST" action="/category/edit/{{$category->id }}">
                                    @csrf
                                    <div class="form-group">
                                    <label for="categoryName">Category</label>
                                    <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="{{$category->category_name}}">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Edit Category</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </div>
</x-app-layout>
