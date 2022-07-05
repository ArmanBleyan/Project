<?php
 
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(Request $request)
    {
      
        $search = $request['search'] ?? "";
        if($search != ""){
            $tasks = Task::where('name', 'LIKE', "%$search%")->get();
        }else {
            $tasks = Task::all();
        }

        $admins = Auth::user()->name;

        $id = Auth::id();

        $admin = Admin::where('id', '=', $id)->first('type');

        return view ('task.index', compact('admins', 'tasks', 'admin'));
    }
 
    
    public function create()
    {
        $admins = Auth::user()->name;
        $programmer = Admin::where('type', '=', 1)->get();

        return view('task.create', compact('admins', 'programmer'));
    }

    public function store(Request $request)
    {
        
        $task = new Task();
        $task->name = $request->input('name');
        $task->manager = Auth::id();
        $task->programmer = $request->input('programmer');
        $task->status = $request->input('status');
        $task->description = $request->input('description');
       
        $task->save();
        return redirect('/admin');

    }
 
    
    public function show($id)
    {
            $admins = Auth::user()->name;
            $tasks = Task::find($id);

            $tasks['programmer'] = Admin::where('id', '=', $tasks['programmer'])->first('name');

            return view('task.show', compact('admins', 'tasks'));
    }
 
    
    public function edit($id)
    {
        $admins = Auth::user()->name;
        $tasks = Task::find($id);

        $programmer_single = Admin::find($tasks->programmer);
        $all_programmers = Admin::where('type', '=', 1)->get();


        if (isset($all_programmers) && $programmer_single) {
            foreach ($all_programmers as $key => $all) {
                if ($all->id === $programmer_single->id) $all_programmers[$key]["status"] = true;
            }
        }

        return view('task.edit', compact('tasks', 'admins', 'all_programmers'));
    }


    
    public function update(Request $request, $id)
    {

            $task = Task::find($id);

            $manager_id = $task['manager'];

            $programmer_id = $task['programmer'];

            $auth_id = Auth::id();

            if($programmer_id == $auth_id){

                $task->status = $request->input('status');

            }else if($manager_id === $auth_id){
       
                $task->name = $request->input('name');
                $task->programmer = $request->input('programmer');
                $task->status = $request->input('status');
                $task->description = $request->input('description');

            }


            $task->save();
            return redirect('/admin');    

    }
 
  
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('/admin');  
    }


}