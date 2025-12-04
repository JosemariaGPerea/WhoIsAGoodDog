<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = User::where('rol', 'usuario')->get();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function edit(User $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, User $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('ok', 'Cliente actualizado');
    }

    public function destroy(User $cliente)
    {
        $cliente->delete();
        return back()->with('ok', 'Cliente eliminado');
    }
}
