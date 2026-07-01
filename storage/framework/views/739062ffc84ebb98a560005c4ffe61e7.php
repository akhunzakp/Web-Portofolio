<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Portfolio Manager</title>

    <script>
        (function() {
            var stored = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 min-h-screen transition-colors duration-300">

    
    <header class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700/50 sticky top-0 z-40 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white font-heading font-extrabold text-sm shadow-md">P</span>
                <span class="font-heading font-bold text-lg">Portfolio Admin</span>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="<?php echo e(url('/')); ?>" target="_blank" class="text-xs font-semibold text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 transition-colors">
                    View Live Site ↗
                </a>
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-rose-600 dark:text-rose-400 transition-all">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 rounded-xl text-sm font-semibold bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/30">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="border-b border-slate-200 dark:border-slate-700/60 mb-8 flex gap-6">
            <button onclick="switchTab('tab-profile')" class="tab-btn pb-3 text-sm font-semibold border-b-2 border-blue-600 text-blue-600 dark:border-blue-400 dark:text-blue-400 focus:outline-none transition-all">
                Profile Setup
            </button>
            <button onclick="switchTab('tab-projects')" class="tab-btn pb-3 text-sm font-semibold border-b-2 border-transparent text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 focus:outline-none transition-all">
                Projects List
            </button>
            <button onclick="switchTab('tab-skills')" class="tab-btn pb-3 text-sm font-semibold border-b-2 border-transparent text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 focus:outline-none transition-all">
                Skills Grid
            </button>
        </div>

        
        <div id="tab-profile" class="tab-content">
            <div class="bg-white dark:bg-slate-800 rounded-3xl border border-slate-200/50 dark:border-slate-700/50 shadow-md p-6 max-w-3xl">
                <h2 class="text-xl font-bold font-heading mb-6">Manage Professional Profile</h2>
                
                <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Full Name</label>
                            <input type="text" name="name" required value="<?php echo e($profile->name); ?>"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Title / Headline</label>
                            <input type="text" name="title" required value="<?php echo e($profile->title); ?>"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Professional Bio</label>
                        <textarea name="bio" rows="4" required
                            class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none resize-none"><?php echo e($profile->bio); ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Contact Email</label>
                            <input type="email" name="contact_email" required value="<?php echo e($profile->contact_email); ?>"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Avatar / Photo</label>
                            <input type="file" name="photo"
                                class="w-full px-4 py-2.0 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                            <?php if($profile->photo_path): ?>
                                <div class="mt-2 text-xs text-slate-400">Current photo: <span class="font-mono text-[10px]"><?php echo e($profile->photo_path); ?></span></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 dark:border-slate-700/60 pt-6">
                        <h3 class="text-sm font-bold font-heading mb-4 text-slate-600 dark:text-slate-400">Social Media Handles (URLs)</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">GitHub</label>
                                <input type="text" name="github" value="<?php echo e($profile->social_links['github'] ?? ''); ?>" placeholder="https://github.com/..."
                                    class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">LinkedIn</label>
                                <input type="text" name="linkedin" value="<?php echo e($profile->social_links['linkedin'] ?? ''); ?>" placeholder="https://linkedin.com/in/..."
                                    class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Instagram</label>
                                <input type="text" name="instagram" value="<?php echo e($profile->social_links['instagram'] ?? ''); ?>" placeholder="https://instagram.com/..."
                                    class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                        Save Profile Changes
                    </button>
                </form>
            </div>
        </div>

        
        <div id="tab-projects" class="tab-content hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                
                <div class="bg-white dark:bg-slate-800 rounded-3xl border border-slate-200/50 dark:border-slate-700/50 p-6 shadow-md h-fit">
                    <h2 class="text-lg font-bold font-heading mb-6" id="project-form-title">Create Project</h2>
                    
                    <form id="project-form" action="<?php echo e(route('admin.projects.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" id="project-form-method" value="POST">
                        
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Project Title</label>
                            <input type="text" name="title" id="project-title" required
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Description</label>
                            <textarea name="description" id="project-desc" rows="3" required
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none resize-none"></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Tech Stack (comma separated)</label>
                            <input type="text" name="tech_stack" id="project-tech" required placeholder="Flutter, Python, MySQL"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Project Demo URL</label>
                            <input type="url" name="project_url" id="project-url"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">GitHub Repository URL</label>
                            <input type="url" name="github_url" id="project-github"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Project Image</label>
                            <input type="file" name="image"
                                class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-xl text-sm outline-none">
                        </div>

                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_featured" value="1" id="project-featured" class="w-4 h-4 text-blue-600 border-slate-300 rounded">
                            <label for="project-featured" class="text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Featured Project</label>
                        </div>

                        <div class="flex gap-2 pt-2">
                            <button type="submit" id="project-submit-btn" class="flex-grow py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                Add Project
                            </button>
                            <button type="button" onclick="resetProjectForm()" class="hidden id-cancel-btn py-2.5 px-4 rounded-xl text-sm font-semibold text-slate-500 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>

                
                <div class="lg:col-span-2 space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="bg-white dark:bg-slate-800 border border-slate-200/50 dark:border-slate-700/50 rounded-3xl p-5 flex items-start gap-4 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-16 h-16 rounded-xl bg-slate-100 dark:bg-slate-900 flex-shrink-0 flex items-center justify-center overflow-hidden border border-slate-100 dark:border-slate-800">
                                <?php if($proj->image_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $proj->image_path)); ?>" class="object-cover w-full h-full">
                                <?php else: ?>
                                    <span class="text-slate-400 text-xs font-semibold font-mono">No IMG</span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="flex-grow min-w-0">
                                <div class="flex items-center gap-2">
                                    <h3 class="font-heading font-bold text-[#0F172A] dark:text-white truncate"><?php echo e($proj->title); ?></h3>
                                    <?php if($proj->is_featured): ?>
                                        <span class="px-2 py-0.5 rounded-full text-[9px] font-bold bg-amber-500/10 text-amber-600 dark:bg-amber-400/10 dark:text-amber-300">Featured</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-2 leading-relaxed"><?php echo e($proj->description); ?></p>
                                <div class="flex flex-wrap gap-1 mt-2.5">
                                    <?php $__currentLoopData = $proj->tech_stack ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300 font-semibold"><?php echo e($t); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <button type="button" 
                                    onclick="editProject(<?php echo e(json_encode($proj)); ?>, '<?php echo e(implode(', ', $proj->tech_stack ?? [])); ?>')"
                                    class="text-xs font-semibold px-3 py-1.5 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:opacity-85 transition-opacity">
                                    Edit
                                </button>
                                
                                <form action="<?php echo e(route('admin.projects.destroy', $proj)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="w-full text-xs font-semibold px-3 py-1.5 bg-rose-50 dark:bg-rose-950/20 text-rose-600 dark:text-rose-400 rounded-lg hover:opacity-85 transition-opacity">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="bg-white dark:bg-slate-800 rounded-3xl border border-slate-200/50 dark:border-slate-700/50 p-8 text-center text-slate-400">
                            No projects seeded. Add your first featured build.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div id="tab-skills" class="tab-content hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                
                <div class="bg-white dark:bg-slate-800 rounded-3xl border border-slate-200/50 dark:border-slate-700/50 p-6 shadow-md h-fit">
                    <h2 class="text-lg font-bold font-heading mb-6" id="skill-form-title">Create Skill</h2>
                    
                    <form id="skill-form" action="<?php echo e(route('admin.skills.store')); ?>" method="POST" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" id="skill-form-method" value="POST">

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Skill Name</label>
                            <input type="text" name="name" id="skill-name" required placeholder="Tailwind CSS"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Category</label>
                            <select name="category" id="skill-category" required
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                                <option value="frontend">Frontend</option>
                                <option value="backend">Backend</option>
                                <option value="design_tools">Design Tools & DevOps</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Capability Tag</label>
                            <input type="text" name="capability_tag" id="skill-tag" required placeholder="Utility-First Framework"
                                class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none">
                        </div>

                        <div class="flex gap-2 pt-2">
                            <button type="submit" id="skill-submit-btn" class="flex-grow py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                Add Skill
                            </button>
                            <button type="button" onclick="resetSkillForm()" class="hidden id-skill-cancel-btn py-2.5 px-4 rounded-xl text-sm font-semibold text-slate-500 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>

                
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-slate-800 border border-slate-200/50 dark:border-slate-700/50 rounded-3xl overflow-hidden shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-700/60 text-xs font-bold uppercase tracking-wider text-slate-400">
                                        <th class="py-4 px-6">Name</th>
                                        <th class="py-4 px-6">Category</th>
                                        <th class="py-4 px-6">Capability Tag</th>
                                        <th class="py-4 px-6 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-sm">
                                    <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/40 transition-colors">
                                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white"><?php echo e($sk->name); ?></td>
                                            <td class="py-4 px-6">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300">
                                                    <?php echo e($sk->category === 'design_tools' ? 'Design Tools' : ucfirst($sk->category)); ?>

                                                </span>
                                            </td>
                                            <td class="py-4 px-6 text-slate-500 dark:text-slate-400 font-medium text-xs"><?php echo e($sk->capability_tag); ?></td>
                                            <td class="py-4 px-6 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <button type="button" 
                                                        onclick="editSkill(<?php echo e(json_encode($sk)); ?>)"
                                                        class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                                        Edit
                                                    </button>
                                                    <span class="text-slate-300 dark:text-slate-600">|</span>
                                                    <form action="<?php echo e(route('admin.skills.destroy', $sk)); ?>" method="POST" onsubmit="return confirm('Delete this skill?');" class="inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="text-xs font-semibold text-rose-600 hover:underline">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4" class="py-8 px-6 text-center text-slate-400 italic">No skills listed yet.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    
    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-blue-600', 'text-blue-600', 'dark:border-blue-400', 'dark:text-blue-400');
                btn.classList.add('border-transparent', 'text-slate-400');
            });
            document.getElementById(tabId).classList.remove('hidden');
            
            // Highlight current button
            const activeBtn = Array.from(document.querySelectorAll('.tab-btn')).find(b => b.getAttribute('onclick').includes(tabId));
            if (activeBtn) {
                activeBtn.classList.add('border-blue-600', 'text-blue-600', 'dark:border-blue-400', 'dark:text-blue-400');
                activeBtn.classList.remove('border-transparent', 'text-slate-400');
            }
        }

        // --- PROJECTS EDIT FORM PRE-FILL ---
        function editProject(proj, techString) {
            document.getElementById('project-form-title').innerText = 'Edit Project';
            document.getElementById('project-form').action = '/admin/projects/' + proj.id;
            document.getElementById('project-form-method').value = 'PUT';
            document.getElementById('project-submit-btn').innerText = 'Save Changes';
            
            // Prefill inputs
            document.getElementById('project-title').value = proj.title;
            document.getElementById('project-desc').value = proj.description;
            document.getElementById('project-tech').value = techString;
            document.getElementById('project-url').value = proj.project_url || '';
            document.getElementById('project-github').value = proj.github_url || '';
            document.getElementById('project-featured').checked = proj.is_featured === true || proj.is_featured === 1;

            // Show cancel button
            document.querySelector('.id-cancel-btn').classList.remove('hidden');
            
            // Scroll to form
            document.getElementById('project-form-title').scrollIntoView({ behavior: 'smooth' });
        }

        function resetProjectForm() {
            document.getElementById('project-form-title').innerText = 'Create Project';
            document.getElementById('project-form').action = '<?php echo e(route("admin.projects.store")); ?>';
            document.getElementById('project-form-method').value = 'POST';
            document.getElementById('project-submit-btn').innerText = 'Add Project';
            
            document.getElementById('project-form').reset();
            document.querySelector('.id-cancel-btn').classList.add('hidden');
        }

        // --- SKILLS EDIT FORM PRE-FILL ---
        function editSkill(sk) {
            document.getElementById('skill-form-title').innerText = 'Edit Skill';
            document.getElementById('skill-form').action = '/admin/skills/' + sk.id;
            document.getElementById('skill-form-method').value = 'PUT';
            document.getElementById('skill-submit-btn').innerText = 'Save Changes';
            
            // Prefill inputs
            document.getElementById('skill-name').value = sk.name;
            document.getElementById('skill-category').value = sk.category;
            document.getElementById('skill-tag').value = sk.capability_tag;

            // Show cancel button
            document.querySelector('.id-skill-cancel-btn').classList.remove('hidden');
            
            // Scroll to form
            document.getElementById('skill-form-title').scrollIntoView({ behavior: 'smooth' });
        }

        function resetSkillForm() {
            document.getElementById('skill-form-title').innerText = 'Create Skill';
            document.getElementById('skill-form').action = '<?php echo e(route("admin.skills.store")); ?>';
            document.getElementById('skill-form-method').value = 'POST';
            document.getElementById('skill-submit-btn').innerText = 'Add Skill';
            
            document.getElementById('skill-form').reset();
            document.querySelector('.id-skill-cancel-btn').classList.add('hidden');
        }
    </script>
</body>
</html>
<?php /**PATH C:\Magang\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>