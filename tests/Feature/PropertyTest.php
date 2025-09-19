<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_send_not_found_on_non_existent_property(): void
    {
        $response = $this->get('/biens/dicta-quo-cumque-omnis-quibusdam-non-iure-distinctio-1');

        $response->assertStatus(404);
    }

    public function test_redirect_on_wrong_slug_property(): void
    {
        // si on veut remplir toutes les tables
//        $this->seed(DatabaseSeeder::class);
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->get("/biens/dicta-quo-cumque-omnis-quibusdam-non-iure-distinctio-" . $property->id);
        $response->assertRedirectToRoute('property.show', ['property' => $property->id, 'slug' => $property->getSlug()]);
    }

    public function test_on_good_slug_property(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->get("/biens/{$property->getSlug()}-{$property->id}");
        $response->assertOk(); // 200
        $response->assertSee($property->title);
    }

    public function test_error_on_contact_form(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->post("/biens/{$property->id}/contact/", [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john',
            'phone' => '0000000000',
            'message' => 'Pouvez vous me contacter, pour planifier une visite pour ce bien'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $response->assertSessionHasInput('email', 'john');

    }

    public function test_ok_on_contact_form(): void
    {
        // voir ou l'erreur se produit dans mon code
//        $this->withoutExceptionHandling();
        // ajouter ça si vous utilisez un user.
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        // Simule l'envoi de mails pour éviter les erreurs
//        Mail::fake();
//
//        // Simule les jobs (queues) pour ne pas les exécuter réellement
//        Queue::fake();
//
//        // Simule les events pour éviter toute logique réelle
//        Event::fake();
        // pour désactiver le systeme natif
        Notification::fake();

        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->post("/biens/{$property->id}/contact/", [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@doe.fr',
            'phone' => '0000000000',
            'message' => 'Pouvez vous me contacter, pour planifier une visite pour ce bien'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');

        Notification::assertCount(1); // combien de notif j'ai envoyé
        Notification::assertSentOnDemand(ContactRequestNotification::class); // quel type de notification j'ai envoyé
    }
}
