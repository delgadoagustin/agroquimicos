<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\Empresa;
use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmpresaController extends Controller
{
    public function index(Request $request): View
    {
        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }

    public function create(Request $request): View
    {
        return view('empresa.create');
    }

    public function store(EmpresaStoreRequest $request): RedirectResponse
    {
        $empresa = Empresa::create($request->validated());
        // FILE
        $request->validate([
            'files' => 'required'
            ]);
            $fileModel = new File();
            if($request->file()) {
                $files = $request->file('files');
                foreach ($files as $file) {
                    $fileName = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs($empresa->id.'_'.$empresa->nombre, $fileName, 'public');
                    $fileModel->nombre = time().'_'.$file->getClientOriginalName();
                    $fileModel->directorio = $filePath;
                    $fileModel->save();
                }
            }

        // --------------------------

        $request->session()->flash('empresa.id', $empresa->id);

        return redirect()->route('empresa.index');
    }

    public function show(Request $request, Empresa $empresa): View
    {
        return view('empresa.show', compact('empresa'));
    }

    public function edit(Request $request, Empresa $empresa): View
    {
        return view('empresa.edit', compact('empresa'));
    }

    public function update(EmpresaUpdateRequest $request, Empresa $empresa): RedirectResponse
    {
        $empresa->update($request->validated());

        $request->session()->flash('empresa.id', $empresa->id);

        return redirect()->route('empresa.index');
    }

    public function destroy(Request $request, Empresa $empresa): RedirectResponse
    {
        $empresa->delete();

        return redirect()->route('empresa.index');
    }
}
