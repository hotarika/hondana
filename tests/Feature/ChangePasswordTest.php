<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    // *******************************************
    // 現在のパスワード
    // *******************************************
    /**
     * @test
     * [異常値] パスワードの相違チェック
     * */
    public function change_current_password_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create([
            'password' => bcrypt('password')
        ]);
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'id' => $user->id,
            'current_password' => 'password1',
        ];
        // DB挿入
        $response = $this->post(route('password.change'), $data);

        $error = session('errors')->first('current_password');
        $this->assertEquals('現在のパスワードが間違っています。', $error);
    }

    // *******************************************
    // 確認パスワード
    // *******************************************
    /**
     * @test
     * [異常値] パスワードの相違チェック
     * */
    public function change_confirm_password_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create([
            'password' => bcrypt('password')
        ]);
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'password' => 'password1',
            'current_password' => 'password',
        ];
        // DB挿入
        $response = $this->post(route('password.change'), $data);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードと、確認フィールドとが、一致していません。', $error);
    }
}
