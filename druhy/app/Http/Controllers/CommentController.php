<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Note $note, ?Task $task)
    {
        $this->authorize('view', [Comment::class, $note]);

        if ($task) {
            $comments = $task->comments()->get();

            return response()->json([
                'msg' => 'komentare k tasku najdene',
                'comments' => $comments
            ], Response::HTTP_OK);
        }

        $comments = $note->comments()->get();

        return response()->json([
            'msg' => 'najdene komentare',
            'comments' => $comments,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Note $note, ?Task $task)
    {
        $this->authorize('create', [Comment::class, $note]);

        $validated = $request->validate([
            'body' => ['string'],
        ]);

        if ($task) {
            $comment = $task->comments()->create([
                'user_id' => $note->user_id,
                'body' => $validated['body']
            ]);

            return response()->json([
                'msg' => 'komentar k tasku ulozeny',
                'comments' => $comment
            ], Response::HTTP_OK);
        }

        $comment = $note->comments()->create([
            'user_id' => $note->user_id,
            'body' => $validated['body']
        ]);

        return response()->json([
            'msg' => 'komentar vytvoreny',
            'comment' => $comment
            ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note, ?Task $task, Comment $comment)
    {  
        $this->authorize('view', [Comment::class, $note]);

        if ($task) {
            return response()->json([
                'msg' => 'komentar k tasku najdeny',
                'comments' => $comment
            ], Response::HTTP_OK);
        }


        return response()->json([
            'msg' => 'zobrazujem komentar',
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note, ?Task $task, Comment $comment)
    {
        $validated = $request->validate([
            'body' => ['string']
        ]);
        
        $this->authorize('update', [Comment::class, $note]);

        if ($task) {
            $comment->update($validated);

            return response()->json([
                'msg' => 'komentar k tasku upraveny',
                'comments' => $comment
            ], Response::HTTP_OK);
        }
            
        $comment->update($validated);

        return response()->json([
            'msg' => 'komentar upraveny',
            'comment' => $comment,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note, ?Task $task, Comment $comment)
    {
        $this->authorize('delete', [Comment::class, $note]);

        if ($task) {
            $comment->forceDelete();

            return response()->json([
                'msg' => 'komentar k tasku vymaazany',
            ], Response::HTTP_OK);
        }

        $comment->forceDelete();

        return response()->json([
            'msg' => 'vymazany komentar'
        ], Response::HTTP_OK);
    }
}