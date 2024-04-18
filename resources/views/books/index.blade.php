<x-app-web-layout>

    <x-slot name="title">
        Books Lists
    </x-slot>

    <div class="py-5">
        <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Book Lists
                                <a href="{{ url('books/create') }}" class="btn btn-primary float-end">Add Book</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-border table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">isbn</th>
                                    <th scope="col">authors</th>
                                    <th scope="col">country</th>
                                    <th scope="col">number_of_pages</th>
                                    <th scope="col">publisher</th>
                                    <th scope="col">release_date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->name}}</td>
                                        <td>{{$book->isbn}}</td>
                                        <td>{{$book->authors}}</td>
                                        <td>{{$book->country}}</td>
                                        <td>{{$book->number_of_pages}}</td>
                                        <td>{{$book->publisher}}</td>
                                        <td>{{$book->release_date}}</td>
                                        <td>
                                            <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-success mx-1">Edit</a>
                                            <a 
                                                href="{{ url('books/'.$book->id.'/delete') }}" 
                                                class="btn btn-danger mx-1"
                                                onclick="return confirm('Are you Sure ?')"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-slot:scripts>
        <script>
            
        </script>
    </x-slot:scripts>

</x-app-web-layout>
