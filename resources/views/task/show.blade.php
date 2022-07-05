@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                <div class="card-header">Name</div>

                <div class="card-body">


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    
                <p class="card-text">Name : {{ $tasks->name }}</p>

                </div>
            </div>   


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    
                <p class="card-text">Manager Number : {{ "N° $tasks->manager" }}</p>

                </div>
            </div>


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    
                <p class="card-text">Programmer_Name : {{ $tasks->programmer['name'] }}</p>

                </div>
            </div>
            

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    
                <p class="card-text">Status : {{ $tasks->status }}</p>

                </div>
            </div>


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    
                <p class="card-text">Description : {{ $tasks->description }}</p>

                </div>
            </div>

          
                </div>
            </div>
        </div>
    </div>
</div>

@endsection