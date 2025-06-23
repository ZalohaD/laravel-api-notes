<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepository {
    public function createNote(int $userId, array $data)
    {
        $data['user_id'] = $userId;
        return Note::create($data);
    }

    public function updateNote (int $id, array $data){
        $note = Note::find($id);

        return $note->update($data);

    }

    public function delete (int $id){
        return Note::detele($id);
    }

    public function find (int $id){
        $note = Note::find($id);
        if (!$note) return null;
        return $note->delete();
    }

    public function getByUser (int $user_id){
        return Note::where('user_id', $user_id)->get();
    }

    public function getAllNotes(){
        return Note::all();
    }
}
