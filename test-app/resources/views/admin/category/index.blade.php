<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>
                {{ Auth::user()->name}}
            </b>
            <b style="float:right;">Total users:
                {{-- <span class="badge rounded-pill text-bg-primary">{{ count($users) }}</span> --}}
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
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created at</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
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
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                    </div>
                    </div>
                </div>
        </div>

        </div>

    </div>
</x-app-layout>
