<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Personne;
use App\Http\Requests\Coupon as CouponRequest;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Validator,Redirect,Response;

class CouponController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Coupon::all();
//dd($result);
    	return view('coupon.index')
    		->with('coupons', $result);
        
       /* $coupons = Coupon::latest()->paginate(5);
        return view('coupon.index', compact('coupons'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
          /*  $data = Coupon::orderBy('id','DESC')->paginate(5);
        return view('coupon.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
          //  return view('coupon.index', ['coupons' => Coupon::all()]);
       /* $marchands = Coupon::latest()->paginate(5);
        return view('coupon.index', compact('coupons'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
    }
 /*   public function index(Request $request)
{
    $query = $id? Personne::whereId($id)->firstOrFail()->coupons() : Coupon::query();
    $coupons = $query->withTrashed()->oldest('numero')->paginate(5);
    $personnes = Personne::all();
    return view('index', compact('coupons', 'personnes', 'nom'));
}*/

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Personne::all();
        return view('coupon.create')
            ->with('catlist', $result);
        //return view('');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'numero'=>'required',
        'montant'=>'required',
        'validité'=>'required',
       'personne_id'=>'required'
    ]);
  
    //Coupon::create($request->all());
   // $coupons=Coupon::all();
      //  Coupon::create($couponRequest->all());
       // return redirect()->route('coupon.index')->with('info', 'Le film a bien été créé');
       $input = $request->all();
     // dd( $input);
       Coupon::create($input);
      
       //var_dump( $input);
       return redirect()->route('coupon.index')->with('info', 'Le coupon a bien été créé');


       }
    
       
  /*  public function show(Coupon $coupon)
    {
        return view('coupon.show', compact('coupon','personne'));
    }*/
    /*public function show(Coupon $coupon)
    {
        dd( $coupon);

        $personne = $coupon->personne;
        // dd( $personne); 
        return view('coupon.show', compact('coupon', 'personne'));
    }*/
      public function show($id)
    {
        $coupon = Coupon::where('id', $id)->firstOrFail();
        $personne = $coupon->personne;
       // dd( $personne); 
        //return view('coupon.show')->with('coupon', $coupon);
        return view('coupon.show', compact('coupon', 'personne'));
    
    } 
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        return view('personne.edit', compact('personne'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'CIN' => 'required|unique:personnes',
            'date_naiss' => 'required',
            'tel' => 'required',
            'adresse' => 'required',
            'Situation_Fam' => 'required',
            'nb_enfants' => 'required'
        ]);

        $personne->update($request->all());

        return redirect()->route('personne.index')
            ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        $personne->delete();

        return redirect()->route('personne.index')
            ->with('success');
    }
}


