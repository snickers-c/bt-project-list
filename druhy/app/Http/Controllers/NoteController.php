<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->select([
                'id',
                'user_id', 
                'title',
                'body',
                'status',
                'is_pinned',
                'created_at' 
            ])
            ->with([
                'user:id,first_name,last_name',
                'categories:id,name,color',
            ])
            ->orderByDesc('is_pinned')
            ->orderByDesc('created_at')
            ->get();

        return response()->json(['notes' => $notes], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'body' => ['nullable', 'string'],
            'status' => ['sometimes', 'required', 'string', Rule::in(['draft', 'published', 'archived'])],
            'is_pinned' => ['sometimes', 'boolean'],
            'categories' => ['sometimes', 'array', 'max:3'],
            'categories.*' => ['integer', 'distinct', 'exists:categories,id'],
        ]);

        $note = Note::create([
            'user_id' => $validated['user_id'],
            'title' => $validated['title'], 
            'body' => $validated['body'] ?? null,
            'status' => $validated['status'] ?? 'draft',
            'is_pinned' => $validated['is_pinned'] ?? false,
        ]);

        if (!empty($validated['categories'])) {
            $note->categories()->sync($validated['categories']);
        }

        return response()->json([
            'message' => 'Poznámka bola vytvorená',
            'note' => $note->load(['user', 'categories']),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::with([
                'user:id,first_name,last_name',
                'categories:id,name,color',
                'tasks:id,note_id,title,is_done,due_at',
                'comments:id,user_id,commentable_id,commentable_type,body',
            ])
            ->find($id);

        if (!$note) {
            return response()->json([
                'message' => 'Poznámka nenájdená'
            ], Response::HTTP_NOT_FOUND);
        } 

        return response()->json(['note' => $note], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'Poznámka nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'body' => ['nullable', 'string'],
            'status' => ['sometimes', 'required', 'string', Rule::in(['draft', 'published', 'archived'])],
            'is_pinned' => ['sometimes', 'boolean'],
            'categories' => ['sometimes', 'array', 'max:3'],
            'categories.*' => ['integer', 'distinct', 'exists:categories,id'],
        ]);

        $note->update([$validated]);

        if (array_key_exists('categories', $validated)) {
            $note->categories()->sync($validated['categories']);
        }

        return response()->json([
            'message' => 'Poznámka bola aktualizovaná',
            'note' => $note->load(['user', 'categories']),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'Poznámka nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }

        $note->delete();

        return response()->json([
            'message' => 'Poznámka odstránená'
        ], Response::HTTP_OK);
    }

    public function statsByStatus() {
        $stats = Note::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        return response()->json(['stats' => $stats]);
    }

    public function archiveOldDrafts() {
        $affected = Note::where('status', 'draft')
            ->where('updated_at', '<', now()->subDays(30))
            ->update([
                'status' => 'archived',
                'updated_at' => now(),
            ]);

        return response()->json([
            'message' => 'Staré koncepty boli archivované.',
            'affected_rows' => $affected
        ]);
    }

    public function userNotesWithCategories(string $userId) {
        $notes = Note::join('note_category', 'notes.id', '=', 'note_category.note_id')
            ->join('categories', 'note_category.category_id', '=', 'categories.id')
            ->where('notes.user_id', $userId)
            ->orderBy('notes.updated_at', 'desc')
            ->select('notes.id', 'notes.title', 'categories.name as category')
            ->get();

        return response()->json([
            'notes' => $notes
        ]);
    }

    public function search(Request $request) {
        $q = trim((string) $request->query('q', ''));

        $notes = Note::searchPublished($q);

        return response()->json([
            'query' => $q,
            'notes' => $notes,
        ], Response::HTTP_OK);
    }

    public function duplicate(string $id) {
        $note = Note::where('id', $id)
            ->first();

        if (!$note) {
            return response()->json([
                'message' => 'Poznámka nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }

        $newId = Note::insertGetId([
            'user_id'    => $note->user_id,
            'title'      => 'Kópia - ' . $note->title,
            'body'       => $note->body,
            'status'     => 'draft',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $newNote = Note::where('id', $newId)->first();

        return response()->json([
            'message' => 'Poznámka bola duplikovaná',
            'note'    => $newNote,
        ], Response::HTTP_CREATED);
    }

    public function publish(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'poznámka nebola nájdená',
            ], Response::HTTP_NOT_FOUND);
        }

        $note->publish();

        return response()->json([
            'note' => $note,
        ], Response::HTTP_OK);
    }

    public function archive(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'poznámka nenájdená',
            ], Response::HTTP_NOT_FOUND);
        }

        $note->archive();

        return response()->json([
            'note' => $note,
        ], Response::HTTP_OK);
    }

    public function pin(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'poznamka nenajdena'
            ], Response::HTTP_NOT_FOUND);
        }

        $note->pin();

        return response()->json([
            'note' => $note, 
        ], Response::HTTP_OK);
    }

    public function unpin(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'poznamka nenajdena'
            ], Response::HTTP_NOT_FOUND);
        }

        $note->unpin();

        return response()->json([
            'note' => $note, 
        ], Response::HTTP_OK);
    }

    public function tasks(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                'message' => 'poznamka nenajdena'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['tasks' => $note->tasks()->get()], Response::HTTP_OK);
    }
}