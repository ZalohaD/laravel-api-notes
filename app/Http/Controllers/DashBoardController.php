<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NoteService;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct(
        protected NoteService $noteService,
        protected UserService $userService
    ){}

    public function showAllForUser(){
        $user = auth()->user();
        $notes = $this->noteService->getUserNotes($user);
        return view('dashboard.index')->with(['notes' => $notes,  'user' => $user]);
    }


    public function createNote(Request $request){
        $user = auth()->user();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $this->noteService->createNote($user, $data);

        return redirect()->route('dashboard.index')->with('success', 'Нотатку створено!');
    }

    public function deleteNote(int $noteId){
        $user = auth()->user();
        $this->noteService->deleteNote($user, $noteId);

       return redirect()->route('dashboard.index')->with('success', 'Нотатку видалено!');
    }

    public function editNote(Request $request, int $noteId){
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        $this->noteService->updateNote($noteId, $data);
        return redirect()->route('dashboard.index')->with('success', 'Нотатку оновленно');
    }


    public function adminDashboard(){
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Доступ забороненно');
        }

        $notes = $this->noteService->showAll();

        return view('dashboard.admin')->with(['notes'=>$notes]);
    }

    public function showUserProfile (int $user_id){
        $user = User::withTrashed()->with('notes')->findOrFail($user_id);

        return view('dashboard.user', compact('user'));
    }


    public function deactivateUser(int $user_id){
        $user = auth()->user();
        if ($user->role != 'admin'){
            abort(403, 'Доступ заборонений');
        }
        $this->userService->deactivateUser($user_id);

        return redirect()->intended('/dashboard/admin');
    }

    public function showEditForm(int $noteId){
        $note = $this->noteService->findNote($noteId);

        if (!$note) {
            return redirect()->route('dashboard.index')->with('error', 'Нотатка не знайдена');
        }

        return view('dashboard.edit')->with('note', $note);
    }

}
