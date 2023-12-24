<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HtmlScript;
use DataTables;
class HtmlController extends Controller
{
    public function index()
    {
        return view('admin.htmlscript.index');
    }

    public function datatable()
    {
        $scripts = HtmlScript::get()
            ->toArray();
        
        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'type' => $new['type'],
                'description' => $new['description'],
            ]; 
        }, $scripts);

        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.htmlscript.create');
    }

    public function store(Request $request)
    {
        $html = new HtmlScript();
        $html->type = $request->type;
        $html->scripts = $request->scripts;
        $html->description = '-';
        $html->save();

        return redirect()->back();
    }
}
