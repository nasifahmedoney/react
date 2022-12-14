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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Catagories</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- table Join category and user, user_id == id --}}
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if($category->updated_at != NULL)
                                            {{ $category->updated_at->diffForHumans() }}
                                            @else
                                            <span>No data available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/category/edit/{{ $category->id }}"><button class="btn btn-info">Edit</button></a>
                                            <a href="/softdelete/{{ $category->id }}"><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- paginate link --}}
                            {{ $categories->links() }}
                        </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="card">
                            <div class="card-header">Catagories</div>
                            <div class="card-body">
                                    <form method="POST" action="{{ route('add.category') }}">
                                        @csrf
                                        <div class="form-group">
                                        <label for="categoryName">Category</label>
                                        <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Category Name">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                                    </form>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
        {{-- Trash items table --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">Trashed Items</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Deleted at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash as $items)
                                    <tr>
                                        <th scope="row">{{ $items->id }}</th>
                                        <td>{{ $items->category_name }}</td>
                                        {{-- table Join category and user, user_id == id --}}
                                        <td>{{ $items->user->name }}</td>
                                        <td>
                                            {{ $items->deleted_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="/category/restore/{{ $items->id }}"><button class="btn btn-info">Restore</button></a>
                                            <a href="/category/pdelete/{{ $items->id }}"><button class="btn btn-danger">Permanent Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- paginate link --}}
                            {{ $trash->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
