<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SettingController extends Controller {

    public function general() {

        return view( 'backend.setttins.generalSetting' );
    }

    public function general_update( Request $request ) {

        $request->validate( [

            'site_title'          => 'required|string|max:255',
            'site_address'        => 'required|string|max:255',
            'site_phone'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'site_email'          => 'required|string|email|max:255',
            'site_facebook_link'  => 'required|string|max:255',
            'site_linkeding_link' => 'required|string|max:255',
            'site_description'    => 'required|string|max:255',

        ] );

        Setting::updateOrCreate(

            ['name' => 'site_title'],
            ['value' => $request->site_title]

        );

        Setting::updateOrCreate(

            ['name' => 'site_address'],
            ['value' => $request->site_address]

        );

        Setting::updateOrCreate(

            ['name' => 'site_phone'],
            ['value' => $request->site_phone]

        );

        Setting::updateOrCreate(

            ['name' => 'site_email'],
            ['value' => $request->site_email]

        );

        Setting::updateOrCreate(

            ['name' => 'site_facebook_link'],
            ['value' => $request->site_facebook_link]

        );
        
         Setting::updateOrCreate(
            ['name' => 'site_instagram_link'],
            ['value' => $request->site_instagram_link]
        );

        Setting::updateOrCreate(
            ['name' => 'site_tiktok_link'],
            ['value' => $request->site_tiktok_link]
        );

        Setting::updateOrCreate(
            ['name' => 'site_whatsapp_link'],
            ['value' => $request->site_whatsapp_link]
        );

        Setting::updateOrCreate(

            ['name' => 'site_linkeding_link'],
            ['value' => $request->site_linkeding_link]

        );

        Setting::updateOrCreate(
            ['name' => 'meta_des'],
            ['value' => $request->meta_des]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_key'],
            ['value' => $request->meta_key]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_auth'],
            ['value' => $request->meta_auth]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_page_title'],
            ['value' => $request->meta_page_title]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_page_des'],
            ['value' => $request->meta_page_des]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_img_url'],
            ['value' => $request->meta_img_url]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_page_url'],
            ['value' => $request->meta_page_url]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_twi_page_title'],
            ['value' => $request->meta_twi_page_title]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_twi_page_des'],
            ['value' => $request->meta_twi_page_des]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_twi_img_url'],
            ['value' => $request->meta_twi_img_url]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_fb_id'],
            ['value' => $request->meta_fb_id]
        );

        Setting::updateOrCreate(
            ['name' => 'meta_gtm_id'],
            ['value' => $request->meta_gtm_id]
        );

        Setting::updateOrCreate(

            ['name' => 'site_description'],
            ['value' => $request->site_description]

        );

        Toastr::success( 'setting successfully created' );
        return back();
    }

    public function apperance() {

        return view( 'backend.setttins.apparanceSetting' );
    }

    public function apperance_update( Request $request ) {

        // dd($request->all());

        // $request->validate( [

        //     'site_bg_color' => 'required|string|max:255',
        //     'logo_img'      => 'required|image|mimes:png,jpg',
        // ] );

        Setting::updateOrCreate(

            ['name' => 'site_bg_color'],
            ['value' => $request->site_bg_color]

        );

        Setting::updateOrCreate(

            ['name' => 'banner_t1'],
            ['value' => $request->banner_t1]

        );

        Setting::updateOrCreate(

            ['name' => 'banner_t2'],
            ['value' => $request->banner_t2]

        );

        Setting::updateOrCreate(

            ['name' => 'banner_t3'],
            ['value' => $request->banner_t3]

        );

        if ( $request->hasFile( 'logo_img' ) ) {

            $upload_path = '/uploads/system_img';
            $file        = $request->file( 'logo_img' );
            $file_name   = 'logo_img' . '.' . $file->extension(); //logo_img.jpg
            $old_path1   = 'public/uploads/system_img/' . $file_name;
            $this->deleteoldFile( $old_path1 );
            $request->logo_img->move( public_path( $upload_path ), $file_name );

            Setting::updateOrCreate(

                ['name' => 'logo_img'],
                ['value' => $file_name]

            );

        }

        if ( $request->hasFile( 'slide_one' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'slide_one' );
            $fav_file_name = 'slide_one' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->slide_one->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'slide_one'],
                ['value' => $fav_file_name]

            );
        }

        if ( $request->hasFile( 'slide_two' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'slide_two' );
            $fav_file_name = 'slide_two' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->slide_two->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'slide_two'],
                ['value' => $fav_file_name]

            );
        }

        if ( $request->hasFile( 'slide_tree' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'slide_tree' );
            $fav_file_name = 'slide_tree' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->slide_tree->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'slide_tree'],
                ['value' => $fav_file_name]

            );
        }

        if ( $request->hasFile( 'category_b1' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'category_b1' );
            $fav_file_name = 'category_b1' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->category_b1->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'category_b1'],
                ['value' => $fav_file_name]

            );
        }

        if ( $request->hasFile( 'category_b2' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'category_b2' );
            $fav_file_name = 'category_b2' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->category_b2->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'category_b2'],
                ['value' => $fav_file_name]

            );
        }

        if ( $request->hasFile( 'category_b3' ) ) {

            $upload_path   = '/uploads/system_img';
            $file_fav      = $request->file( 'category_b3' );
            $fav_file_name = 'category_b3' . '.' . $file_fav->extension(); //logo_img.jpg
            $old_path      = 'public/uploads/system_img/' . $fav_file_name;
            $this->deleteoldFile( $old_path );
            $request->category_b3->move( public_path( $upload_path ), $fav_file_name );

            Setting::updateOrCreate(

                ['name' => 'category_b3'],
                ['value' => $fav_file_name]

            );
        }

        Toastr::success( 'successfully upload' );
        return back();
    }

    public function deleteoldFile( $path ) {

        if ( file_exists( $path ) ) {

            unlink( base_path( $path ) );
        }

    }

    public function mail() {

        return view( 'backend.setttins.mailSetting' );
    }

    public function mail_update( Request $request ) {

        $request->validate( [

            'mail_mailer'       => 'required|string',
            'mail_host'         => 'required|string',
            'mail_port'         => 'required|string',
            'mail_user'         => 'required|string',
            'mail_password'     => 'required|string',
            'mail_encryption'   => 'nullable|string',
            'mail_from_address' => 'required|email|string',

        ] );

        Setting::updateOrCreate(

            ['name' => 'mail_mailer'],
            ['value' => $request->mail_mailer]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_host'],
            ['value' => $request->mail_host]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_port'],
            ['value' => $request->mail_port]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_user'],
            ['value' => $request->mail_user]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_password'],
            ['value' => $request->mail_password]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_encryption'],
            ['value' => $request->mail_encryption]

        );

        Setting::updateOrCreate(

            ['name' => 'mail_from_address'],
            ['value' => $request->mail_from_address]

        );

        $envFilePath = base_path( '.env' );

        // Define the new values you want to set
        $newEnvValues = [

            "MAIL_MAILER=" . $request->mail_mailer,
            "MAIL_HOST=" . $request->mail_host,
            "MAIL_PORT=" . $request->mail_port,
            "MAIL_USERNAME=" . $request->mail_user,
            "MAIL_PASSWORD=" . $request->mail_password,
            "MAIL_ENCRYPTION=" . $request->mail_encryption,
            "MAIL_FROM_ADDRESS=" . $request->mail_from_address,
        ];

        // Read the current contents of the .env file
        $envContents = file_get_contents( $envFilePath );

        // Update the .env contents with the new values
        foreach ( $newEnvValues as $newEnvValue ) {
            $envContents = preg_replace( '/^' . preg_quote( explode( '=', $newEnvValue )[0], '/' ) . '=.*/m', $newEnvValue, $envContents );
        }

        // Write the updated contents back to the .env file
        file_put_contents( $envFilePath, $envContents );

        // You may also want to reload the configuration cache for Laravel to reflect the changes.
        // Artisan::call('config:cache');

        Toastr::success( 'successfully upload your data' );
        return back();

    }

    public function socialiteView() {

        return view( 'admin.page.settings.socialite' );

    }

    public function socialiteUpdate( Request $request ) {

        $request->validate( [

            'github_client_id'        => 'required|string|max:255',
            'github_client_secret_id' => 'required|string|max:255',
            'github_redirect_url'     => 'required|string|max:255',
            'google_client_id'        => 'required|string|max:255',
            'google_client_secret_id' => 'required|string|max:255',
            'google_redirect_url'     => 'required|string|max:255',

        ] );

        Setting::updateOrCreate(

            ['name' => 'github_client_id'],
            ['value' => $request->github_client_id]

        );

        Setting::updateOrCreate(

            ['name' => 'github_client_secret_id'],
            ['value' => $request->github_client_secret_id]

        );

        Setting::updateOrCreate(

            ['name' => 'github_redirect_url'],
            ['value' => $request->github_redirect_url]

        );

        Setting::updateOrCreate(

            ['name' => 'google_client_id'],
            ['value' => $request->google_client_id]

        );

        Setting::updateOrCreate(

            ['name' => 'google_client_secret_id'],
            ['value' => $request->google_client_secret_id]

        );

        Setting::updateOrCreate(

            ['name' => 'google_redirect_url'],
            ['value' => $request->google_redirect_url]

        );

        $envFilePath = base_path( '.env' );

        // Define the new values you want to set
        $newEnvValues = [

            "GITHUB_CLIENT_ID=" . $request->github_client_id,
            "GITHUB_CLIENT_SECRET=" . $request->github_client_secret_id,
            "GITHUB_REDIRECT_URL=" . $request->github_redirect_url,
            "GOOGLE_CLIENT_ID=" . $request->google_client_id,
            "GOOGLE_CLIENT_SECRET=" . $request->google_client_secret_id,
            "GOOGLE_REDIRECT_URL=" . $request->google_redirect_url,

        ];

        // Read the current contents of the .env file
        $envContents = file_get_contents( $envFilePath );

        // Update the .env contents with the new values
        foreach ( $newEnvValues as $newEnvValue ) {
            $envContents = preg_replace( '/^' . preg_quote( explode( '=', $newEnvValue )[0], '/' ) . '=.*/m', $newEnvValue, $envContents );
        }

        // Write the updated contents back to the .env file
        file_put_contents( $envFilePath, $envContents );

        // You may also want to reload the configuration cache for Laravel to reflect the changes.
        // Artisan::call('config:cache');

        Toastr::success( 'successfully upload your data' );
        return back();

    }

}
