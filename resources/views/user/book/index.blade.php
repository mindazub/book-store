@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Books') }}
                        <a href="{{ route('user.book.create') }}" class="btn btn-primary btn-sm">New Book</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    @if(! $book->cover == 'cover')
                                        <td><img width="50" src="https://picsum.photos/340/440" alt="Default Cover"></td>
                                    @else
                                        <td><img width="50" src="{{ asset(''.$book->cover ) }}" alt="Book Cover">
                                        </td>
                                    @endif
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->discount }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('user.book.show', $book->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('user.book.edit', $book->id) }}">Update</a>
                                        <form action="{{ route('user.book.destroy', $book->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    {{ $books->links() }}
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
