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

class CouponController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $coupons = Coupon::latest()->paginate(5);
        return view('coupon.index', compact('coupons'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
          /*  $data = Coupon::orderBy('id','DESC')->paginate(5);
        return view('coupon.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
            return view('coupon.index', ['coupons' => Coupon::all()]);
       /* $marchands = Coupon::latest()->paginate(5);
        return view('coupon.index', compact('coupons'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
    }
 /*   public function index(Request $request)
{
    $query = $CIN? Personne::whereCIN($CIN)->firstOrFail()->coupons() : Coupon::query();
    //$coupons = $query->withTrashed()->oldest('numero')->paginate(5);
    $personnes = Personne::all();
    return view('index', compact('coupons', 'personnes', 'CIN'));
}*/

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon.create');
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
        'validité'=>'required'
    ]);
   
    Coupon::create($request->all());
    $coupons=Coupon::all();
    return redirect()->route('coupon.index')->with('info', 'Le film a bien été créé');
      //  Coupon::create($couponRequest->all());
       // return redirect()->route('coupon.index')->with('info', 'Le film a bien été créé');
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        return view('personne.show', compact('personne'));
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


