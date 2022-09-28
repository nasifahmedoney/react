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
                    <div class="col-md-8">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            {{-- items in each row->row-cols-1->3 items->md-3->gap->g-4 --}}
                            @foreach ($images as $image)
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset($image->image) }}" class="card-img-top" alt="multipic">
                                        <div class="card-body">
                                        <p class="card-text">{{ $image->image }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                        {{-- upload form --}}
                        <div class="col-md-4">
                            <div class="card">
                            <div class="card-header">Add Multiple Images</div>
                            <div class="card-body">
                                    <form method="POST" action="/multipic/store" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="images">Images</label>
                                            <input type="file" name="image[]" class="form-control" id="images" multiple>
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Add Images</button>
                                    </form>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</x-app-layout>
