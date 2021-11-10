<?php

namespace App\Http\Controllers;

use App\Models\PiggyBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PiggyBankController extends Controller
{
    private function getPiggiesBank()
    {
        return PiggyBank::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }

    public function findPiggyBank($id)
    {
        return PiggyBank::where([
            ['id_user', '=', Auth::user()->id_user],
            ['id_piggy_bank', '=', $id],
            ['deleted', false]
        ])->firstOrFail();
    }

    private function findPiggyBankWithList($id)
    {
        return [
            'piggy_bank' => $this->findPiggyBank($id),
            'piggies_bank' => $this->getPiggiesBank()
        ];
    }
    public function index()
    {
        return view('piggy-bank.index', [
            'piggies_bank' => $this->getPiggiesBank()
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        $data['id_user'] = Auth::user()->id_user;

        if(!PiggyBank::create($data))
            return back()->withErrors('An error ocurred while created a new piggy bank '.$data['title'].'.');

        return back()->with('success', 'Your piggy bank '.$data['title'].' was created with success.');
    }

    public function edit(Request $request)
    {
        return view('piggy-bank.edit', $this->findPiggyBankWithList($request->id));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $piggy_bank = $this->findPiggyBank($request->id_piggy_bank);

        $piggy_bank->fill($data);

        if(!$piggy_bank->save())
            return back()->withErrors('An error ocurred while updated the piggy bank '.$piggy_bank['title'].'.');

        return redirect('/piggy-bank')->with('warning', 'Your piggy bank '.$piggy_bank['title'].' was updated with success.');
    }

    public function delete(Request $request)
    {
        return view('piggy-bank.delete', $this->findPiggyBankWithList($request->id));
    }

    public function destroy(Request $request)
    {
        $piggy_bank = $this->findPiggyBank($request->id_piggy_bank);

        $piggy_bank->deleted = true;
        $piggy_bank->deleted_at = date("Y-m-d H:i:s");

        if(!$piggy_bank->save())
            return redirect('/piggy-bank')->withErrors('An error ocurred while deleted the piggy bank '.$piggy_bank['title'].'.');

        return redirect('/piggy-bank')->with('warning', 'Your piggy bank '.$piggy_bank['title'].' was deleted with success.');
    }

}
