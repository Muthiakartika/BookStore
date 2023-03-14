@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book List') }}</div>
                    <div class="card-body">

                       @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <form method="GET" action="{{ route('book.index') }}">

                            <div class="form-group">
                                <label for="list_show">Page show:</label>
                                <select class="form-control" id="list_show" name="list_show" onchange="this.form.submit()">
                                    <option hidden>Page List</option>
                                    @for ($i = 10; $i <= 100; $i+=10)
                                        <option value="{{ $i }}" {{ request()->input('show', 10) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="search_text">Search:</label>
                                <input type="text" class="form-control" id="search_text" name="search_text" value="{{ $search_text }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <br>
                        </form>

                        <div class="table-responsive">
                            <table id="books-table" class="table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>{{__('Book Name')}}</th>
                                    <th>{{__('Author Name')}}</th>
                                    <th>{{__('Category Name')}}</th>
                                    <th>{{__('Average Rating')}}</th>
                                    <th>{{__('Voter')}}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>{{__('Book Name')}}</th>
                                    <th>{{__('Author Name')}}</th>
                                    <th>{{__('Category Name')}}</th>
                                    <th>{{__('Average Rating')}}</th>
                                    <th>{{__('Voter')}}</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($book as $books)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$books->title}}</td>
                                        <td>{{$books->author->name }}</td>
                                        <td>{{$books->category->category}}</td>
                                        <td>{{$books->avgRating}}</td>
                                        <td>{{$books->totVote}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$book->links()}}
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
