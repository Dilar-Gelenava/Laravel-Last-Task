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

                        <h3>Get All Products:</h3>
                        <p>/api/products</p>

                        <h3>Get Product With Comments:</h3>
                        <p>/api/roduct/{product_id}</p>

                        <h3>Get </h3>
                        <p>/api/</p>

                        <h3>Get All Categories</h3>
                        <p>/api/categories</p>

                        <h3>Get Category Products</h3>
                        <p>/api/products/{category_id}</p>

                </div>
            </div>
        </div>
    </div>

@endsection
