@extends('layouts.app')

@section('content')


<div class="example">

        <form action="{{ url('admin/' .$tasks->id) }}" method = "POST">
        @csrf

        {{ method_field('PUT') }}

        <input type="hidden" name="id" id="id" value="{{$tasks->id}}" id="id" />

        <label>Name</label></br>
        <input type="text" required name="name" value="{{$tasks->name}}" class="form-control col-lg-3"></br>

        <label for = "programmer">Կատեգորիա</label><br><br>
                <select name = "programmer" class = "form-control col-lg-4 label"><br>

                    @foreach($all_programmers as $programmer)
                    <option value="{{ $programmer->id }}" {{ $programmer->status ? "selected" : "" }}>{{ $programmer->name }}</option>
                    @endforeach
                </select>

        <br><br>

        <div class="col-lg-3">

        <label>Status</label>

        <select name="status"  class = "form-control col-lg-12">

        <option value="created" {{$tasks->status === "created" ? 'selected': ""}}>created</option>
        <option value="assigned" {{$tasks->status === "assigned" ? 'selected': ""}}>assigned</option>
        <option value="in-progress" {{$tasks->status === "in-progress" ? 'selected': ""}}>in-progress</option>
        <option value="done" {{$tasks->status === "done" ? 'selected': ""}}>done</option>
        

        </select>

        </div>

        <br>

        <label>Description</label></br>
        <textarea required name="description" class="form-control">{{$tasks->description}}</textarea>
        </br>

        <input type="submit" value="Update" class="btn btn-success"></br></br>
    </form>
   
</div>

@endsection