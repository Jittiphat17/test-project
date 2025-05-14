<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrant_id')->constrained()->onDelete('cascade');
            $table->string('status'); // member / student / non_member
            $table->date('registration_date');
            $table->json('events'); // เก็บ ['lecture', 'workshop_room_1'] แบบ array
            $table->decimal('total_price', 8, 2);
            $table->string('slip_path'); // เก็บ path ของสลิป
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
