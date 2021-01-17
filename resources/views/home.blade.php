@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (auth()->id() == 1)
                        <h1>signed as admin</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h3>create product:</h3>
                        <form action="{{ Route('addProduct') }}" method="post">
                            @csrf
                            <input type="text" name="title" placeholder="title" required>
                            <textarea type="text" name="description" placeholder="description" required></textarea>
                            <input type="text" name="image_url" placeholder="image url">
                            <br>
                            @foreach($categories as $category)
                                <input type="checkbox" name="{{ $category->id }}" value={{ $category->id }}>
                                <label for="{{ $category->name }}"> {{ $category->name }}</label><br>
                            @endforeach
                            <button type="submit">submit</button>
                        </form>

                        <h3>create category:</h3>
                        <form action="{{ Route('addCategory') }}" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="name" required>
                            <button type="submit">submit</button>
                        </form>

                    @endif
                    <h1>categories:</h1>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ Route('getCategoryProducts', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    <h1>posts:</h1>
                    @foreach($products as $product)
                        @include('product')
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
