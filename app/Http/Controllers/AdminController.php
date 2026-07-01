<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $envUsername = env('ADMIN_USERNAME', 'admin');
        $envPassword = env('ADMIN_PASSWORD', 'password123');

        if ($credentials['username'] === $envUsername && $credentials['password'] === $envPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['login_error' => 'Invalid username or password.'])->withInput();
    }

    /**
     * Handle logout.
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    /**
     * Show the dashboard (main CRUD page).
     */
    public function index()
    {
        $profile = Profile::first() ?? Profile::create([
            'name' => 'Yuma Akhunza Kausar Putra',
            'title' => 'Front-End Developer & UI/UX Designer',
            'bio' => 'An Information Technology student at Politeknik Negeri Malang.',
            'contact_email' => 'yuma.akhunza@gmail.com',
            'social_links' => ['github' => '', 'linkedin' => '', 'instagram' => ''],
        ]);

        $projects = Project::orderBy('created_at', 'desc')->get();
        $skills = Skill::orderBy('category')->orderBy('name')->get();

        return view('admin.dashboard', compact('profile', 'projects', 'skills'));
    }

    /**
     * Update profile details.
     */
    public function profileUpdate(Request $request)
    {
        $profile = Profile::firstOrFail();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'contact_email' => 'required|email|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'github' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $path = $request->file('photo')->store('profile', 'public');
            $profile->photo_path = $path;
        }

        $profile->name = $data['name'];
        $profile->title = $data['title'];
        $profile->bio = $data['bio'];
        $profile->contact_email = $data['contact_email'];
        $profile->social_links = [
            'github' => $data['github'] ?? '',
            'linkedin' => $data['linkedin'] ?? '',
            'instagram' => $data['instagram'] ?? '',
        ];

        $profile->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully!');
    }

    /**
     * Store new project.
     */
    public function projectStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'required|string', // Comma separated tags
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // Convert tech_stack string to array
        $techArray = array_map('trim', explode(',', $data['tech_stack']));

        Project::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description'],
            'image_path' => $imagePath,
            'tech_stack' => $techArray,
            'project_url' => $data['project_url'],
            'github_url' => $data['github_url'],
            'is_featured' => isset($data['is_featured']) ? (bool) $data['is_featured'] : false,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Project created successfully!');
    }

    /**
     * Update existing project.
     */
    public function projectUpdate(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'required|string', // Comma separated tags
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }
            $project->image_path = $request->file('image')->store('projects', 'public');
        }

        $techArray = array_map('trim', explode(',', $data['tech_stack']));

        $project->title = $data['title'];
        $project->slug = Str::slug($data['title']);
        $project->description = $data['description'];
        $project->tech_stack = $techArray;
        $project->project_url = $data['project_url'];
        $project->github_url = $data['github_url'];
        $project->is_featured = (bool) ($request->input('is_featured') ?? false);

        $project->save();

        return redirect()->route('admin.dashboard')->with('success', 'Project updated successfully!');
    }

    /**
     * Delete project.
     */
    public function projectDestroy(Project $project)
    {
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }
        $project->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully!');
    }

    /**
     * Store new skill.
     */
    public function skillStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:frontend,backend,design_tools',
            'capability_tag' => 'required|string|max:255',
        ]);

        Skill::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Skill added successfully!');
    }

    /**
     * Update existing skill.
     */
    public function skillUpdate(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:frontend,backend,design_tools',
            'capability_tag' => 'required|string|max:255',
        ]);

        $skill->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Skill updated successfully!');
    }

    /**
     * Delete skill.
     */
    public function skillDestroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Skill deleted successfully!');
    }
}
