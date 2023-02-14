<?php

namespace App\Http\Controllers\API\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DeleteCommentController extends Controller
{
    public function __invoke($id)
    {
        $comment = DB::table('comment_cafes')->where('id', '=', $id)->delete();
        return response([$id]);
    }
}
