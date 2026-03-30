<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Court;

class CourtSeeder extends Seeder
{
    public function run(): void
    {
        Court::create([
            'name' => 'Lapangan Utama',
            'type' => 'Synthetic Pro A',
            'price_per_hour' => 150000,
            'description' => 'FIFA Standard Layout, Premium Grade Synthetic Turf',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCADCRV0z66W2HQRCXoE1tc8ZR1g87HeFrTq5J_lqx0rOyna9BoegMgdxMMq_tJhuX0fpYmytmvFTQE4YNy_5CAxD4zdMcbuQMwT2gomvPbcZhxHwqur8AdsqPu_cgdQdx9-_cDvyTNLoPpK_PXotwKl0DcSe2xK1Ir8lIJQwuPLgu3YQ3VyKk6ase1neyYcCiWuNVCmmlWLXyWD9TyIEEz1E3yx_mz6kFQT7je4DLcLJZKADhKOxis9_qo4KW1D6v-QNQYchnQinkn',
        ]);

        Court::create([
            'name' => 'Lapangan Indoor',
            'type' => 'Vinyl Pro Elite',
            'price_per_hour' => 175000,
            'description' => 'Pro League Specifications, High-Shock Absorption Vinyl',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCADCRV0z66W2HQRCXoE1tc8ZR1g87HeFrTq5J_lqx0rOyna9BoegMgdxMMq_tJhuX0fpYmytmvFTQE4YNy_5CAxD4zdMcbuQMwT2gomvPbcZhxHwqur8AdsqPu_cgdQdx9-_cDvyTNLoPpK_PXotwKl0DcSe2xK1Ir8lIJQwuPLgu3YQ3VyKk6ase1neyYcCiWuNVCmmlWLXyWD9TyIEEz1E3yx_mz6kFQT7je4DLcLJZKADhKOxis9_qo4KW1D6v-QNQYchnQinkn',
        ]);

        Court::create([
            'name' => 'Lapangan Outdoor',
            'type' => 'Synthetic Pro B',
            'price_per_hour' => 150000,
            'description' => 'Open Air Stadium Feel, Advanced Drainage System',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCADCRV0z66W2HQRCXoE1tc8ZR1g87HeFrTq5J_lqx0rOyna9BoegMgdxMMq_tJhuX0fpYmytmvFTQE4YNy_5CAxD4zdMcbuQMwT2gomvPbcZhxHwqur8AdsqPu_cgdQdx9-_cDvyTNLoPpK_PXotwKl0DcSe2xK1Ir8lIJQwuPLgu3YQ3VyKk6ase1neyYcCiWuNVCmmlWLXyWD9TyIEEz1E3yx_mz6kFQT7je4DLcLJZKADhKOxis9_qo4KW1D6v-QNQYchnQinkn',
        ]);
    }
}
