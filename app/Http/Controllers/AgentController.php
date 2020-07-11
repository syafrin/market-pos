<?php

namespace App\Http\Controllers;
use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(){
        $agent = Agent::orderBy('nama_toko','ASC')->paginate(10);
        $data = Agent::all();
        $y = 0;
        foreach($data as $row){
            $hasil[$y]['0'] = $row->nama_toko;
            $hasil[$y]['1'] = $row->latitude;
            $hasil[$y]['2'] = $row->longitude;
            $y++;
        }

        $position = json_encode($hasil);
        $lokasi = Agent::first();
        return view('agent.index',compact('agent','position','lokasi'));
    }
}
