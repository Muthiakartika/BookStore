@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Input Rating') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('rating.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="author">Author Name</label>
                                <select name="author_id" id="author" class="form-control">
                                    <option hidden>Select Author</option>
                                    @foreach($author as $authors)
                                        <option value="{{ $authors->id }}">{{ $authors->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="book">Book Name</label>
                                <select name="book_id" id="book" class="form-control">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select name="rate" id="rating" class="form-control">
                                    <option hidden>Select Rating</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('rating')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#author').on('change', function() {
                var authorId = $(this).val();
                if(authorId) {
                    $.ajax({
                        url: '/getBook/'+authorId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data)
                        {
                            if(data){
                                $('#book').empty();
                                $('#book').append('<option hidden>Choose Book</option>');
                                $.each(data, function(key, book_id){
                                    $('select[name="book_id"]').append('<option value="'+ book_id.id +'">' + book_id.title + '</option>');
                                });
                            }else{
                                $('#book').empty();
                            }
                        }
                    });
                }else{
                    $('#book').empty();
                }
            });
        });
    </script>
@endsection
