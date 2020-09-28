<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use App\EmailReset;

class EmailResetTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    //メールアドレス変更リクエスト
    public function testEmailResetRequest()
    {
        $user = factory(User::class)->make();
        $email = $user->email;

        //新しいメールアドレスを入力しリクエスト
        $this->browse(function ($browser) use ($email) {
            $browser->loginAs($this->user)
                    ->visitRoute('email.request')
                    ->assertRouteIs('email.request')
                    ->type('new_email', $email)
                    ->assertInputValue('new_email', $email)
                    ->press('再設定URLを送信')
                    ->assertSee('確認メールを送信しました')
                    ->screenshot('email_reset');

            //email_resetsテーブルのトークンを取得
            $email_resets = EmailReset::first();
            $token = $email_resets->token;

            //URLへアクセスしメールアドレスを変更する
            $browser->visitRoute('email.reset', $token)
                    ->assertPathIs('/')
                    ->assertSee('メールアドレスを変更しました')
                    ->screenshot('email_reset');
        });
    }

    //簡単ログイン用メールアドレスは変更できないようになっているかテスト
    public function testGuestUserLoginEmailReset()
    {
        //簡単ログイン用メールアドレス
        $guest_login_email = 'guest@example.com';

        $this->browse(function ($browser) use ($guest_login_email) {
            $browser->loginAs($this->user)
                    ->visitRoute('email.request')
                    ->assertRouteIs('email.request')
                    ->type('new_email', $guest_login_email)
                    ->assertInputValue('new_email', $guest_login_email)
                    ->press('再設定URLを送信')

                    //バリデーションエラーメッセージが表示しているか確認
                    //失敗フラッシュメッセージ表示してあるか確認
                    ->assertSee('リクエストに失敗しました')
                    ->assertSee('簡単ログイン用のメールアドレスは変更できません')
                    ->screenshot('email_reset');
        });
    }

    //一意ではないメールアドレスでリクエストした際、失敗するかテスト
    public function testFailureUniqueEmailReset()
    {
        //すでにデータがあるメールアドレスでリクエスト
        $user = factory(User::class)->create();
        $email = $user->email;

        $this->browse(function ($browser) use ($email) {
            $browser->loginAs($this->user)
                    ->visitRoute('email.request')
                    ->assertRouteIs('email.request')
                    ->type('new_email', $email)
                    ->assertInputValue('new_email', $email)
                    ->press('再設定URLを送信')

                    //バリデーションエラーメッセージが表示しているか確認
                    //失敗フラッシュメッセージ表示してあるか確認
                    ->assertSee('リクエストに失敗しました')
                    ->assertSee('メールアドレスは既に取得されているため、違うものを入力してください。')
                    ->screenshot('email_reset');
        });
    }

    //ナビゲーションバーからメールアドレス再設定フォームにアクセスできるかテスト
    public function testEmailResetLink()
    {
        $this->browse(function (Browser $browser) {
           $browser->loginAs($this->user)
                ->visit('/')
                ->click('#navbarDropdown')
                ->click('.email_reset_icon')
                ->assertPathIs('/email/reset');
        });
    }
}