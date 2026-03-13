<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    private int $id = 1;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('notes')->insert([
            [
                'user_id' => 1,
                'title' => 'Shopping List',
                'body' => 'Jablká, Hrušky, Syr',
                'status' => 'draft',
                'is_pinned' => false,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null
            ],
            [
                'user_id' => 1,
                'title' => 'List',
                'body' => 'Jablká, Hrušky, Syr',
                'status' => 'draft',
                'is_pinned' => false,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null
            ],
            [
                'user_id' => 1,
                'title' => 'List2',
                'body' => 'Jablká, Hrušky, Syr',
                'status' => 'draft',
                'is_pinned' => false,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null
            ],
            [
                'user_id' => 2,
                'title' => 'List3',
                'body' => 'Jablká, Hrušky, Syr',
                'status' => 'draft',
                'is_pinned' => false,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null
            ],
            [
                'user_id' => 3,
                'title' => 'List4',
                'body' => 'Jablká, Hrušky, Syr',
                'status' => 'draft',
                'is_pinned' => false,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null
            ],
        ]);
    }

    private function id() {
        return $this->id++;
    }
}