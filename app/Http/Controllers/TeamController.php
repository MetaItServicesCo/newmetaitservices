<?php

namespace App\Http\Controllers;

use App\DataTables\TeamsDataTable;
use App\Models\Team;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    use UploadImageTrait;

    public function index(TeamsDataTable $dataTable)
    {
        return $dataTable->render('pages.teams.index');
    }

    public function create()
    {
        return view('pages.teams.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'bio' => 'nullable|string',

                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:50',

                'facebook_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'twitter_url' => 'nullable|url|max:255',

                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'image_alt' => 'nullable|string|max:255',

                'sort_order' => 'required|integer|min:0',
                'is_active' => 'required|boolean',
            ]);

            // Image upload via trait
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage($request->file('image'), 'teams');
                $validated['image'] = $filename;
            }

            Team::create($validated);

            return redirect()
                ->route('admin.teams.list')
                ->with('success', 'Team member created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel will auto redirect with errors
            throw $e;
        } catch (\Exception $e) {
            Log::error('Team Store Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['general' => 'Something went wrong while creating the team member.']);
        }
    }

    public function edit(Team $team)
    {
        return view('pages.teams.create', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:teams,slug,'.$team->id,
                'bio' => 'nullable|string',

                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:50',

                'facebook_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'twitter_url' => 'nullable|url|max:255',

                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'image_alt' => 'nullable|string|max:255',

                'sort_order' => 'required|integer|min:0',
                'is_active' => 'required|boolean',
            ]);

            // Image update via trait (deletes old)
            $validated['image'] = $this->updateImage(
                $request,
                'image',
                'teams',
                $team->image
            );

            $team->update($validated);

            return redirect()
                ->route('admin.teams.list')
                ->with('success', 'Team member updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Team Update Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'team_id' => $team->id,
            ]);

            return back()
                ->withInput()
                ->withErrors(['general' => 'Something went wrong while updating the team member.']);
        }
    }

    public function destroy(Team $team)
    {
        try {
            // Delete image if exists
            if ($team->image) {
                $oldFilePath = 'teams/'.$team->image;

                if (\Storage::disk('public')->exists($oldFilePath)) {
                    \Storage::disk('public')->delete($oldFilePath);
                }
            }

            $team->delete();

            return redirect()
                ->route('admin.teams.list')
                ->with('success', 'Team member deleted successfully.');

        } catch (\Exception $e) {
            Log::error('Team Delete Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'team_id' => $team->id,
            ]);

            return back()
                ->withErrors(['general' => 'Something went wrong while deleting the team member.']);
        }
    }
}
