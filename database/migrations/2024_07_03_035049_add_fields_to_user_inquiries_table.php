<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_inquiries', function (Blueprint $table) {
            $table->string('companyName')->nullable();
            $table->string('city')->nullable();
            $table->string('pinCode')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_id')->nullable();
            $table->string('gclid')->nullable();
            $table->string('gcid_source')->nullable();
            $table->boolean('is_GPM')->default(false);
        });

        // Update existing records to set is_GPM based on the conditions
        DB::statement('
            UPDATE user_inquiries
            SET is_GPM = CASE WHEN
                companyName IS NOT NULL OR
                city IS NOT NULL OR
                pinCode IS NOT NULL OR
                utm_source IS NOT NULL OR
                utm_medium IS NOT NULL OR
                utm_campaign IS NOT NULL OR
                utm_id IS NOT NULL OR
                gclid IS NOT NULL OR
                gcid_source IS NOT NULL
            THEN true ELSE false END
        ');

        // Drop existing trigger if exists
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_user_inquiries');
        DB::unprepared('DROP TRIGGER IF EXISTS before_update_user_inquiries');

        // Create a trigger to handle new inserts
        DB::unprepared('
            CREATE TRIGGER before_insert_user_inquiries
            BEFORE INSERT ON user_inquiries
            FOR EACH ROW
            BEGIN
                IF NEW.companyName IS NOT NULL OR
                   NEW.city IS NOT NULL OR
                   NEW.pinCode IS NOT NULL OR
                   NEW.utm_source IS NOT NULL OR
                   NEW.utm_medium IS NOT NULL OR
                   NEW.utm_campaign IS NOT NULL OR
                   NEW.utm_id IS NOT NULL OR
                   NEW.gclid IS NOT NULL OR
                   NEW.gcid_source IS NOT NULL THEN
                    SET NEW.is_GPM = TRUE;
                ELSE
                    SET NEW.is_GPM = FALSE;
                END IF;
            END
        ');

        // Create a trigger to handle updates
        DB::unprepared('
            CREATE TRIGGER before_update_user_inquiries
            BEFORE UPDATE ON user_inquiries
            FOR EACH ROW
            BEGIN
                IF NEW.companyName IS NOT NULL OR
                   NEW.city IS NOT NULL OR
                   NEW.pinCode IS NOT NULL OR
                   NEW.utm_source IS NOT NULL OR
                   NEW.utm_medium IS NOT NULL OR
                   NEW.utm_campaign IS NOT NULL OR
                   NEW.utm_id IS NOT NULL OR
                   NEW.gclid IS NOT NULL OR
                   NEW.gcid_source IS NOT NULL THEN
                    SET NEW.is_GPM = TRUE;
                ELSE
                    SET NEW.is_GPM = FALSE;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_inquiries', function (Blueprint $table) {
            $table->dropColumn([
                'companyName',
                'city',
                'pinCode',
                'utm_source',
                'utm_medium',
                'utm_campaign',
                'utm_id',
                'gclid',
                'gcid_source',
                'is_GPM'
            ]);
        });
     // Drop the triggers if they exist
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_user_inquiries');
        DB::unprepared('DROP TRIGGER IF EXISTS before_update_user_inquiries');
    }
};
