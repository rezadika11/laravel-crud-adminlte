<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Prodi::latest()->get();
        return view('prodi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        DB::beginTransaction();
        try {

            Prodi::create($data);
            DB::commit();
            return redirect(route('prodi.index'))->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);

            return back()->withInput()->with('gagal', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::where('id', $id)->first();

        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        DB::beginTransaction();
        try {

            Prodi::where('id', $id)->update($data);
            DB::commit();
            return redirect(route('prodi.index'))->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);

            return back()->withInput()->with('gagal', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {

            $data = Prodi::where('id', $id)->delete();
            DB::commit();
            return redirect(route('prodi.index'))->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return back()->withInput()->with('gagal', 'Data gagal dihapus');
        }
    }
}
