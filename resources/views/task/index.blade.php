@extends('layouts.app')

@section('content')

    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Task</div>
                    <div class="card-body">
                  

                    @empty($admin['type'])

                    <a href="{{ url('/admin/create') }}" class="btn btn-success btn-sm" title="Add New Promo_Code">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                            
                    @else  
                            
                    @endempty

                    <br><br>

                    <div class = "container">
                        <div class = "row search" style = "margin-top:0; float:left; margin-left:350px;">
                            <form action = "" class = "col-12">
                                <div class = "form-group">
                                    <input type = "search" name = "search" id = "" class = "form-control" placeholder = "Search by name"/>
                                </div>
                                <button class = "btn btn-primary" style = "float:left; margin-left:60px;">Search</button>
                            </form>
                        </div> 
                    </div>   
        
                        <br><br><br><br><br>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Manager</th>
                                        <th>Programmer</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($tasks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->manager }}</td>
                                        <td> 
                                        @if(isset($item->programmer))
                                            {{ $item->programmer }}
                                        @endif
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ Str::limit($item->description, 20, $end='...') }}</td>
                                                       
                                        <td>


                                        @if($item->manager == Auth::user()->id || $item->programmer == Auth::user()->id)
                                       
                                            <a href="{{ url('/admin/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
 
                                            <a href="{{ url('/admin/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        @endif  



                                        @empty($admin['type'])
                                        
                                        <form method="POST" action="{{ url('/admin' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete About" onclick="return confirm(&quot;Confirm&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>

                                        @else

                            
                                        @endempty

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection