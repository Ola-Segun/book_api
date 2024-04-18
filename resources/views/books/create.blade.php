<x-app-web-layout>

    <x-slot name="title">
        Add Categories
    </x-slot>

    <div class="py-5">
        <div class="container">
           
            <div class="row">
                <div class="col-md-12">


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}} 
                            <button type="button" class="btn-close float-end" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Add Categories
                                <a href="{{ url('books') }}" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ url('books/create')}}" method="POST">
                                @csrf




                                <div class="md-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="" value="{{ old('name')}}" />
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="md-3">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" name="isbn" class="form-control" id="" value="{{ old('isbn')}}" />
                                    @error('isbn') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="md-3">
                                    <label for="authors">Authors</label>
                                    <input type="text" name="authors" class="form-control" id="" value="{{ old('authors')}}" />
                                    @error('authors') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="md-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control" id="" value="{{ old('country')}}" />
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="md-3">
                                    <label for="number_of_pages">Number Of Pages</label>
                                    <input type="number" name="number_of_pages" class="form-control" id="" value="{{ old('number_of_pages')}}" />
                                    @error('number_of_pages') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="md-3">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" name="publisher" class="form-control" id="" value="{{ old('publisher')}}" />
                                    @error('publisher') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="md-3">
                                    <label for="release_date">Release Date</label>
                                    <input type="date" name="release_date" class="form-control" id="" value="{{ old('release_date')}}" />
                                    @error('release_date') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="py-2 md3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
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
