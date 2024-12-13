@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menu List</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Add Menu</a>
    <a href="{{ route('menus.report') }}" class="btn btn-success">Download PDF</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>${{ $menu->price }}</td>
                    <td>
                        @if($menu->image)
                            <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
