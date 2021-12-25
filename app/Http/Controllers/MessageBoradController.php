<?php

namespace App\Http\Controllers;

use App\Models\MessageBorad;
use Illuminate\Http\Request;

class MessageBoradController extends Controller
{
    public function create()
    {
        return view('message_borads.create');
    }

    public function store(Request $request)
    {
        //dd($request->toArray());
        MessageBorad::create([
            'content' => $request->content
        ]);

        return response()->json([
            'status' => true,
            'message' => '成功',
            'url' => route('message_borads.index')
        ]);
    }
    public function index()
    {
        $contents = MessageBorad::all();

        $params['contents'] = $contents;

        //return view('message_borads.index', ['contents' => $contents]);
        return view('message_borads.index', $params);
    }

    public function delete($id)
    {
        $MessageBorad = MessageBorad::findOrFail($id);

        $MessageBorad->delete();

        return response()->json([
            'status' => true,
            'message' => '刪除成功',
            'url' => route('message_borads.index')
        ]);
    }

    public function edit(int $id)
    {
        $MessageBorad = MessageBorad::findOrFail($id);

        $params['MessageBorad'] = $MessageBorad;
        $params['id'] = $id;

        return view('message_borads.edit', $params);
    }

    public function update(int $id, Request $request)
    {
        $MessageBorad = MessageBorad::findOrFail($id);

        //dd($request->toArray());
        $MessageBorad->update([
            'content' => $request->content
        ]);

        return response()->json([
            'status' => true,
            'message' => '更新成功',
            'url' => route('message_borads.index')
        ]);
    }
}
