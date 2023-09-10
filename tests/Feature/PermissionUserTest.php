<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionUserTest extends TestCase
{
    /**
     * Criação de teste unitário
     * php artisan make:test PermissionUserTest
     * it_should_be_able_to_give_a_permission_to_an_user()
     * deve_ser_capaz_de_dar_permissão_a_um_usuário
     */
    public function it_should_be_able_to_give_a_permission_to_an_user()
    {
        $user = User::factory()->create;

        $user->givePermissionTo('edit-articles');

        $this->assertTrue($user->hasPermissionTo('edit-articles'));
        $this->assertDatabaseHas('permissions', [
            'permission' => 'edit-articles'
        ]);
    }
}
