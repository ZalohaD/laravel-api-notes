<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\NoteRepository;

class NoteService{

    public function __construct(
       protected NoteRepository $noteRepository
    ){}

    public function createNote(User $user, array $data){
        return $this->noteRepository->createNote($user->id, $data);
    }

    public function getUserNotes(User $user){
        return $this->noteRepository->getByUser($user->id);
    }

    public function getNoteDetails(User $user, int $noteId)
    {
        $note = $this->noteRepository->find($noteId);
        if (!$note || $note->user_id !== $user->id) {
            return null;
        }
        return $note;
    }

    public function updateNote (int $noteId, array $data){
        $this->noteRepository->updateNote($noteId, $data);
    }

    public function deleteNote (User $user, int $noteId){
        return $this->noteRepository->delete($noteId);
    }
}
