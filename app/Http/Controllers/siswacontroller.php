<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    public function daftar(){
        return view('daftar');
    }

    public function daftar_edit($id){
        $siswa = iswa::findOrFail($id);
        return view('daftar-edit',compact('siswa'));
    }

    public function daftar_print(Request $request, $nis){
        $siswa = siswa::findorfall($nis);
        return view('daftar-print',compact('siswa', 'request'));
    }

    public function daftar_post(Request $request){
        $user = DB::table('siswas')->where('nis',$request->nis)->first();
        $request->validate([
            'nis' => 'required|numeric',
            'email' => 'required|email',
            'nama' => 'required|max:50',
            'jenkel' => 'required',
            'temp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        if(!$user){

            Siswa::create($request->all());

            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->nis);
            $user->remember_token = Str::random(60);
            $user->is_admin = 0;
            $user->siswa_id = $request->nis;
            $user->save();

            return redirect()->route('daftarPrint',$request->nis);

        }else if($user){

            return redirect()->route('daftar')->withInput()->with('error', 'Data Sudah Pernah Didaftarkan !!!');

        }
    }

    public function daftar_update(Request $request, $id) {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|max:50',
            'jenkel' => 'required',
            'temp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('home')->with('success', 'Data Berhasil Diperbarui !');
    
    }
}
