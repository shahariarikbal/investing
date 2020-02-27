<?php

namespace App\Http\Controllers\Admin;

use App\Broker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nagy\LaravelRating\Models\Rating;

class BrokerReviewController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perpage = $request->input('perpage', 15);
        $status = $request->input('status', 'published');
        $reviews = Rating::with(['model', 'rateable'])->where('status', $status)->orderBy('created_at', 'desc')->paginate($perpage);

        return $reviews;
    }

    public function show()
    {
        return view('admin.brokers.review');
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Rating $rating)
    {
        $rating->update($request->all());
        $rating->load(['model', 'rateable']);
        return $rating;
    }

    public function destroy(Request $request, Rating $rating)
    {
        $rating->delete();

        return response()->json(['success' => true, 'message' => 'Delete successfully.']);
    }
}