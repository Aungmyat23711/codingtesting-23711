<?php

namespace App\Repositories;

use App\Interfaces\PositionInterface;
use App\Models\Position;



class PositionsRepository implements PositionInterface
{
    public function creatingPosition($position)
    {
        $position->headers->set('Content-Type', 'application/json');
        try {
            $data = new Position();
            $data->department_id = $position->department_id;
            $data->name = $position->name;
            $data->save();
            return response()->json([
                "data" => $position->all(),
                "status" => "success",
                "message" => "Position Created Successfully",
                "status_code" => 200
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "something went wrong",
                "status_code" => 500
            ], 500);
        }
    }
}
