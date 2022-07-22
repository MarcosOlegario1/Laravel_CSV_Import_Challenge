<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomersAPIController extends Controller
{
    public function show()
    {
        $customers = Customer::paginate(15);

        $customersWithoutLastName = Customer::whereNull('last_name')->count();
        $customersWithLastName = Customer::whereNotNull('last_name')->count();
        $customersWithoutGender = Customer::whereNull('gender')->count();
        $customersWithGender = Customer::whereNotNull('gender')->count();



        $dataResponse = [
            'customerswln'  => $customersWithLastName,
            'customerswtln' => $customersWithoutLastName,
            'customerswtg'  => $customersWithoutGender,
            'customerswg'   => $customersWithGender,
            'customers'     => $customers,
        ];

        return response()->json($dataResponse);
    }

    public function destroy()
    {
        Customer::truncate();
    }

}
