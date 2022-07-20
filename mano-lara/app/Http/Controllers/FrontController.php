<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class FrontController extends Controller
{
    private $perPage = 10;
    public function index(Request $request)
    {

        $parsedUrl = parse_url(URL::full());
        parse_str($parsedUrl['query'] ?? '', $prevQuery);

        // dd($prevQuery);
        $allCount = DB::table('animals')
        ->select(DB::raw('count(animals.id) AS allAnimals'))
        ->first()->allAnimals;
    $page = $request->page ?? 1;
  

        $colors = Color::all();
        $searchValues = preg_split('/\s+/', $request->s, -1, PREG_SPLIT_NO_EMPTY);
        if ($request->s != '') {
            
            $animalsDb = DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                ->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('animals.name', 'like', "%{$value}%");
                    }
                })
                ->orWhere(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('colors.title', 'like', "{$value}%");
                    }
                })
                ->orderBy('colors.title')->get();

                $allCount =count( DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('animals.name', 'like', "%{$value}%");
                    }
                })
                ->orWhere(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('colors.title', 'like', "{$value}%");
                    }
                })
                ->orderBy('colors.title')->get());    
            return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
        }

        if ($request->color_id == '') {
           
                    // 
            if ($request->sort == 'color-asc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->orderBy('colors.title')->get();
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'color-desc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->select('colors.*', 'animals.*')
                    ->orderByDesc('colors.title')->get();
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'animal-asc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->select('colors.*', 'animals.*')
                    ->orderBy('animals.name')->get();
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'animal-desc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->select('colors.*', 'animals.*')
                    ->orderByDesc('animals.name')->get();
                return view('front/index', ['animals' => $animalsDb,  'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            $animalsDb = DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                ->get()->shuffle();
            return view('front/index', ['animals' => $animalsDb,  'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
        } else {
            if ($request->sort == 'color-asc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->orderBy('colors.title')->get();
                    $allCount =count(DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->orderBy('colors.title')->get()); 
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'allCount' => $allCount, 'prevQuery' => $prevQuery, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'color-desc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->orderByDesc('colors.title')->get();
                    $allCount =count(DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->orderByDesc('colors.title')->get()); 
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'allCount' => $allCount, 'prevQuery' => $prevQuery, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'animal-asc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->orderBy('animals.name')->get();
                    $allCount =count(DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->orderBy('animals.name')->get()); 
                return view('front/index', ['animals' => $animalsDb, 'colors' => $colors, 'req' => $request, 'allCount' => $allCount, 'prevQuery' => $prevQuery, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            if ($request->sort == 'animal-desc') {
                $animalsDb = DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                    ->orderByDesc('animals.name')->get();
                    $allCount =count(DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->where('animals.color_id', $request->color_id)
                    ->select('colors.*', 'animals.*')
                    ->orderByDesc('animals.name')->get());   
                return view('front/index', ['animals' => $animalsDb,  'colors' => $colors, 'req' => $request, 'allCount' => $allCount, 'prevQuery' => $prevQuery, 'pagen' => $page, 'perPage' =>$this->perPage]);
            }
            $animalsDb = DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->offset(($page - 1) * $this->perPage)
                ->limit($this->perPage)
                ->where('animals.color_id', $request->color_id)->get()->shuffle();
                $allCount =count(DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->where('animals.color_id', $request->color_id)->get()->shuffle()); 

            return view('front/index', ['animals' => $animalsDb,  'colors' => $colors, 'req' => $request, 'prevQuery' => $prevQuery, 'allCount' => $allCount, 'pagen' => $page, 'perPage' =>$this->perPage]);
        }
    }
}
