<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class PharmacyController extends Controller
{

    public function index() {
        $pharmacies = auth()->user()->pharmacies()->limit(10)->get();

        return view('pharmacy.index', [
           'pharmacies' => $pharmacies
       ]);
    }
    public function create() {
        return view('pharmacy.create');
    }

    public function store(StorePharmacyRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $employeeArray = explode(',', $validated['employees']);
        foreach ($employeeArray as $employee) {
            if (strlen($employee) !== 11) {
                return back()->withInput()->withErrors(['employees' => 'Each Employee phone number should be 11 digits long']);
            }
        }

        $employees = User::whereIn('phone_number', $employeeArray)->get();
        if ($employees->count() !== count($employeeArray)) {
            return back()->withInput()->withErrors(['employees' => 'No user exists for that phone number']);
        }

        $pharmacy = Pharmacy::create([
            'name' => $validated['name'],
            'state' => $validated['state'],
            'lga' => $validated['lga'],
        ]);

        $pharmacy->users()->attach(auth()->user()->id, [
            'role' => Role::OWNER,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($employees as $employee) {
            $pharmacy->users()->attach($employee->id, [
                'role' => Role::EMPLOYEE,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->route('pharmacy.index');
    }

    public function show(Pharmacy $pharmacy) {
        $pharmacy->load('users');

        return view('pharmacy.show', [
            'pharmacy' => $pharmacy
        ]);
    }
public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy): RedirectResponse {
    $validated = $request->validated();
    $employeeArray = explode(',', $validated['employees']);
    foreach ($employeeArray as $employee) {
        if(strlen($employee) !== 11) {
            return back()->withInput()->withErrors(['employees' => 'Each Employee phone number should be 11 digits long']);
        }
    }
    $employees = User::whereIn('phone_number', $employeeArray)->get();
    if ($employees->count() !== count($employeeArray)) {
        return back()->withInput()->withErrors(['employees' => 'No user exists for that phone number']);
    }

    $employeeIds = $employees->pluck('id')->toArray();

   $employeeExists = $pharmacy->users()->whereIn('id', $employeeIds)->exists();
    if ($employeeExists) {
        return back()->withInput()->withErrors(['employees' => 'User already exists for this phone number']);
    }


    $pharmacy->users()->attach($employeeIds, [
        'role' => Role::EMPLOYEE,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('pharmacy.show', $pharmacy->id);
}

}
