@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Top 10 Author') }}</div>
                        <div class="table-responsive">
                            <table id="books-table" class="table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>{{__('Author Name')}}</th>
                                    <th>{{__('Voter')}}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>{{__('Author Name')}}</th>
                                    <th>{{__('Voter')}}</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($author as $authors)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$authors->name }}</td>
                                        <td>{{$authors->totVote}}</td>
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
    </div>
@endsection

