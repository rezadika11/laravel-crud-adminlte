<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::with('prodi')->get();

        return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {

            Mahasiswa::insert([
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi_id' => $request->prodi,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp
            ]);
            DB::commit();
            return redirect(route('mahasiswa.index'))->with('sukses', 'Data berhasil disimpan');
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
        $mhs = Mahasiswa::where('id', $id)->first();
        $prodi = Prodi::latest()->get();

        return view('mahasiswa.edit', compact('mhs', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswa,email,' . $id,
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {

            Mahasiswa::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'prodi_id' => $request->prodi,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp
                ]);
            DB::commit();
            return redirect(route('mahasiswa.index'))->with('sukses', 'Data berhasil diupdate');
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

            $data = Mahasiswa::where('id', $id)->delete();
            DB::commit();
            return redirect(route('mahasiswa.index'))->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return back()->withInput()->with('gagal', 'Data gagal dihapus');
        }
    }
}
