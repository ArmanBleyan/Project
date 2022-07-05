@extends('layouts.app')

@section('content')

<div class="example">
  
      
    <form action="{{ url('/admin') }}" method="POST">
       
       @csrf

        <label>Name</label></br>
        <input type="text" required name="name"  class="form-control col-lg-3"></br>

        <div class = "row">
           <div class = "col-lg-4">
                <label for = "programmer">Programmer</label>
                    <select name = "programmer" class = "form-control"  multiple required>
                    
                            @foreach($programmer as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                            @endforeach
            
                    </select>
            </div>
        </div>

        <br><br>


        <label>Status</label></br>
        <select name = "status" class = "form-control col-lg-3">

            <option>created</option>
            <option>assigned</option>
            <option>in-progress</option>
            <option>done</option>

        </select>

        <br><br>

        <label>Description</label></br>
        <textarea required  name="description"  class="form-control"></textarea>
        </br>

        <input type="submit" value="Save" class="btn btn-success"></br></br>
    </form>
  
</div>


 @endsection