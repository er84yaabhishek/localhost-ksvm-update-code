<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {
        // Fetch all policies from the database
        $policies = Policy::all();

        // Return the view with the policies data
        return view('admin.policies.index', compact('policies'));
    }

    public function storePolicy(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            // 'type' => 'required|string|in:privacy,terms',
            // 'status' => 'required|boolean',
        ]);

        // Create a new policy in the database
        $policy = Policy::create([
            'name'        => $request->name,
            'description' => $request->description,
            'type'        => Str::slug($request->name),
            'slug'        => Str::slug($request->name),
            'status'      => $request->status,
            'created_by'  => Auth::id(),
        ]);

        if ($policy) { // If the customer is created successfully
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Redirect back with a success message
        // return redirect()->back()->with('success', 'Policy created successfully.');
    }

    public function editPolicy($id)
    {
        $policy = Policy::find($id);
        return view('admin.policies.edit', compact('policy'));
    }

    public function updatePolicy(Request $request, $id)
    {

        $policy = Policy::find($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            // 'type' => 'required|string|in:privacy,terms',
            // 'status' => 'required|boolean',
        ]);

        $policy->update([
            'name'        => $request->name,
            'description' => $request->description,
            'type'        => Str::slug($request->name),
            'slug'        => Str::slug($request->name),
            'status'      => $request->status,
        ]);

        if ($policy) { // If the customer is created successfully
            return response()->json(['success' => true, 'message' => 'Policy updated successfully.', 'url' => route('admin.policy')]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function deletePolicy($id)
    {
        $policy = Policy::find($id);
        if (! $policy) {
            return response()->json(['success' => false, 'message' => 'Policy not found.']);
        }
        $policy->status = 'inactive'; // Soft delete
        $policy->delete();

        if ($policy) { // If the customer is created successfully
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
