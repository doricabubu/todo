<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\TodoItem;

class TodoItemController extends Controller
{
    public static function getList(Request $request)
    {       
        $tasks = TodoItem::where('username', '=', $request->username)->get();

        return json_encode($tasks);
    }
    
    public static function addToList(Request $request)
    {
        $task = TodoItem::create([
            'username' => $request->username,
            'content' => $request->content,
            'done' => FALSE
        ]);

        return json_encode($task);
    }

    public static function deleteFromList(Request $request)
    {       
        $task = TodoItem::where('username', '=', $request->username)->where('id', '=', $request->id)->get()[0];

        $task->delete();
    }

    public static function toggleDone(Request $request)
    {       
        $task = TodoItem::where('username', '=', $request->username)->where('id', '=', $request->id)->get()[0];

        $done = !$task->done ? "true": "false";

        $task->done = !$task->done;
        $task->save();

        return "{\"done\": " . $done . "}";
    }
}
