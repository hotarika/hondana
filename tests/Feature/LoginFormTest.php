<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginFormTest extends TestCase
{

    use RefreshDatabase;

    // *******************************************
    // 全体確認
    // *******************************************
    /**
     * @test
     * [正常値] ログイン
     * */
    public function login_user_true()
    {
        factory(User::class)->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // ログインしていないことを確認
        $this->assertFalse(Auth::check());

        $response = $this->post('login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        // ログインしていることを確認
        $this->assertTrue(Auth::check());
        $response->assertRedirect('bookshelf');
    }

    /**
     * @test
     * [異常値] ログインの空値
     * */
    public function login_user_false()
    {
        $response = $this->post('login', [
            'email' => null,
            'password' => null
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスは必ず指定してください。', $error);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードは必ず指定してください。', $error);
    }

    // *******************************************
    // メールアドレス
    // *******************************************
    /**
     * @test
     * [異常系] メールアドレスが無効の場合
     * */
    public function login_user_invalid_email_false()
    {
        factory(User::class)->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('login', [
            'email' => 'test1111@example.com',
            'password' => 'password'
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスまたはパスワードが違います。', $error);
    }

    // *******************************************
    // パスワード
    // *******************************************
    /**
     * @test
     * [異常系] メールアドレスが有効、パスワードが無効の場合
     * */
    public function login_user_valid_email_false()
    {
        factory(User::class)->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('login', [
            'email' => 'test@example.com',
            'password' => 'passworddd'
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスまたはパスワードが違います。', $error);
    }
}
