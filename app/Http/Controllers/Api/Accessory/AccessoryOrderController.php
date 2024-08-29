<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Repositories\Classes\AccessoryOrderRepository;
use Illuminate\Http\Request;

class AccessoryOrderController extends Controller
{
    protected $accessoryOrderService;
    protected $accessoryOrderRepository;

    public function __construct(AccessoryOrderRepository $accessoryOrderRepository)
    {
        // $this->accessoryOrderService = $accessoryOrderService;
        $this->accessoryOrderRepository = $accessoryOrderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->accessoryOrderRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
