<?php

namespace App\Http\Controllers;

use App\Customer;
use Yajra\DataTables\Facades\DataTables;

class CustomerGetController extends Controller
{
    public function index()
    {
        // return DataTables::eloquent(Customer::query())->make(true);
        try
        {
            $customers = Customer::select(['id', 'name', 'cnum', 'email', 'address']);

            return DataTables::of($customers)
                ->addColumn('action', function ($customers) {
                    return '<button customer_id="' . $customers->id . '" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</button> <button customer_id="' . $customers->id . '" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                })
                ->make(true);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
