<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    public function index(){
        return view('admin.kategori',[
            'kategoris'=>Kategori::withCount('produks')->with('produks')->orderBy('id')->get(),
            'produks'=>\App\Models\Produk::orderBy('nama')->get()
        ]);
    }
    public function store(Request $request){
        $data=$request->validate(['nama'=>'required|string|max:100','deskripsi'=>'nullable|string','produk_ids'=>'array','produk_ids.*'=>'exists:produks,id']);
        $kategori=Kategori::create(['nama'=>$data['nama'],'deskripsi'=>$data['deskripsi']??null]);
        $kategori->produks()->sync($data['produk_ids']??[]);
        return response()->json(['message'=>'Kategori berhasil ditambahkan.']);
    }
    public function update(Request $request,Kategori $kategori){
        $data=$request->validate(['nama'=>'required|string|max:100','deskripsi'=>'nullable|string','produk_ids'=>'array','produk_ids.*'=>'exists:produks,id']);
        $kategori->update(['nama'=>$data['nama'],'deskripsi'=>$data['deskripsi']??null]);
        $kategori->produks()->sync($data['produk_ids']??[]);
        return response()->json(['message'=>'Kategori berhasil diperbarui.']);
    }
    public function destroy(Kategori $kategori){$kategori->delete();return response()->json(['message'=>'Kategori berhasil dihapus.']);}
}
