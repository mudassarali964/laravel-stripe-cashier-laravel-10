<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Cashier\Cashier;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::orderBy('id', 'DESC')->get();

        return view("admin.plans.index", compact("plans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.plans.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|between:0,1000',
            'description' => 'required'
        ]);

        $this->validateStripeKeys();

        $this->createStripePlan($request);

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    /**
     * Validate Stripe Api Keys
     */
    private function validateStripeKeys() {
        if (!config('custom.stripe_key') && !config('custom.stripe_secret')) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Check you .env file for Stripe keys. (STRIPE_KEY | STRIPE_SECRET)');
        }
    }

    /**
     * Create Stripe Plan
     */
    private function createStripePlan(Request $request) {
        $stripe = Cashier::stripe();
        $product = $stripe->products->create([
            'name' => $request->name,
        ]);

        if ($product) {
            // 'unit_amount' => A positive integer in cents
            $price = $stripe->prices->create([
                'unit_amount' => $request->price*100, // Convert cents to dollar (price multiply by 100)
                'currency' => 'usd',
                'recurring' => ['interval' => $request->interval],
                'product' => $product->id,
            ]);

            if ($price) {
                Plan::create([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'stripe_product' => $product->id,
                    'stripe_plan' => $price->id,
                    'price' => $request->price,
                    'description' => $request->description
                ]);
            }

            return redirect()->route('plans.index')
                ->with('success','Record has been saved successfully');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Something went wrong, please try again later!');
    }
}
