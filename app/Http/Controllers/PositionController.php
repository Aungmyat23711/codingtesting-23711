<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Interfaces\PositionInterface;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected PositionInterface $positionInterface;
    public function __construct(PositionInterface $positionInterface)
    {
        return $this->positionInterface = $positionInterface;
    }
    public function createPosition(StorePositionRequest $request)
    {
        return $this->positionInterface->creatingPosition($request);
    }
}
