<?php

namespace App\Http\Controllers;

use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class SmtpSettingController extends Controller
{
    public function testEmail(Request $request)
        {
            $smtpSetting = SmtpSetting::first();

            config([
                'mail.mailers.smtp.host' => $smtpSetting->mail_host,
                'mail.mailers.smtp.port' => $smtpSetting->mail_port,
                'mail.mailers.smtp.username' => $smtpSetting->mail_username,
                'mail.mailers.smtp.password' => $smtpSetting->mail_password,
                'mail.mailers.smtp.encryption' => $smtpSetting->mail_encryption,
                'mail.from.address' => $smtpSetting->mail_from_address,
                'mail.from.name' => $smtpSetting->mail_from_name,
            ]);

            try {
                Mail::to($smtpSetting->mail_from_address)->send(new TestEmail());
                return response()->json(['message' => 'Test email sent successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to send test email: ' . $e->getMessage()], 500);
            }
        }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smtpSetting = SmtpSetting::first(); // Fetch existing SMTP settings if they exist
        return view('smtp_settings.index', compact('smtpSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SmtpSetting $smtpSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmtpSetting $smtpSetting)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SmtpSetting $smtpSetting)
    {
        $validateData = $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|email',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required',
        ]);

        $smtpSetting->update($validateData);

        // Update the .env file
        $this->setEnvironmentValue([
            'MAIL_MAILER' => $smtpSetting->mail_mailer,
            'MAIL_HOST' => $smtpSetting->mail_host,
            'MAIL_PORT' => $smtpSetting->mail_port,
            'MAIL_USERNAME' => $smtpSetting->mail_username,
            'MAIL_PASSWORD' => $smtpSetting->mail_password,
            'MAIL_ENCRYPTION' => $smtpSetting->mail_encryption,
            'MAIL_FROM_ADDRESS' => $smtpSetting->mail_from_address,
            'MAIL_FROM_NAME' => $smtpSetting->mail_from_name,
        ]);

        // Update config for current request
        $config = [
            'mail.mailer' => $smtpSetting->mail_mailer,
            'mail.host' => $smtpSetting->mail_host,
            'mail.port' => $smtpSetting->mail_port,
            'mail.username' => $smtpSetting->mail_username,
            'mail.password' => $smtpSetting->mail_password,
            'mail.encryption' => $smtpSetting->mail_encryption,
            'mail.from.address' => $smtpSetting->mail_from_address,
            'mail.from.name' => $smtpSetting->mail_from_name,
        ];

        foreach ($config as $key => $value) {
            Config::set($key, $value);
        }

        echo '<style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .notification {
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 20px;
                width: 300px;
                text-align: center;
            }
            .icon {
                font-size: 48px;
                color: #4CAF50;
                margin-bottom: 10px;
            }
            .message {
                color: #333;
                font-size: 18px;
                margin-bottom: 20px;
            }
            .progress-bar {
                width: 100%;
                height: 4px;
                background-color: #e0e0e0;
                border-radius: 2px;
                overflow: hidden;
            }
            .progress {
                width: 0%;
                height: 100%;
                background-color: #4CAF50;
                animation: progress 3s linear;
            }
            @keyframes progress {
                0% { width: 0%; }
                100% { width: 100%; }
            }
        </style>';

        echo '<div class="notification">
            <div class="icon">✓</div>
            <div class="message"><b>SMTP settings updated successfully.</b></div>
            <div class="message">You will be redirected shortly.</div>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>';

        echo '<script>
            setTimeout(function() {
                window.location.href = "' . route('smtp-settings.index') . '";
            }, 3000);
        </script>';

        exit;  // Terminate script execution after sending output
    }
        /**
         * Set .env file variables.
         */
        protected function setEnvironmentValue(array $values)
        {
            $envFile = app()->environmentFilePath();
            $str = file_get_contents($envFile);

            if (count($values) > 0) {
                foreach ($values as $envKey => $envValue) {
                    $str .= "\n"; // In case the searched variable is not found
                    $keyPosition = strpos($str, "{$envKey}=");
                    $endOfLinePosition = strpos($str, "\n", $keyPosition);
                    $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                    // If key does not exist, add it
                    if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                        $str .= "{$envKey}={$envValue}\n";
                    } else {
                        $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                    }
                }
            }

            $str = substr($str, 0, -1);
            if (!file_put_contents($envFile, $str)) return false;
            return true;
        }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmtpSetting $smtpSetting)
    {
        //
    }
}
