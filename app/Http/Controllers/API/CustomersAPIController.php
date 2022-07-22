<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Illuminate\Http\Request;

class CustomersAPIController extends Controller
{
    public function show()
    {
        $customers = Customer::paginate(15);

        // $customersWithoutLastName = Customer::whereNull('last_name')->count();
        // $customersWithLastName = Customer::whereNotNull('last_name')->count();
        // $customersWithoutGender = Customer::whereNull('gender')->count();
        // $customersWithGender = Customer::whereNotNull('gender')->count();
        // $customersEmail = Customer::get('email');

        $validEmail = 0;
        $inValidEmail = 0;

        $validator = new EmailValidator();
        // $multipleValidations = new MultipleValidationWithAnd([
        //     new RFCValidation(),
        //     new DNSCheckValidation()
        // ]);
        // foreach($customersEmail as $emails)
        // {
        //     $validation = $validator->isValid($emails, $multipleValidations);
        //     $validation ? $validEmail++ : $inValidEmail++;
        // }


        $dataResponse = [
                        //   'withoutln' => $customersWithoutLastName,
                        //   'withln'    => $customersWithLastName,
                        //   'withoutg'  => $customersWithoutGender,
                        //   'withg'     => $customersWithGender,
                        //   'validE'    => $validEmail,
                        //   'invalidE'  => $inValidEmail,
                          'customers' => $customers,
                        ];



        return response()->json($dataResponse);
    }

    public function genderGraphic()
    {
        $customersWithoutGender = Customer::whereNull('gender')->count();
        $customersWithGender = Customer::whereNotNull('gender')->count();

        $genderGraphic = [
            'withoutg'  => $customersWithoutGender,
            'withg'     => $customersWithGender,
        ];



        return response()->json($genderGraphic);
    }


}
