<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;
use ProjetoDigital\Models\ProjectType;
use ProjetoDigital\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Input;

class ProjectDocumentsController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        return view('customer.projects.docs', compact('project'));
    }

    public function view($id,$projectDocument)
    {
        return response()->file(storage_path('app/public/projeto_'.$id.'/'.$projectDocument.'.pdf'));
    }

    public function download(ProjectDocument $projectDocument)
    {
        $this->authorize('view', $projectDocument);

        return Storage::download($projectDocument->path, $projectDocument->name.'.pdf');
    }

    public function send(Project $project)
    {
        return view('customer.projects.send-documents', compact('project'));
    }

    public function store(Project $project ,Request $request)
    {

        $this->authorize('update', $project);

        foreach ($project->projectType->documentTypes as $documentType)
        {
            $request->validate([
                $documentType->name => 'mimes:pdf|max:100000'
            ]);
        }

//dd($project->projectType);
//
//        $folder = "public/projeto_".$project->id;
//
//        foreach ($project->projectType->checklists as $item)
//        {
//            $name = $item->name;
//
//            if (!is_null($request->name))
//            {
//                dd($request->name);
//                $project->projectDocuments()->create([
//                    'name' => $name,
//                    'description' => $item->text,
//                    'path' => $request->name->storeAs($folder, $name.'.pdf')
//                ]);
//            }
//       }


        $event = Event::createEvent($project,7,Auth::user()->id,null);

        $inputs = $request->all();

        foreach ($inputs as $key => $input) {
            if(Input::hasFile($key)) {

//                $file = Input::file($key);
//
//                if (Input::hasFile($key))
//                {
//                   echo '---- tem arquivo';
//                }
//
//// Determining If An Uploaded File Is Valid
//                if (Input::file($key)->isValid())
//                {
//                    echo '---- valido';
//                }

//// Getting Requested file path
//                $path = Input::file($key)->getRealPath();
//                echo $path . '---- $path';
//// Getting Original name of the file
////**Edit** - gives the original filename as on uploading user's system. **Edit end**
//                echo Input::file($key)->getClientOriginalName();
//
//// Getting uploaded File extention
//                echo Input::file($key)->getClientOriginalExtension();
//
//// Getting Size of the file
//                echo Input::file($key)->getSize();
//
//// Getting MIME Type of uploaded file
////                echo Input::file($key)->getMimeType();
//
//                dd('------');



//$path = Input::file($key)->getRealPath();
//$name = Input::file($key)->getClientOriginalName();

//dd($path .'\\' . $name);

                $eventDocument=  new \ProjetoDigital\Models\EventDocument();
                $eventDocument->name = Input::file($key)->getClientOriginalName();
                $eventDocument->content = base64_encode(file_get_contents(Input::file($key)->getRealPath()));
                $eventDocument->document_type_id = $key;
                $eventDocument->event_id = $event->id;

                $eventDocument->save();
//                dd($key , $inputs, $input, Input::hasFile($key), $eventDocument);
                //Input::file($key);
                //$EventDocument->

            }
        }
//        dd($inputs);

        $this->alert('Projeto criado com sucesso!');

        return redirect('/projects');
 
    }

    public function edit(ProjectDocument $projectDocument)
    {
        return view('customer.projects.replace-doc', compact('projectDocument'));
    }

    public function replace(ProjectDocument $projectDocument, Request $request)
    {

    $name = $projectDocument->name;

    $request->validate([
        $name => 'mimes:pdf|max:10000'
    ]);

    $id = $projectDocument->project->id;
    
    $folder = "public/projeto_".$id;

    $path = $request->$name->storeAs($folder, $name.'.pdf');

    $projectDocument->touch();

    Event::createEvent($projectDocument->project,10,Auth::user()->id,$projectDocument->description);

    $this->alert('Documento atualizado com sucesso!');

    return redirect('/projects/'.$id.'/docs');
    
    }

    public function destroy(ProjectDocument $projectDocument)
    {
        $this->authorize('delete', $projectDocument);

        $projectDocument->delete();

        $this->alert('Arquivo excluído com sucesso!');

        return back();
    }

    public function analyze(Project $project)
    {
        return view('backend.projects.analyze', compact('project'));
    }

    public function approve(Project $project, Request $request)
    {
        foreach ($project->projectDocuments as $doc) 
        {
           $name = $doc->name;

            if ($request->$name == 1) 
            {
                ProjectDocument::analyze($project,$name,1);
            } else {
                ProjectDocument::analyze($project,$name,0);
            } 
        }

        Event::createEvent($project, $request->status_id, Auth::user()->id, $request->obs);

        $project->status_id = $request->status_id + 1;
        $project->save();

        return redirect('/backend/projects');
    }
}
