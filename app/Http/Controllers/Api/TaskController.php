<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tasks = Task::with('status')->get();
        $tasks = Task::all();
        
        //$tasks['due_date'] = Carbon::createFromFormat('Y-m-d', $tasks['due_date'])->format('d/m/Y');

        if (!$tasks) {
            return response()->json([
                'status' => false,
                'message' => 'Tasks not found!!!',
                'status_code' => Response::HTTP_NOT_FOUND,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Tasks Found!!!',
                'status_code' => Response::HTTP_FOUND,
                'data' => $tasks
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'priority' => 'required',
                'due_date' => 'required|date',
                'status_id' => 'required'
            ]);

            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'status_id' => $request->status_id
            ]);

            if (!$task) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error while creating a new Task',
                    'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'data' => $task
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Task Created successfully!!!',
                    'status_code' => Response::HTTP_CREATED,
                    'data' => $task
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        try {
            return response()->json([
                'status' => true,
                'message' => 'Task fetched successfully!',
                'status_code' => Response::HTTP_FOUND,
                'data' => $task
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $task = Task::find($id);
        
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Task fetched successfully!',
    //         'status_code' => Response::HTTP_FOUND,
    //         'data' => $task
    //     ]);
    // }

    public function edit(string $id)
    {

        try {
            $task = Task::find($id);
            //$task['due_date'] = Carbon::createFromFormat('Y-m-d', $task['due_date'])->format('d/m/Y');
           // $task->due_date = Carbon::parse($task->due_date)->format('d-m-y');;
            
            return response()->json([
                'status' => true,
                'message' => 'Edit: Task fetched successfully!',
                'status_code' => Response::HTTP_FOUND,
                'data' => $task
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => $task
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        try {
            if (!$task->update($request->all())) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error while updating the task',
                    'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'data' => $task
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Task Updated successfully!!',
                    'status_code' => Response::HTTP_OK,
                    'data' => $task
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        try {
            if (!$task->delete()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error while deleting the task',
                    'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Task Deleted successfully!!',
                    'status_code' => Response::HTTP_OK
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    /**
     * Get tasks due in the next 7 days.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upcoming()
    {
        $today = Carbon::today();
        $nextWeek = $today->copy()->addDays(7);

    //    $tasks = Task::whereBetween('due_date', [$today, $nextWeek])->get();
       $tasks = Task::whereBetween('due_date', [$today, $nextWeek])
             ->orderBy('due_date', 'asc')
             ->get();

        return response()->json([
            'status' => true,
            'message' => 'All Upcoming Tasks fetched successfully!',
            'data' => $tasks,
            'status_code' => Response::HTTP_OK
        ]);
    }
}
