<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SelfDeclareSimulationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_self_declare_to_login(): void
    {
        $response = $this->get(route('simulasi.sihalal.self-declare'));

        $response->assertRedirect(route('login'));
    }

    public function test_peserta_can_open_self_declare_form(): void
    {
        $peserta = User::factory()->peserta()->create();

        $response = $this->actingAs($peserta)
            ->get(route('simulasi.sihalal.self-declare'));

        $response
            ->assertOk()
            ->assertViewIs('simulasi.sihalal.self-declare')
            ->assertSee('Pengajuan Self Declare')
            ->assertSee('Kuesioner');
    }

    public function test_admin_is_redirected_from_self_declare_to_dashboard(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)
            ->get(route('simulasi.sihalal.self-declare'));

        $response->assertRedirect(route('dashboard'));
    }

    public function test_peserta_can_open_application_status(): void
    {
        $peserta = User::factory()->peserta()->create();

        $response = $this->actingAs($peserta)
            ->get(route('simulasi.sihalal.status'));

        $response
            ->assertOk()
            ->assertViewIs('simulasi.sihalal.status')
            ->assertSee('Status Permohonan');
    }

    public function test_peserta_can_open_business_owner_profile(): void
    {
        $peserta = User::factory()->peserta()->create();

        $response = $this->actingAs($peserta)
            ->get(route('simulasi.sihalal.pelaku-usaha'));

        $response
            ->assertOk()
            ->assertViewIs('simulasi.sihalal.pelaku-usaha')
            ->assertSee('Penanggung Jawab')
            ->assertSee('Data Pabrik')
            ->assertSee('Data Outlet')
            ->assertSee('Penyelia Halal');
    }

    public function test_admin_is_redirected_from_business_owner_profile_to_dashboard(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)
            ->get(route('simulasi.sihalal.pelaku-usaha'));

        $response->assertRedirect(route('dashboard'));
    }

    public function test_registration_only_offers_business_owner_and_facilitator_types(): void
    {
        $peserta = User::factory()->peserta()->create();

        $response = $this->actingAs($peserta)
            ->get(route('simulasi.sihalal.daftar'));

        $response
            ->assertOk()
            ->assertSee('Pelaku Usaha')
            ->assertSee('Fasilitator')
            ->assertDontSee('Pendamping PPH')
            ->assertDontSee('Importir');
    }
}
