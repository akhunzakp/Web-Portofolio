<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Professional Profile (Indonesian compliant with KBBI)
        Profile::create([
            'name' => 'Yuma Akhunza Kausar Putra',
            'title' => 'Pengembang Front-End & Perancang UI/UX',
            'bio' => 'Mahasiswa D4 Teknik Informatika Politeknik Negeri Malang yang berfokus pada integrasi desain UI/UX estetis dengan pengembangan sistem yang skalabel menggunakan ekosistem Laravel dan Next.js. Berkomitmen menghadirkan solusi teknologi yang optimal dan terstruktur.',
            'photo_path' => null,
            'contact_email' => 'yuma.akhunza@gmail.com',
            'social_links' => [
                'github' => 'https://github.com/akhunzakp',
                'linkedin' => 'https://linkedin.com/in/yuma-akhunza',
                'instagram' => 'https://instagram.com/akhunza.kp',
            ],
        ]);

        // 2. Seed Result-Oriented Projects (Indonesian compliant with KBBI)
        Project::create([
            'title' => 'Fruityfy - Lokapasar Cerdas Berbasis Visi Komputer',
            'slug' => 'fruityfy-lokapasar-cerdas-berbasis-visi-komputer',
            'description' => 'Aplikasi lokapasar pertanian berbasis seluler cerdas yang terintegrasi dengan pemindai visi komputer secara waktu nyata (real-time) untuk mendeteksi tingkat kematangan buah. Mengoptimalkan titik akhir (endpoint) API melalui Laravel demi efisiensi pemrosesan gambar.',
            'image_path' => null,
            'tech_stack' => ['Flutter', 'Python', 'MySQL', 'Laravel API', 'RESTful API'],
            'project_url' => 'https://fruityfy.example.com',
            'github_url' => 'https://github.com/akhunzakp/fruityfy',
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Antareksa - Hub Digital Komunitas Alumni',
            'slug' => 'antareksa-hub-digital-komunitas-alumni',
            'description' => 'Kerangka kerja komunitas digital dan sistem manajemen konten alumni SMAN 3 Taruna Angkasa Madiun yang mengutamakan keamanan autentikasi dan agregasi data untuk mendukung keberlangsungan keterlibatan komunitas.',
            'image_path' => null,
            'tech_stack' => ['Laravel', 'Tailwind CSS', 'MySQL', 'Blade Components'],
            'project_url' => 'https://antareksa.example.com',
            'github_url' => 'https://github.com/akhunzakp/antareksa',
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Sistem Infrastruktur Data OLAP Perusahaan',
            'slug' => 'sistem-infrastruktur-data-olap-perusahaan',
            'description' => 'Arsitektur pergudangan data OLAP skala besar menggunakan Pentaho Spoon untuk integrasi data tingkat perusahaan. Menerapkan prinsip Green Computing guna meningkatkan performa kueri basis data dan menghemat konsumsi daya server.',
            'image_path' => null,
            'tech_stack' => ['MySQL', 'Pentaho Spoon', 'Hadoop HDFS', 'SQL Optimization', 'OLAP'],
            'project_url' => null,
            'github_url' => 'https://github.com/akhunzakp/olap-system',
            'is_featured' => false,
        ]);

        // 3. Seed Industry-Standard Skills Matrix
        $skills = [
            // Frontend
            ['name' => 'Laravel Blade', 'category' => 'frontend', 'capability_tag' => 'Arsitektur Berbasis Komponen'],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'capability_tag' => 'Kerangka Kerja Utility-First'],
            ['name' => 'Next.js', 'category' => 'frontend', 'capability_tag' => 'React Framework Skalabel'],
            ['name' => 'Flutter', 'category' => 'frontend', 'capability_tag' => 'Pengembangan Multiplatform'],
            ['name' => 'JavaScript', 'category' => 'frontend', 'capability_tag' => 'Pola Asinkron & DOM Manipulasi'],
            
            // Backend
            ['name' => 'PHP (Laravel)', 'category' => 'backend', 'capability_tag' => 'Pemrograman Berorientasi Objek'],
            ['name' => 'MySQL', 'category' => 'backend', 'capability_tag' => 'Desain Skema & Kueri Optimal'],
            ['name' => 'ETL (Pentaho Spoon)', 'category' => 'backend', 'capability_tag' => 'Otomatisasi Pipa Data'],
            ['name' => 'RESTful API', 'category' => 'backend', 'capability_tag' => 'Desain Berorientasi Sumber Daya'],
            
            // Design Tools
            ['name' => 'Figma', 'category' => 'design_tools', 'capability_tag' => 'Prototipe Presisi Tinggi & Sistem Desain'],
            ['name' => 'Corel Draw', 'category' => 'design_tools', 'capability_tag' => 'Desain Vektor & Cetak'],
            ['name' => 'Canva', 'category' => 'design_tools', 'capability_tag' => 'Desain Konten & Sosial Media'],
            ['name' => 'Git & GitHub', 'category' => 'design_tools', 'capability_tag' => 'Kontrol Versi & Kolaborasi'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
