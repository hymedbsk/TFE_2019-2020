<?php

namespace Tests\Feature\Auth;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Envoi une requête à /login et vérifie si la vue est présente
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Test si l'utilisateur à toujours accès au formulaire de connection après s'être connecter
     */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }

    /**
     * Vérifie si l'utilisateur peut se connecter avec les bons identifiants
     * Vérifie si après la connection il est bien redirigé vers /home
     */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Créer un utilisateur dans la base de données avec le mot de passe "i-love-laravel"
     * Essayez de se connecter avec le mot de passe 'invalid-password"
     * Test si l'utilisateur est rediriger
     * Test si il y a une erreur session
     * Test si le champ Email contient l'ancienne entrée
     * Test si le champ mot de passe ne contient pas d'ancienne entrée
     * Test si l'utilisateur est toujours un invité
     */

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('i-love-laravel'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * Créer un utilisateur
     * Envoi une requete à la page de connection avec le "remember" on
     * Test si il est rediriger vers la bonne page
     * Test si le bon cookie est attaché
     * Test que l'utilisateur est authentifié
     */
    public function test_remember_me_functionality()
    {
        $user = factory(User::class)->create([
            'User_id' => random_int(1, 100),
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);

        $response->assertRedirect('/home');
        // cookie assertion goes here
        $this->assertAuthenticatedAs($user);
    }

}
