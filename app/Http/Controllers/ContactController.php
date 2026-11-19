<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        // Pega apenas os contatos do usuário logado
        $contacts = Auth::user()->contacts()->latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'type' => 'required|in:Pessoal,Trabalho,Outros',
            'notes' => 'nullable|string'
        ]);

        // Cria o contato vinculado ao usuário logado
        Auth::user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contato salvo com sucesso!');
    }

    // Os métodos edit, update e destroy faremos na sequência.
}