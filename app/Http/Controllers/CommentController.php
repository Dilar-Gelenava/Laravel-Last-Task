<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment(Request $request)
    {
        Product::find($request->input('product_id'))->comments()
        ->create([
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'),
            'body' => $request->input('body'),
        ]);
        return redirect()->back();
    }

    public function add_comment_reply(Request $request)
    {
        Product::find($request->input('product_id'))->comments()
            ->create([
                'user_id' => auth()->id(),
                'product_id' => $request->input('product_id'),
                'parent_id' => $request->input('parent_id'),
                'body' => $request->input('body'),
            ]);
        return redirect()->back();
    }

    public function delete_comment(Request $request)
    {
        Comment::find($request->input('comment_id'))->delete();
        Comment::where('parent_id', '=', $request->input('comment_id'));
        return redirect()->back();
    }
}
