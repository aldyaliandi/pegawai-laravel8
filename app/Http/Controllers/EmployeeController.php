<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
use WordTemplate;

class EmployeeController extends Controller
{
    public function index(){
      //  return 'berhasil' ;
        $data = Employee::all();
   //     dd($data);
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai() {
        return view('tambahdata');
    }

    public function insertdata(Request $request) {
        //dd($request->all());
        $data = Employee::create($request->all());
            if($request->hasfile('foto')){
                $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }
        return redirect()->route('pegawai')->with('success','Data berhasil di Tambahkan');
    }

    public function tampilkandata($id) {
         
        $data = Employee::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
        
    }
    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data berhasil di Update'); 

    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data berhasil di Hapus');
    }

    public function createWordDocx() {
        $wordTest = new \PhpOffice\PhpWord\Phpword();

        $newSection = $wordTest->addSection();

        $desc1 =  "Selamat Datang di Website ini";
        $desc2 =  "Semoga sehat selalu";
        $desc1 =  "Sukses Selalu";

        $newSection->addText($desc1);
        $newSection->addText($desc2);

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest,'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {

        }
        return response()->dwonload(storage_path('TestWordFile.docx'));
    }
    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
        //return 'berhasil';
    }

    public function exportword(){
        $data = Employee::all();

        view()->share('data', $data);
        $word = WordTemplate::loadview('datapegawai-doc');
        return $word->download('data.doc');
        //return 'berhasil';
    }
}
