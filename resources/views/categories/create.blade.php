@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">
                {{ isset($category)? 'Edit Category' : 'Create a New Category'}}
            </div>
                <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach( $errors->all() as $error )
                                <li class="list-group-item text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach 
                        </ul>
                    </div>
                @endif
                    <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="POST">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value ="{{ isset($category) ? $category->name : ''}}">
                        <div class="form-group">
                            <button class="btn btn-success my-4" type="submit">
                            {{ isset($category)? 'Update Category' : 'Add Category'}}
                            </button>
                         </div>
                    </form>
                   
                </div>
            </div>
        </div>
        
    </div>

@endsection('content') 