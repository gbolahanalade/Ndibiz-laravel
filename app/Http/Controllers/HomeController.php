<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\State;
use App\Lga;
use App\Biz;
use App\Cat;
use App\SubCat;
use Input;
use App\Review;

class HomeController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth',['only'=>'home']);
    }

   public function index()
	{
		$cats = Cat::all()->take(5);
		$bizs = Biz::orderBy('created_at', 'desc')->take(6);
		$totalCat=Cat::count();
		$totalSubCat=subCat::count();
		$stateList= State::lists('name','id');
		$catList   = SubCat::lists('name','id')->take(8); 
	    $featured= Biz::whereFeatured('YES')->get();
		return view('pages.index', compact('stateList','catList','cats','featured', 'totalCat', 'totalSubCat',
		 'subs'));
	}

	public function home()
	{
		$cats = Cat::all()->take(5);
		$bizs = Biz::orderBy('created_at', 'desc')->take(6);
		$totalCat=Cat::count();
		$totalSubCat=subCat::count();
		$stateList= State::lists('name','id');
		$catList   = SubCat::lists('name','id')->take(8); 
	    $featured= Biz::whereFeatured('YES')->get();
		return view('pages.index', compact('stateList','catList','cats','featured', 'totalCat', 'totalSubCat',
		 'subs'));
	}

	public function businesses()
	{
		$cats = Cat::all();
		$totalBiz=Biz::count();
		$totalCat=Cat::count();
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(6);
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		 $featured= Biz::whereFeatured('YES')->paginate(3);
		 $recent= Biz::orderBy('created_at', 'desc')->paginate(2);
		// dd($featured);
		return view('pages.businesses', compact('stateList','catList','cats','bizs','featured','recent', 'totalBiz', 'totalCat'));
	}

	public function userProfile()
	{
		$cats = Cat::all();
		$bizs = Biz::orderBy('created_at', 'desc')->paginate(6);
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		 $featured= Biz::whereFeatured('YES')->paginate(3);
		 $recent= Biz::orderBy('created_at', 'desc')->paginate(2);
		// dd($featured);
		return view('pages.user-profile', compact('stateList','catList','cats','bizs','featured','recent', 'totalBiz', 'totalCat'));
	}

	public function categories()
	{

		$cats=  Cat::all();
		$totalBiz=Biz::count();
		$totalCat=Cat::count();
		$totalSubCat=subCat::count();
		$stateList= State::lists('name','name');
		$catList  = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(2);
		return view('pages.categories', compact('stateList','catList','featured','cats','recent', 'totalBiz', 'totalCat',
		 'totalSubCat'));
	}

	public function searchResults()
	{
		
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->get();

         return view('pages.search-results', compact('stateList','catList','cats','featured'));
	}
	
	public function regbiz()
	{
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name');

		return view('pages.regbiz', compact('stateList', 'catList'));
	}

	public function searchResult()
	{	
		$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);
		$val= Input::get('category');
		$loc=Input::get('location');
		if( $sub= SubCat::whereName($val)->first()){
			$subID= $sub->id;
				
	      		if( $area=Lga::whereName($loc)->first()) {
	      				$areaID=$area->id;
	      				$bizs= Biz::bySub($subID)->byArea($areaID)->get();	      				
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}    				
	      	
	       			} else {
	      			 	$state=State::whereName($loc)->first();
	      			 	$stateID=$state->id;
	      			 	$bizs= Biz::bySub($subID)->byState($stateID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$sub->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','key','loc'));
	  					}
	  				} 

		   
		  } else {
		   	$cat= Cat::whereName($val)->first();
		   	$catID=$cat->id;
		   			if( $area=Lga::whereName($loc)->first()) {
	      				$areaID=$area->id;
	      				$bizs= Biz::byCat($catID)->byArea($areaID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$cat->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					} 
	      				
	      	
	       			} else {
	      			 	$state=State::whereName($loc)->first();
	      			 	$stateID=$state->id;
	      			 	$bizs= Biz::byCat($catID)->byState($stateID)->get();
	      				if($bizs -> count() > 0){
	      					return view('pages.search-page',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					}else{
	  						$bizs=$cat->biz;
	  						return view('pages.no-search',compact('bizs','stateList','catList','cats','featured','recent','val','loc'));
	  					} 
	      			 }


		    }	
		
	}

	public function search()
	{
		return view('pages.search');
	}
	public function confirm()
	{
		return view('pages.activate');
	}

	public function getBusiness($catId)
	{
	 		$biz = Biz::where('cat_id', $catId)->first();
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);

         return view('pages.biz-result', array('biz'=>$biz,'reviews'=>$reviews));
    }
	 
	 public function getBizreview($id)
	 {
	 	
	 	  $stateList= State::lists('name','name');
		  $catList   = Cat::lists('name','name');
	 	  $biz = Biz::findOrFail($id);
	 	  $hours=$biz->hours;
	 	  $mon=$biz->hours->where('day','MON')->first();
	 	  $tue=$biz->hours->where('day','TUE')->first();
	 	  $wed=$biz->hours->where('day','WED')->first();
	 	  $thu=$biz->hours->where('day','THU')->first();
	 	  $fri=$biz->hours->where('day','FRI')->first();
	 	  $sat=$biz->hours->where('day','SAT')->first();
	 	  $sun=$biz->hours->where('day','SUN')->first();
	 	  //dd($mon->open_time);
	 	 
	 	 // $mon=\App\BusinessHour::all();
        // Get all reviews that are not spam for the business and paginate them
        $reviews = $biz->reviews()->with('user')->approved()->notSpam()
        ->orderBy('created_at','desc')->paginate(50);
        $featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);

         return view('pages.biz-profile', array('biz'=>$biz,'reviews'=>$reviews,'stateList'=>$stateList,
         	'catList'=>$catList), compact('featured','recent','mon','tue','wed','thu','fri','sat','sun'));
	 }

	 public function postReview($id)
	 {  
	 	$input = array(
		'comment' => \Input::get('comment'),
		'rating'  => \Input::get('rating')
	   );

	 	$review = new Review();
	 	$validator = \Validator::make( $input, $review->getCreateRules());

	 	if ($validator->passes()) {
	 		$review->storeReviewForBiz($id, $input['comment'], $input['rating']);
				return redirect('review/biz/'.$id.'#company-reviews')->with('success','Review Submitted successfully');
	         		  }

	       		return redirect('review/biz/'.$id.'#company-reviews')->with('errors', $validator->messages())->withInput();
	 }

	 public function postMessage(MessageRequest $request, $id)
	 {
	 	$review = new Review();
	 	$review->storeReviewForBiz($id, $request->comment, $request->rating);
		return redirect('review/biz/'.$id.'#company-reviews')->with('success','Review Submitted successfully');

	 }


	 public function bizSub($id)
	 {
	 	$sub= SubCat::findOrFail($id);
	 	$bizs=$sub->biz;
	 	$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$loc=Input::get('location');
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);

		return view('pages.biz-sub',compact('bizs','stateList','catList','loc','cats','featured','recent','sub'));
	 }

	  public function bizCat($id)
	 {
	 	$cat= Cat::findOrFail($id);
	 	$bizs=$cat->biz;
	 	$cats = Cat::all();
		$stateList= State::lists('name','name');
		$catList   = Cat::lists('name','name'); 
		$featured= Biz::whereFeatured('YES')->paginate(3);
		$recent= Biz::orderBy('created_at', 'desc')->paginate(1);

		return view('pages.biz-sub',compact('bizs','stateList','catList','cats','featured','recent','cat'));
	 }
}
