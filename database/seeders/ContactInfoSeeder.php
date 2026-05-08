<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            ['type' => 'email', 'value' => 'hello@example.com', 'label' => 'Email', 'icon_class' => 'fas fa-envelope', 'display_order' => 1],
            ['type' => 'phone', 'value' => '+1 (555) 123-4567', 'label' => 'Phone', 'icon_class' => 'fas fa-phone', 'display_order' => 2],
            ['type' => 'address', 'value' => 'San Francisco, CA', 'label' => 'Location', 'icon_class' => 'fas fa-map-marker-alt', 'display_order' => 3],
        ];

        foreach ($contacts as $contact) {
            ContactInfo::create($contact);
        }
    }
}
