<?php
namespace App\Http\Controllers;//use App\User;
use App\Models\BookAuthorsJob;
use App\Models\Books; // <-- your model is  
use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our code 
use Illuminate\Http\Request; // <-- handling http request in lumen

Class UserJobController extends Controller {
 // use to add your Traits ApiResponser
 use ApiResponser;
 private $request;
 public function __construct(Request $request){
 $this->request = $request;
 }
 
 /**
 * Return the list of usersjob
 * @return Illuminate\Http\Response
 */
 public function index()
 {
 $bookauthors = BookAuthorsJob::all();
 return $this->successResponse($bookauthors);
 
 }
 /**
 * Obtains and show one userjob
 * @return Illuminate\Http\Response
 */
 public function show($id)
 {
 $bookauthors = BookAuthorsJob::findOrFail($id);
 return $this->successResponse($bookauthors); 
 }
 public function add(Request $request )
 {
     $rules = [ 
     'fullname' => 'required|max:50',
     'gender' => 'required|max:50',
     'birthday' => 'required|date',

     ];
     $this->validate($request,$rules);
     $bookauthors = BookAuthorsJob::create($request->all());
     //$books = Books::findOrFail($request->primarykey);
     return $this->successResponse($bookauthors, Response::HTTP_CREATED);
 }

 public function update(Request $request,$id)
 {
    $rules = [ 
        'fullname' => 'required|max:50',
        'gender' => 'required|max:50',
        'birthday' => 'required|date',
   
        ];
        $this->validate($request,$rules);
        $bookauthors = BookAuthorsJob::findOrFail($id);
        
        $bookauthors->fill($request->all());
        // if no changes happen
        if ($bookauthors->isClean()) {
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $bookauthors->save();
        return $this->successResponse($bookauthors);
 }

 public function delete($id)
 {
     $bookauthors = BookAuthorsJob::findOrFail($id);
     $bookauthors->delete();
     return $this->successResponse($bookauthors);
 
}
}

