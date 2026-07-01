<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio landing page.
     */
    public function index()
    {
        $profile = Profile::first() ?? new Profile([
            'name' => 'Yuma Akhunza Kausar Putra',
            'title' => 'Front-End Developer & UI/UX Designer',
            'bio' => 'An Information Technology student at Politeknik Negeri Malang specializing in engineering high-fidelity user interfaces and robust web architectures.',
            'photo_path' => null,
            'contact_email' => 'yuma.akhunza@gmail.com',
            'social_links' => [
                'github' => 'https://github.com/akhunzakp',
                'linkedin' => 'https://linkedin.com/in/yuma-akhunza',
                'instagram' => 'https://instagram.com/akhunza.kp',
            ],
        ]);

        $projects = Project::orderBy('is_featured', 'desc')->orderBy('created_at', 'desc')->get();
        
        // Group skills by category: frontend, backend, design_tools
        $skills = Skill::all()->groupBy('category');

        return view('index', compact('profile', 'projects', 'skills'));
    }
}
