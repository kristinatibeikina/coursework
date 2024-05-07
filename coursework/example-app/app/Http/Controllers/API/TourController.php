<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourStoreRequest;
use App\Http\Resources\TourResource;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Carbon;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TourResource
     */
    public function index()
    {
        return TourResource::collection(Tour::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourStoreRequest $request)
    {
       $create_tour=Tour::create($request->validated());

       return new TourResource($create_tour);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = new TourResource(Tour::findOrFail($id));
        if(! $tour){
            return response()->json(['message'=>'Данного тура не существует'],401);
        }
        return $tour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourStoreRequest $request, $id)
    {
        // Получаем экземпляр модели Tour
        $tour =  new TourResource(Tour::findOrFail($id));

        // Обновляем атрибуты модели с использованием данных из запроса
        $tour->update($request->validated());

        // Возвращаем успешный ответ или что-то еще по вашему усмотрению
        return response()->json(['message' => 'Данные тура изменены', 'tour'=>$tour], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $guide =  new TourResource(Tour::findOrFail($id));

        $guide->delete();

        return response(null, 204);
    }


    public function search(Request $request)
    {
        $query = $request->get('query');

        $results = Tour::where('name', 'like', '%' . $query . '%')->get();
        return response()->json($results);
    }

    public function filter(Request $request)
    {
        $status = $request->input('status');
        $date = $request->input('date');

        $query = Tour::query();

        if ($status) {
            $query->where('id_status', $status);
        }

        if ($date) {
            $formattedDate = Carbon::parse($date)->toDateString();
            $query->whereDate('date_start', $formattedDate);
        }

        $tours = $query->get();

        return response()->json(['tours' => $tours]);
    }
}
