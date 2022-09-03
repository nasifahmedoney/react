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
</x-app-layout>
