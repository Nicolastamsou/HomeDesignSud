<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'telephone' => '0612345678', // Ajoute une valeur ici
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}

