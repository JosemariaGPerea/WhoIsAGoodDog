<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use Illuminate\Http\Request;
use App\Exports\PerrosExport;
use App\Imports\PerrosImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Raza;
use FPDF;





class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::with('raza')->get(); 
        return view('admin.perros.index', compact('perros'));
    }


    public function create()
    {
        $razas = Raza::all();   
        return view('admin.perros.create', compact('razas'));
    }

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'raza_id' => 'required|exists:razas,id',
        'edad' => 'required|integer|min:0',
        'sexo' => 'required|in:Macho,Hembra',
        'descripcion' => 'nullable|string',
        'foto' => 'nullable|image|max:2048', // máximo 2MB
    ]);

    $perro = new Perro();
    $perro->nombre = $request->nombre;
    $perro->raza_id = $request->raza_id;
    $perro->edad = $request->edad;
    $perro->sexo = $request->sexo;
    $perro->descripcion = $request->descripcion;

    if ($request->hasFile('foto')) {
        $perro->foto = $request->file('foto')->store('perros', 'public');
    }

    $perro->save();

    return redirect()->route('perros.index')->with('success', 'Perro creado correctamente!');
}





    public function show(Perro $perro)
    {
        return view('admin.perros.show', compact('perro'));
    }

    public function edit(Perro $perro)
    {
        $razas = Raza::all();       
        return view('admin.perros.edit', compact('perro', 'razas'));
    }

    public function update(Request $request, Perro $perro)
    {
        $validated = $request->validate([
            'raza_id' => 'required|exists:razas,id',
            'nombre' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        $perro->update($validated);

        return redirect()->route('perros.index')->with('success', 'Perro actualizado correctamente.');
    }

    public function destroy(Perro $perro)
    {
        $perro->delete();

        return redirect()->route('perros.index')
            ->with('success', 'Perro eliminado correctamente');
    }
    // En tu PerroController
public function export()
{
    $perros = \App\Models\Perro::all(['nombre', 'raza_id', 'edad', 'sexo', 'descripcion']);

    $filename = "perros.csv";

    $handle = fopen($filename, 'w+');
    fputcsv($handle, ['Nombre', 'Raza ID', 'Edad', 'Sexo', 'Descripción']); // encabezados

    foreach ($perros as $perro) {
        fputcsv($handle, [
            $perro->nombre,
            $perro->raza_id,
            $perro->edad,
            $perro->sexo,
            $perro->descripcion
        ]);
    }

    fclose($handle);

    return response()->download($filename)->deleteFileAfterSend(true);
}


public function import(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:csv,txt',
    ]);

    $file = $request->file('file');

    // Abrimos el archivo CSV
    if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
        $header = fgetcsv($handle, 1000, ','); // Leemos la primera fila como encabezado

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            // Suponiendo que el CSV tiene: Nombre, Raza ID, Edad, Sexo, Descripción
            \App\Models\Perro::create([
                'nombre' => $row[0],
                'raza_id' => $row[1],
                'edad' => $row[2],
                'sexo' => $row[3],
                'descripcion' => $row[4],
            ]);
        }
        fclose($handle);
    }

    return redirect()->route('perros.index')->with('success', 'Perros importados correctamente!');
}
public function downloadPdf(Perro $perro)
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, $perro->nombre, 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, 'Raza: ' . $perro->raza->nombre, 0, 1);
    $pdf->Cell(0, 10, 'Edad: ' . $perro->edad, 0, 1);
    $pdf->Cell(0, 10, 'Sexo: ' . $perro->sexo, 0, 1);
    $pdf->MultiCell(0, 10, 'Descripción: ' . $perro->descripcion);

    if($perro->foto && file_exists(storage_path('app/public/' . $perro->foto))){
        $pdf->Ln(5);
        $pdf->Image(storage_path('app/public/' . $perro->foto), null, null, 60);
    }

    $pdf->Output('D', $perro->nombre . '.pdf'); 
}


}
