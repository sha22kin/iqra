<?php

namespace App\Http\Controllers\Admin;

use App\Models\CareerApplication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function careers(Request $r){

      // Bulk Action Start
      if($r->action){
        if($r->checkid){
          $selected = CareerApplication::whereIn('id',$r->checkid)->get();

          if($r->action==1){
            CareerApplication::whereIn('id',$r->checkid)->whereNull('read_at')->update(['read_at'=>now()]);
          }elseif($r->action==2){
            CareerApplication::whereIn('id',$r->checkid)->update(['read_at'=>null]);
          }elseif($r->action==3){
            foreach($selected as $application){
              $application->deleteResume();
              $application->delete();
            }
          }

          Session()->flash('success','Action Successfully Completed!');
        }else{
          Session()->flash('info','Please Need To Select Minimum One Application');
        }

        return redirect()->back();
      }
      // Bulk Action End

      $applications = CareerApplication::latest()
      ->where(function($q) use($r){
        if($r->search){
          $q->where(function($qq) use($r){
            $qq->where('first_name','LIKE','%'.$r->search.'%')
            ->orWhere('last_name','LIKE','%'.$r->search.'%')
            ->orWhere('email','LIKE','%'.$r->search.'%')
            ->orWhere('phone','LIKE','%'.$r->search.'%')
            ->orWhere('subject','LIKE','%'.$r->search.'%');
          });
        }
        if($r->department){
          $q->where('department',$r->department);
        }
        if($r->status=='unread'){
          $q->whereNull('read_at');
        }elseif($r->status=='read'){
          $q->whereNotNull('read_at');
        }
      })
      ->paginate(25)->appends($r->only(['search','department','status']));

      $totals = (object)[
        'total' => CareerApplication::count(),
        'unread' => CareerApplication::whereNull('read_at')->count(),
        'read' => CareerApplication::whereNotNull('read_at')->count(),
      ];

      $departments = CareerApplication::DEPARTMENTS;

      return view(adminTheme().'careers.careersAll',compact('applications','totals','departments'));
    }

    public function careersAction(Request $r,$action,$id){

      $application = CareerApplication::find($id);
      if(!$application){
        Session()->flash('error','This Application Is Not Found');
        return redirect()->route('admin.careers');
      }

      if($action=='view'){
        if(!$application->read_at){
          $application->read_at = now();
          $application->save();
        }
        return view(adminTheme().'careers.careerView',compact('application'));
      }

      if($action=='resume'){
        if(!Storage::disk('local')->exists($application->resume_path)){
          Session()->flash('error','Resume file is missing');
          return redirect()->back();
        }
        $fileName = \Str::slug($application->fullName()).'-resume.pdf';
        $headers = ['Content-Type'=>'application/pdf'];

        if($r->download){
          return Storage::disk('local')->download($application->resume_path,$fileName,$headers);
        }
        return response()->file(storage_path('app/'.$application->resume_path),$headers + ['Content-Disposition'=>'inline; filename="'.$fileName.'"']);
      }

      if($action=='unread'){
        $application->read_at = null;
        $application->save();
        Session()->flash('success','Marked As Unread');
        return redirect()->route('admin.careers');
      }

      if($action=='delete'){
        $application->deleteResume();
        $application->delete();
        Session()->flash('success','Application Deleted Successfully');
        return redirect()->route('admin.careers');
      }

      return abort(404);
    }
}
