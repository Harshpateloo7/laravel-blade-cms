<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificatesController extends Controller
{
    public function list()
    {
        return view('certificates.list', [
            'certificates' => Certificate::all()
        ]);
    }
     // Add
     public function addForm()
     {
         return view('certificates.add', [
             'certificates' => Certificate::all(),
         ]);
     }
     public function add()
     {
         $attributes = request()->validate([
             'title' => 'required',
             'url' => 'required',
             'learned_at' => 'required',
         ]);
 
         $certificate = new Certificate();
         $certificate->title = $attributes['title'];
         $certificate->url = $attributes['url'];
         $certificate->learned_at = $attributes['learned_at'];
         $certificate->save();
 
         return redirect('/console/certificates/list')
             ->with('message', 'Certificate has been added!');
     }

     public function editForm(Certificate $certificate)
     {
         return view('certificates.edit', [
             'certificate' => $certificate,
         ]);
     }

     public function edit(Certificate $certificate)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'nullable|url',
            'learned_at' => 'required',
        ]);

        $certificate->title = $attributes['title'];
        $certificate->url = $attributes['url'];
        $certificate->learned_at = $attributes['learned_at'];
        $certificate->save();

        return redirect('/console/certificates/list')
            ->with('message', 'Certificate has been edited!');
    }

    public function delete(Certificate $certificate)
    {
        $certificate->delete();
        
        return redirect('/console/certificates/list')
            ->with('message', 'Certificate has been deleted!');

    }
   
    public function imageForm(Certificate $certificate)
    {
        return view('certificates.image', ['certificate' => $certificate]);

    }

    public function image(Certificate $certificate)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($certificate->image)
        {
            Storage::delete($certificate->image);
        }
        
        $path = request()->file('image')->store('certificates');

        $certificate->image = $path;
        $certificate->save();
        
        return redirect('/console/certificates/list')
            ->with('message', 'Certificate image has been edited!');
    }

}
