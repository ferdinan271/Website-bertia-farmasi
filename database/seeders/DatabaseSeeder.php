<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(3)->create();

        User::create(
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => 1
            ]
        );
        User::create(
            [
                'name' => 'Salsa',
                'username' => 'Salsa',
                'email' => 'salsa@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => 0
            ]
        );
        User::create(
            [
                'name' => 'Hanun',
                'username' => 'Hanun',
                'email' => 'hanun@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => 0
            ]
        );

        Category::create(
            [
                'name' => 'Technology',
                'slug' => 'technology'
            ]
        );
        Category::create(
            [
                'name' => 'Web Developer',
                'slug' => 'web-developer'
            ]
        );
        Category::create(
            [
                'name' => 'Data Analysis',
                'slug' => 'data-analysis'
            ]
        );

        Post::create(
            [
                'title' => 'Laravel 8',
                'slug' => 'belajar-laravel-8',
                'excerpt' => 'Mana yang lebih baik framework Laravel atau framework yang lain? Ya, ini adalah salah satu dari sekian pertanyaan yang sering kita temukan dan boleh jadi kita sendiri yang membuat pertanyaan. Dan untu...',                
                'body' => '<div>Mana yang lebih baik framework Laravel atau framework yang lain? Ya, ini adalah salah satu dari sekian pertanyaan yang sering kita temukan dan boleh jadi kita sendiri yang membuat pertanyaan. Dan untuk menemukan jawaban pertanyaan ini, saya memutuskan untuk mencoba belajar Laravel 8 sampai membuat aplikasi CRUD sederhana. Tentu saja untuk mempelajari dengan sungguh-sungguh, ada roadmap belajar yang bisa kita ikuti untuk mempelajari framework Laravel 8. Tulisan ini saya buat untuk mendokumentasikan hasil belajar laravel 8 ketika sudah memasuki materi crud.<br><br></div><div><strong>CRUD App Overview</strong><br><br></div><div>Sebagai komparasi dengan framework yang saya tulis di postingan sebelumnya, aplikasi crud sederhana yang akan kita buat di dalam tutorial ini adalah sebuah blog sederhana. Dalam pembuatan aplikasi ini, kita akan mempelajari beberapa hal yang berhubungan dengan operasi yang berinteraksi dengan database, seperti create data, read data, update data, dan delete data. Untuk menangani operasi yang berinteraksi dengan database, kita akan menggunakan Eloquent, sebuah object-relational-mapper (ORM) dari framework laravel.<br><br></div>',
                'category_id' => 2,
                'view' => 4,
                'user_id' => 3,
            ]
        );
        Post::create(
            [
                'title' => 'Laravel 9',
                'slug' => 'laravel-9-2',
                'excerpt' => 'What is Laravel?Laravel is an open-source PHP web framework that follows the model-view-controller (MVC) architectural pattern. Taylor Otwell created it, and it was first released in 2011. Laravel aim...',                
                'body' => '<div><strong>What is Laravel?<br></strong><br></div><div>Laravel is an open-source PHP web framework that follows the model-view-controller (MVC) architectural pattern. Taylor Otwell created it, and it was first released in 2011. Laravel aims to provide an elegant and efficient development workflow for building web applications.<br><br></div><div><strong>What is CRUD Operation in Laravel?<br></strong><br></div><div>CRUD stands for Create, Read, Update, and Delete. It is a set of basic operations that are commonly performed on data in a database.<br><br></div><div>In web development using frameworks like Laravel, CRUD operations are implemented using frameworks’ features such as routing, models, controllers, and database interactions. These operations allow developers to easily create, retrieve, update, and delete data within their applications.<br><br></div><div>In Laravel 9, the basic CRUD (Create, Read, Update, Delete) operations can be performed using Laravel’s Eloquent ORM (Object-Relational Mapping) and the built-in routing system.<br><br></div><div>This tutorial will teach how to perform CRUD operation in Laravel 9 in a step-by-step guide. Before we proceed, we need to understand some prerequisites for performing CRUD operations in Larvael 9.<br><br></div><div><strong>Prerequisites to implement CRUD Operation in Laravel 9<br></strong><br></div><div>Requirements for implementing Laravel 9 CRUD Application are as follows:<br><br></div><ol><li>Composer (Which version 2 or up)</li><li>PHP &gt;= 8.1</li></ol><div><strong>Steps to Perform CRUD Operation in Laravel 9:<br></strong><br></div><div>Follow the steps below to create a CRUD operation in Laravel 9 :<br><br></div><div>Step 1: Create Laravel 9 project&nbsp;<br><br></div><div>Step 2: Setup Database with project<br><br></div><div>Step 3: Create student model &amp; migration for CRUD<br><br></div><div>Step 4: Create student controller&nbsp;<br><br></div><div>Step 5: Create Route<br><br></div><div>Step 6: Create blade views file:<br><br></div><ul><li>Index.blade.php</li><li>Create.blade.php</li><li>edit.blade.php</li></ul><div>Step 7: Run Laravel on development server</div>',
                'category_id' => 2,
                'view' => 0,
                'user_id' => 3,
            ]
        );
        Post::create(
            [
                'title' => 'Laravel 10',
                'slug' => 'laravel-10-2',
                'excerpt' => 'Laravel merupakan framework PHP paling populer saat ini, setidaknya itulah yang hasil dari Google Trends. Salah satu faktor yang membuat perkembangan Laravel sedemikian pesat adalah selalu update deng...',                
                'body' => '<div><strong>Laravel</strong> merupakan framework PHP paling populer saat ini, setidaknya itulah yang hasil dari <a href=\"https://trends.google.com/trends/explore?date=today%205-y&amp;q=Laravel,CodeIgniter,Symfony,Zend,Yii\">Google Trends</a>. Salah satu faktor yang membuat perkembangan Laravel sedemikian pesat adalah selalu update dengan kebutuhan programmer. Saking updatenya, setiap 1 tahun sekali akan selalu hadir Laravel versi terbaru.<br><br></div><div>Bagi programmer web yang ingin fokus ke <em>back-end</em> PHP (atau memilih jalur <em>full stack</em>), Laravel menjadi salah satu materi yang wajib dikuasai. Mayoritas lowongan kerja web programmer back-end di Indonesia mewajibkan paham sampai ke framework, yang biasanya salah satu dari <strong>Code Igniter</strong> atau <strong>Laravel</strong>.<br><br></div><div>Framework memang bukan hal wajib untuk bisa membuat web, tapi untuk aplikasi yang besar dan butuh kerjasama tim, framework seperti Laravel akan sangat membantu. Penerapan design arsitektur <strong>MVC</strong> (Model-View-Controller) dirancang sedemikian rupa agar tidak saling tercampur antara design tampilan (HTML, CSS, JavaScript) dengan logika program (PHP, MySQL).</div>',
                'category_id' => 2,
                'view' => 1,
                'user_id' => 3,
            ]
        );
        Post::create(
            [
                'title' => 'Best Laptop of 2023',
                'slug' => 'best-laptop-of-2023-2',
                'excerpt' => 'Best laptop overallApple MacBook Air M2Thanks to a new design, a larger display (13.6 inches versus the previous 13.3 inches), a faster M2 chip and a long-awaited upgrade to a higher-res webcam, the 2...',                
                'body' => '<div><strong>Best laptop overall</strong></div><div><strong>Apple MacBook Air M2</strong></div><div>Thanks to a new design, a larger display (13.6 inches versus the previous 13.3 inches), a faster M2 chip and a long-awaited upgrade to a higher-res webcam, the 2022 version of the MacBook Air remains our top choice for the most universally useful laptop in Apple\'s lineup, with one caveat. At $1,199, the <a href=\"https://www.cnet.com/tech/computing/apples-m2-macbook-air-is-200-more-than-the-m1-is-it-worth-the-price/\">$200 increase over the traditional $999</a> MacBook Air starting price is a disappointment. That\'s why you\'ll still find the M1 version of the Air retains a spot on our best laptop list. Still, we like everything else about it and it\'s our first choice if you\'re considering an Air and don\'t mind spending more.</div>',
                'category_id' => 1,
                'view' => 0,
                'user_id' => 1,
            ]
        );
        Post::create(
            [
                'title' => '10 Bahasa Pemrograman Terpopuler untuk Dipelajari 2024',
                'slug' => '10-bahasa-pemrograman-terpopuler-untuk-dipelajari-2024',
                'excerpt' => 'Macam-Macam Bahasa Pemrograman Terbaik untuk DipelajariDi bagian ini, kami akan membagikan rekomendasi contoh bahasa pemrograman terpopuler yang bisa Anda pelajari untuk mulai terjun ke dunia programm...',                
                'body' => '<div><strong><br>Macam-Macam Bahasa Pemrograman Terbaik untuk Dipelajari<br></strong><br></div><div>Di bagian ini, kami akan membagikan rekomendasi contoh bahasa pemrograman terpopuler yang bisa Anda pelajari untuk mulai terjun ke dunia programming.</div><div>Mulai dari bahasa tingkat rendah, tingkat menengah, tingkat tinggi, bahkan dari yang paling mudah sampai yang paling sulit, semuanya kami bahas lengkap.</div><div>Berikut adalah contoh bahasa pemrograman yang ada saat ini:</div><ol><li><strong>Python</strong></li><li><strong>C#</strong></li><li><strong>C++</strong></li><li><strong>JavaScript</strong></li><li><strong>PHP</strong></li><li><strong>Swift</strong></li><li><strong>Java</strong></li><li><strong>Go</strong></li><li><strong>SQL</strong></li><li><strong>Ruby</strong></li></ol>',
                'category_id' => 2,
                'view' => 3,
                'user_id' => 2,
            ]
        );
        Post::create(
            [
                'title' => 'What is Data Analysis',
                'slug' => 'what-is-data-analysis',
                'excerpt' => 'What Is Data Analysis?Although many groups, organizations, and experts have different ways of approaching data analysis, most of them can be distilled into a one-size-fits-all definition. Data analysi...',                
                'body' => '<div><br><strong>What Is Data Analysis?</strong><br><br></div><div>Although many groups, organizations, and experts have different ways of approaching data analysis, most of them can be distilled into a one-size-fits-all definition. Data analysis is the process of cleaning, changing, and processing raw data and extracting actionable, relevant information that helps businesses make informed decisions. The procedure helps reduce the risks inherent in decision-making by providing useful insights and statistics, often presented in charts, images, tables, and graphs.<br><br></div><div>A simple example of data analysis can be seen whenever we make a decision in our daily lives by evaluating what has happened in the past or what will happen if we make that decision. Basically, this is the process of analyzing the past or future and making a decision based on that analysis.<br><br></div><div>It’s not uncommon to hear the term “<a href=\"https://www.simplilearn.com/tutorials/big-data-tutorial/what-is-big-data\">big data</a>” brought up in discussions about data analysis. Data analysis plays a crucial role in processing big data into useful information. Neophyte data analysts who want to dig deeper by revisiting big data fundamentals should go back to the basic question, “<a href=\"https://www.simplilearn.com/what-is-data-article\">What is data</a>?”<br><br></div><div>Unlock new career opportunities with Simplilearn\'s <a href=\"https://www.simplilearn.com/certifications/non-coding-courses\">non-coding courses</a>. Gain valuable skills, explore diverse domains, and excel in the digital era.<br><br></div>',
                'category_id' => 3,
                'view' => 1,
                'user_id' => 1,
            ]
        );

        Like::create(
            [
                'user_id' => '2',
                'post_id' => '5'
            ]
        );

        Comment::create(
            [
                'post_id' => '1',
                'name' => 'hanun',
                'email' => 'hanun@gmail.com',
                'body' => 'mantap',
            ]
        );
        Comment::create(
            [
                'post_id' => '5',
                'name' => 'hanun',
                'email' => 'hanun@gmail.com',
                'body' => 'mantapppp',
            ]
        );

        // Post::factory(1)->create();
        // Like::factory(10)->create();
        // Comment::factory(10)->create();
    }
}
