<?php

namespace App\Http\Controllers\Welcome;


use Image;
use Auth;
use Hash;
use Str;
use Artisan;
use Session;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Post;
use App\Models\Media;
use App\Models\PostExtra;
use App\Models\User;
use App\Models\Attribute;
use App\Models\CareerApplication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
  
    
	public function geo_filter($id){

      $datas=Country::where('parent_id',$id)->get();

      $geoData =View('geofilter',compact('datas'))->render();

       return Response()->json([
              'success' => true,
              'geoData' => $geoData,
            ]);
    }
    
    public function imageView(Request $r){
        if($r->imageUrl && is_numeric($r->weight) && is_numeric($r->height)){
          $image = Image::make($r->imageUrl)->fit($r->weight,$r->height)->response();
        }else{
          $image = Image::make(public_path('medies/noimage.jpg'))->fit(200,200)->response();
        }
        return $image;
    }
    
    public function imageView2(Request $r,$template=null,$image=null){
        $weight=null;
        $height=null;
        
        if(is_numeric($r->w)){
          $weight=$r->w;  
        }
        if(is_numeric($r->h)){
          $height=$r->h;  
        }
        
        $filePath='medies/noimage.jpg';

        if($image){
            $file =Media::where('file_rename',$image)->select(['file_url'])->first();
            if($file){
                $filePath = $file->file_url;
            }
        }
        
        
        // if($template=='s-profile'){
            
        //     if($image && $image!='profile.png' && $file){
        //         $filePath = $file->file_url;
        //     }else{
        //         $filePath ='medies/profile.png';
        //     }
        // }
        
        $mImage =Image::make(public_path($filePath));
        if($weight && $height){
            $mImage=$mImage->fit($weight,$height);
        }
        $mImage=$mImage->response();
        
        return $mImage;
    }
    public function siteMapXml(Request $r){
        
      $pages = Post::latest()->where('type',0)->where('status','active')->select(['slug','updated_at','status'])->limit(200)->get();
      $posts = Post::latest()->where('type',1)->where('status','active')->select(['slug','updated_at','status'])->limit(500)->get();
      $products = Post::latest()->where('type',2)->where('status','active')->select(['slug','updated_at','status'])->limit(300)->get();
      
      return response()->view('siteMap',compact('pages','posts','products'))->header('Content-Type', 'text/xml');
    }
    public function language($lang=null){
      if($lang){
          Session::put('lang',$lang);
      }else{
          Session::put('lang','en');
      }
      return redirect()->back();
    }

    public function index(Request $r){
        
      $homePage = \App\Models\Post::where('type', 0)->where('template', 'Front Page')->first();

      $latestServices =Post::where('type',3)
      ->where('status','active')
      ->where('fetured',1)
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(3)
      ->get(['id','name','slug','short_description']);

      $latestPosts =Post::where('type',1)
      ->where('status','active')
      ->whereDate('created_at','<=',Carbon::now())
      ->limit(3)
      ->get(['id','name','slug','addedby_id','created_at']);

    	return view(welcomeTheme().'index',compact('homePage','latestServices','latestPosts'));
    }

    public function serviceCategory($slug){
      $category =Attribute::latest()->where('type',0)->where('slug',$slug)->first();
      if(!$category){
        return abort('404');
      }

      $services = Post::whereHas('ctgServices',function($q) use($category){
        $q->where('reff_id',$category->id);
      })
      ->where(function($qq){
        $qq->where('status','active');
      })
      ->select(['id','name','slug','addedby_id','created_at','short_description'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(12);

      return view(welcomeTheme().'services.categoryServices',compact('category','services'));
    }

    public function serviceView($slug){
      $service =Post::latest()->where('type',3)->where('slug',$slug)->first();
      if(!$service){
        return abort('404');
      }

      return view(welcomeTheme().'services.serviceView',compact('service'));
    }

    public function blogCategory($slug){
      $category =Attribute::latest()->where('type',6)->where('slug',$slug)->first();
      if(!$category){
        return abort('404');
      }

      $posts = $category->activePosts()->latest()
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->paginate(10);

      return view(welcomeTheme().'blogs.categoryPosts',compact('category','posts'));
    }

    public function blogTag($slug){
      $tag =Attribute::latest()->where('type',7)->where('slug',$slug)->first();
      if(!$tag){
        return abort('404');
      }

      $posts = Post::whereHas('tagPosts',function($q) use($tag){
        $q->where('reff_id',$tag->id);
      })
      ->where(function($qq){
        $qq->where('status','active');
      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);

      return view(welcomeTheme().'blogs.tagPosts',compact('tag','posts'));
    }

    public function blogAuthor($id,$slug){
      $author =User::find($id);
      if(!$author){
        return abort('404');
      }
      $posts =$author->posts()->latest()->where('type',1)->where('status','active')
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10);
      return view(welcomeTheme().'blogs.authorPosts',compact('author','posts'));

    }

    public function blogView($slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }
      $relatedPosts =$post->relatedPosts()->limit(3)->select(['id','name','slug','short_description','addedby_id','created_at'])->get();
      $comments =$post->postComments()->where('status','active')->select(['id','name','content','created_at'])->paginate(10);

      $newsQuery =fn() => Post::where('type',1)->where('status','active')->whereDate('created_at','<=',date('Y-m-d'))->select(['id','name','slug','created_at']);
      $prevPost =$newsQuery()->where('created_at','>',$post->created_at)->oldest()->first();
      $nextPost =$newsQuery()->where('created_at','<',$post->created_at)->latest()->first();

      return view(welcomeTheme().'blogs.blogView',compact('post','relatedPosts','comments','prevPost','nextPost'));

    }

    public function blogSearch(Request $r){
      $check = $r->validate([
          'search' => 'required|max:100',
      ]);
      
      $posts =Post::latest()->where('type',1)->where('status','active')
      ->where(function($q) use ($r) {
        if($r->search){
          $q->where('name','LIKE','%'.$r->search.'%');
        }

      })
      ->select(['id','name','slug','short_description','addedby_id','created_at'])
      ->whereDate('created_at','<=',date('Y-m-d'))
      ->paginate(10)->appends([
        'search'=>$r->search,
      ]);

      return view(welcomeTheme().'blogs.blogSearch',compact('posts','r'));

    }

    public function blogComments(Request $r,$slug){
      $post =Post::where('type',1)->where('slug',$slug)->first();
      if(!$post){
        return abort('404');
      }

      $check = $r->validate([
          'name' => 'required|max:100',
          'email' => 'required|max:100',
          'website' => 'required|max:100',
          'comment' => 'required|max:1000',
      ]);

      $comments =new Review();

      if(Auth::check()){
      $comments->addedby_id=Auth::id();
      }
      $comments->src_id=$post->id;
      $comments->type=1;
      $comments->name=$r->name;
      $comments->email=$r->email;
      $comments->website=$r->website;
      $comments->content=$r->comment;
      $comments->save();

      Session()->flash('success','Your Comments successfully Submitted.');

      return back();


    }


    public function pageView($slug){
    
      $page =Post::latest()->whereIn('type',[0,1])->where('slug',$slug)->first();

      if(!$page){
        return abort('404');
      }
      
      if($page->type==1){
          
          $post =$page;
          
          $relatedPosts =$post->relatedPosts()->limit(3)->select(['id','name','slug','short_description','addedby_id','created_at'])->get();
          $comments =$post->postComments()->where('status','active')->select(['id','name','content','created_at'])->paginate(10);
          
          return view(welcomeTheme().'blogs.blogView',compact('post','relatedPosts','comments'));
      }
      //If deferent Design or Condition Page Return by ID.

      //Font Home Page
      if($page->template=='Front Page'){
        return redirect()->route('index');
      }

      //Contact Us Page
      if($page->template=='Contact Us'){
        return view(welcomeTheme().'pages.contact',compact('page'));
      }

      //About Us Page
      if($page->template=='About Us'){
        return view(welcomeTheme().'pages.about',compact('page'));
      }

      //Industry Position Page
      if($page->template=='Industry Position'){
        return view(welcomeTheme().'pages.industryPosition',compact('page'));
      }
      
      //Our Vision Page
      if($page->template=='Our Vision'){
        return view(welcomeTheme().'pages.vision',compact('page'));
      }
      
      //Location Page
      if($page->template=='Location'){
        return view(welcomeTheme().'pages.location',compact('page'));
      }
      
      //Career Page
      if($page->template=='Career'){
        return view(welcomeTheme().'pages.career',compact('page'));
      }

      //Clients Page
      if($page->template=='All Clients'){
        return view(welcomeTheme().'pages.clients',compact('page'));
      }

      //Liver Function Test Page
      if($page->template=='Liver Function Test'){
        return view(welcomeTheme().'pages.liverFunctionTest',compact('page'));
      }

      //What Is the Liver Page
      if($page->template=='What Is the Liver'){
        return view(welcomeTheme().'pages.whatIsLiver',compact('page'));
      }

      //Hepatitis Basics Page
      if($page->template=='Hepatitis Basics'){
        return view(welcomeTheme().'pages.hepatitisBasics',compact('page'));
      }

      //Hepatitis A Page
      if($page->template=='Hepatitis A'){
        return view(welcomeTheme().'pages.hepatitisA',compact('page'));
      }

      //Hepatitis B Page
      if($page->template=='Hepatitis B'){
        return view(welcomeTheme().'pages.hepatitisB',compact('page'));
      }

      //Hepatitis C Page
      if($page->template=='Hepatitis C'){
        return view(welcomeTheme().'pages.hepatitisC',compact('page'));
      }

      //Hepatitis D Page
      if($page->template=='Hepatitis D'){
        return view(welcomeTheme().'pages.hepatitisD',compact('page'));
      }

      //Hepatitis E Page
      if($page->template=='Hepatitis E'){
        return view(welcomeTheme().'pages.hepatitisE',compact('page'));
      }

      //Official Message Page
      if($page->template=='Official Message'){
        return view(welcomeTheme().'pages.officialMessage',compact('page'));
      }

      //Mission Statement Page
      if($page->template=='Mission Statement'){
        return view(welcomeTheme().'pages.missionStatement',compact('page'));
      }

      //Goals & Objectives Page
      if($page->template=='Goals & Objectives'){
        return view(welcomeTheme().'pages.goalsObjectives',compact('page'));
      }

      //Executive Committee Page
      if($page->template=='Executive Committee'){
        return view(welcomeTheme().'pages.executiveCommittee',compact('page'));
      }

      //Founder Members Page
      if($page->template=='Founder Members'){
        return view(welcomeTheme().'pages.founderMembers',compact('page'));
      }

      //Life Members Page
      if($page->template=='Life Members'){
        return view(welcomeTheme().'pages.lifeMembers',compact('page'));
      }

      //Contributors Page
      if($page->template=='Contributors'){
        return view(welcomeTheme().'pages.contributors',compact('page'));
      }

      //Donations Page
      if($page->template=='Donations'){
        return view(welcomeTheme().'pages.donations',compact('page'));
      }

      //Latest Blog Page
      if($page->template=='Latest Blog'){
        $posts = Post::latest()->where('type',1)->where('status','active')
        ->select(['id','name','slug','short_description','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(20);
        return view(welcomeTheme().'blogs.latestBlogs',compact('posts','page'));
      }

      //Latest Services Page
      if($page->template=='Latest Services'){
        $services = Post::latest()->where('type',3)->where('status','active')->where('fetured',0)
        ->select(['id','name','slug','short_description','description','seo_title','addedby_id','created_at'])
        ->whereDate('created_at','<=',date('Y-m-d'))
        ->paginate(12);
        return view(welcomeTheme().'services.latestServices',compact('services','page'));
      }

      return view(welcomeTheme().'pages.pageView',compact('page'));

    }

    public function contactMail(Request $r){

      // Home page form sends first & last name separately
      if($r->filled('first_name') || $r->filled('last_name')){
        $r->merge(['name'=>trim($r->first_name.' '.$r->last_name)]);
      }

      $r->validate([
          'name' => 'required|max:100',
          'email' => 'required|email|max:100',
          'subject' => 'nullable|max:100',
          'message' => 'required|max:3000',
      ]);

      $anchor = in_array($r->anchor, ['#contact','#contact-form']) ? $r->anchor : '';
      $successMsg = 'Thank you! Your message has been sent. We will get back to you soon.';

      // Spam trap: real visitors never fill this hidden field
      if($r->filled('website')){
        Session()->flash('contact_success',$successMsg);
        return redirect()->to(url()->previous().$anchor);
      }

      // Contact messages are always emailed, even when the general mail switch is off
      $sent = false;
      if(general()->mail_from_address){
          $datas = array('contact'=>[
              'name' => $r->name,
              'email' => $r->email,
              'subject' => $r->subject ?: 'Website Contact Form',
              'message' => $r->message,
              'sent_at' => now()->format('d M Y, h:i A'),
              'page' => url()->previous(),
          ]);
          $toEmail = general()->mail_from_address;
          $toName = general()->mail_from_name;
          $subject = 'New Contact Message from '.$r->name.' - '.(general()->title ?: config('app.name'));

          $sent = sendMail($toEmail,$toName,$subject,$datas,'mails.ContactFormMail',null,['email'=>$r->email,'name'=>$r->name]);
      }

      if($sent){
        Session()->flash('contact_success',$successMsg);
      }else{
        \Log::warning('Contact mail not sent'.(general()->mail_from_address ? '' : ': Mail From Address is empty in mail settings'));
        $fallback = general()->email ?: general()->mail_from_address;
        Session()->flash('contact_error','Sorry, your message could not be sent right now. Please try again later'.($fallback ? ' or email us directly at '.$fallback : '').'.');
        $r->flash();
      }

      return redirect()->to(url()->previous().$anchor);
    }

    public function bookingMail(Request $r){
      $r->validate([
          'shipper' => 'required|max:191',
          'consignee' => 'required|max:191',
          'commodity' => 'required|max:191',
          'gross_weight' => 'required|max:100',
          'cubic_volume' => 'required|max:100',
          'destination' => 'required|max:191',
          'email' => 'required|email|max:150',
      ]);

      $successMsg = 'Thank you! Your booking request has been sent. We will contact you soon.';

      // Spam trap: real visitors never fill this hidden field
      if($r->filled('website')){
        return response()->json(['success'=>true,'message'=>$successMsg]);
      }

      // Booking requests are always emailed, even when the general mail switch is off
      $sent = false;
      if(general()->mail_from_address){
          $datas = array('booking'=>[
              'shipper' => $r->shipper,
              'consignee' => $r->consignee,
              'commodity' => $r->commodity,
              'gross_weight' => $r->gross_weight,
              'cubic_volume' => $r->cubic_volume,
              'destination' => $r->destination,
              'email' => $r->email,
              'sent_at' => now()->format('d M Y, h:i A'),
              'page' => url()->previous(),
          ]);
          $toEmail = general()->mail_from_address;
          $toName = general()->mail_from_name;
          $subject = 'New Booking Request from '.$r->shipper.' - '.(general()->title ?: config('app.name'));

          $sent = sendMail($toEmail,$toName,$subject,$datas,'mails.BookingMail',null,['email'=>$r->email,'name'=>$r->shipper]);
      }

      if(!$sent){
        \Log::warning('Booking mail not sent'.(general()->mail_from_address ? '' : ': Mail From Address is empty in mail settings'));
        $fallback = general()->email ?: general()->mail_from_address;
        return response()->json([
          'success'=>false,
          'message'=>'Sorry, your booking could not be sent right now. Please try again later'.($fallback ? ' or email us directly at '.$fallback : '').'.',
        ],500);
      }

      return response()->json(['success'=>true,'message'=>$successMsg]);
    }

    public function careerApply(Request $r){
      $r->validate([
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'email' => 'required|email|max:150',
          'country' => 'nullable|max:100',
          'phone' => 'required|max:30',
          'subject' => 'nullable|max:191',
          'department' => 'required|in:'.implode(',', CareerApplication::DEPARTMENTS),
          'message' => 'nullable|max:2000',
          'resume' => 'required|file|mimes:pdf|max:5120',
      ],[
          'resume.mimes' => 'Please upload your resume as a PDF file.',
          'resume.max' => 'Resume must not be larger than 5MB.',
      ]);

      $file = $r->file('resume');
      $path = $file->storeAs('careers', date('Ymd_His').'_'.Str::random(8).'.pdf', 'local');

      $application = CareerApplication::create([
          'first_name' => $r->first_name,
          'last_name' => $r->last_name,
          'email' => $r->email,
          'country' => $r->country,
          'phone' => $r->phone,
          'subject' => $r->subject,
          'department' => $r->department,
          'message' => $r->message,
          'resume_path' => $path,
          'resume_name' => Str::limit($file->getClientOriginalName(), 180, ''),
          'ip_address' => $r->ip(),
      ]);

      if(general()->mail_from_address){
          $datas = array('application'=>$application);
          $template = 'mails.CareerMail';
          $toEmail = general()->mail_from_address;
          $toName = general()->mail_from_name;
          $subject = 'New Career Application: '.$application->fullName().' ('.$application->department.')';
          $attachments = [[
              'path' => storage_path('app/'.$path),
              'name' => $application->resume_name ?: 'resume.pdf',
              'mime' => 'application/pdf',
          ]];

          sendMail($toEmail,$toName,$subject,$datas,$template,$attachments);
      }

      Session()->flash('success','Thank you! Your application has been submitted successfully. We will contact you soon.');
      return back();
    }

    public function search(Request $r){
      
      if($r->search){

        $posts =Post::where('status','active')
        ->where(function($q) use($r){
          $q->where('search_key','LIKE','%'.$r->search.'%');
        })
        ->paginate(24);

      }else{
        $posts = array();
      }

      return view(welcomeTheme().'search');

    }

    public function subscribe(Request $r){

      if(filter_var($r->email, FILTER_VALIDATE_EMAIL)){
        $subscribe =PostExtra::latest()->where('type',1)->where('name',$r->email)->first();

        if(!$subscribe){
          
            $subscribe =new PostExtra();
            $subscribe->type=1;
            $subscribe->name=$r->email;
            $subscribe->save();
          $status=true;
          $message ='<p style="color: #009688;"><span>Success:</span> You Are Successfully Subsribe.</p>';
        }else{
          $status=true;
          $message ='<p style="color: #ffc107;"><span>Note:</span> You Are Already Subsribe.Thank You.</p>';
        }


      }else{
        $status=false;
        $message ='<p style="color: #ff5722;"><span>Error:</span> Email Are Not validated</p>';
      }

      if(request()->ajax()){
        
        return Response()->json([
                'success' => $status,
                'message' => $message,
              ]);
      }

      Session()->flash($status?'success':'error',$message);
      return redirect()->back();

    }





}
