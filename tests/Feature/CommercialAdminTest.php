<?php

use App\Models\CommercialObject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function office(array $overrides = []): CommercialObject
{
  return CommercialObject::create(array_merge([
    'title' => 'B01',
    'reference_number' => 'SHIFT-B01',
    'floor' => 'EG',
    'floor_num' => 0,
    'area' => 32,
    'state' => 'free',
    'layout_plan' => '/downloads/grundrisse/buero-01.pdf',
  ], $overrides));
}

it('sends guests to the login', function () {
  $this->get('/admin')->assertRedirect(route('login'));
});

it('rejects unknown credentials', function () {
  User::factory()->create(['email' => 'admin@example.com']);

  $this->post(route('login'), ['email' => 'admin@example.com', 'password' => 'falsch'])
    ->assertSessionHasErrors('email');

  expect(auth()->check())->toBeFalse();
});

it('lists the commercial objects once signed in', function () {
  office();
  office(['title' => 'B02', 'reference_number' => 'SHIFT-B02']);

  $this->actingAs(User::factory()->create())
    ->get('/admin')
    ->assertOk()
    ->assertSee('B01')
    ->assertSee('B02')
    ->assertSee('name="objects[', false);
});

it('saves state, rent and incidentals and records who changed them', function () {
  $object = office();
  $user = User::factory()->create(['name' => 'Dennis']);

  $this->actingAs($user)
    ->put('/admin', ['objects' => [
      $object->id => ['state' => 'reserved', 'rentalgross_net' => 1450, 'incidentals' => 120],
    ]])
    ->assertRedirect(route('admin.objects.index'))
    ->assertSessionHas('status');

  expect($object->fresh())
    ->state->toBe('reserved')
    ->rentalgross_net->toBe(1450)
    ->incidentals->toBe(120)
    ->updated_by->toBe('Dennis');
});

it('refuses an unknown state', function () {
  $object = office();

  $this->actingAs(User::factory()->create())
    ->put('/admin', ['objects' => [$object->id => ['state' => 'irgendwas']]])
    ->assertSessionHasErrors("objects.{$object->id}.state");

  expect($object->fresh()->state)->toBe('free');
});

it('shows the saved state on the public page', function () {
  office(['state' => 'taken']);

  $this->get(route('page.working'))
    ->assertOk()
    ->assertSee('data-object-state="taken"', false)
    ->assertSee('/downloads/grundrisse/buero-01.pdf');
});

it('offers no rooms filter for commercial objects', function () {
  office();

  $this->get(route('page.working'))
    ->assertOk()
    ->assertDontSee('id="rooms"', false);
});
